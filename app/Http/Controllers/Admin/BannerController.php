<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class BannerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index(Request $request)
    {
        $items = Banner::all();
        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = Banner::getreadables();
        $title      = __('titles.banners');
        $route      = 'banners';                       // group route name like (banners.create, store ..etc)

        return view('Admin.components.index', compact(
            'title', 'items', 'attributes', 'route'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Response
     */
    public function create()
    {
        $title       = __('titles.banners');
        $writables   = Banner::getWritables();
        $translables = Banner::translabes();
        $smallTitle  = __('titles.create_banner');
        $actionLink  = route('banners.store');
        return view('Admin.components.edit-create',
            compact('title', 'smallTitle',
                'writables', 'translables',
                'actionLink'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BannerRequest $request)
    {
        try {
            $data = $this->collectDataToBeStored($request);
            Banner::create($data);

            return redirect()->route('banners.index')->with('success', __('messages.created_successfully'));
        } catch (Exception $exception) {
            return back()->with('errors', __('messages.something_wrong'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item        = Banner::find($id);
        $title       = __('titles.banner');
        $writables   = Banner::getWritables();
        $translables = Banner::translabes();
        $smallTitle  = '';
        $actionLink  = route('banners.update', $id);
        return view('Admin.components.edit-create',
            compact('title', 'item', 'actionLink',
                'writables', 'translables', 'smallTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        try {
            $banner = Banner::findOrFail($id);
            $data   = $this->collectDataToBeUpdated($request, $banner);
            if ($request->has('photo')) {
                unlinkPhoto($banner->photo);
                $data['photo'] = uploadImage('banners', $request->photo);
            }
            $banner->fill($data)->save();
            return redirect()->route('banners.index')->with('success', __('messages.created_successfully'));
        } catch (Exception $exception) {
            unlinkPhoto($data['photo']);
            return back()->with('errors', __('messages.something_wrong'));

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->delete($id);
        return \response(__('messages.deleted_successfully'));
    }

    public function multi_delete(Request $request)
    {
        $ids = $request->item;
        foreach ($ids as $id) {
            $this->delete($id);
        }
        return redirect()->route('banners.index')->with('success', __('messages.deleted_successfully'));
    }

    /**
     * Remove specific record
     * @param $id
     */
    private function delete($id)
    {
        $item = Banner::findOrFail($id);
        unlinkPhoto($item->photo);
        $item->delete();
    }


    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {

        if ($request->mode == 'true')
            Banner::where('id', $request->id)->update(['status' => 'active']);
        else
            Banner::where('id', $request->id)->update(['status' => 'inactive']);

        return response()->json(['status' => true]);
    }




    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('Actions', function ($item) {
                $view = 'banners';
                return view('admin.components.btns.actions', compact('view', 'item'));
            })
            ->addColumn('photo', function ($item) {
                $url = asset('storage') . '/' . $item->photo;
                return view('admin.components.btns.photo', compact('url'));
            })
            ->addColumn('status', 'admin.components.btns.active')
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->rawColumns(['Actions', 'checkbox', 'photo', 'status'])
            ->make(true);
    }

    /**
     * Modify and collect data from request
     *
     * @param $request
     * @return mixed
     */
    private function collectDataToBeStored($request): mixed
    {
        $data         = $request->all();
        $translations = collect($request->translation);
        $title        = [];
        $desc         = [];
        $data['slug'] = $this->generateSlug($request->translation[0]['title']);
        foreach (getLanguages() as $index => $language) {
            $title[$language->abbr] = $translations[$index]['title'];
            $desc [$language->abbr] = $translations[$index]['description'];
        }

        $data['title']       = json_encode($title);
        $data['description'] = json_encode($desc);
        if ($request->has('photo'))
            $data['photo'] = uploadImage('banners', $request->photo);

        return $data;
    }


    /**
     * Delete photo of a specific iten
     * @param $photo
     */
    private function unlinkPhoto($photo)
    {
        if (Storage::exists($photo))
            Storage::delete($photo);
    }


    /**
     * Generate slug from title input
     *
     * @param $title
     * @return string
     */
    private function generateSlug($title): string
    {
        $slug      = \Illuminate\Support\Str::slug($title);
        $slugCount = Banner::where('slug', $slug)->count();
        if ($slugCount > 0) {
            $slug = $slug . '-' . random_int(100, 500);
        }
        return $slug;
    }

    public function show($id)
    {
       abort(404);
    }

    private function collectDataToBeUpdated(BannerRequest|Request $request, Banner $banner)
    {
        $data         = $request->all();
        $translations = collect($request->translation);
        $title        = [];
        $desc         = [];
        if ($request->has('translation')) {
        $data['slug'] = $this->generateSlug($request->translation[1]['title']);
            foreach (getLanguages() as $index => $language) {
                $title[$language->abbr] = $translations[$index]['title'];
                $desc [$language->abbr] = $translations[$index]['description'];
            }
        }
        $data['title']       = json_encode($title);
        $data['description'] = json_encode($desc);
        if ($request->has('photo')) {
            $this->unlinkPhoto($banner->photo);
            $data['photo'] = uploadImage('banners', $request->photo);
        }
        return $data;
    }
}
