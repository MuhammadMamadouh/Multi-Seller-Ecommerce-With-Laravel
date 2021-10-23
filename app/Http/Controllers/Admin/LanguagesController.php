<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\Facades\DataTables;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->getItems();
        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = Language::getreadables();
        $title = __('titles.languages');
        $route = 'languages';                       // group route name like (languages.create, store ..etc)
        return view('Admin.components.index', compact(
            'title', 'items', 'attributes', 'route'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('general.languages');
        $smallTitle = __('general.languages');
        $writables = Language::getWritables();
        $translables = Language::translabes();
        $actionLink = route('languages.store');
        return view('Admin.components.edit-create',
            compact('title', 'smallTitle',
                'writables', 'translables',
                'actionLink'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        Language::create($request->all());
        try {
            return redirect()->route('languages.index')->with('success', __('messages.created_successfully'));
        } catch (\Exception $exception) {
            return back()->with('errors', __('messages.something_wrong'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Language::find($id);
        $title = __('titles.languages');
        $smallTitle = __('titles.edit_language');
        $writables = Language::getWritables();
        $translables = Language::translabes();
        $actionLink = route('languages.update', $id);
        return view('Admin.components.edit-create',
            compact('title', 'item', 'smallTitle'
                , 'writables', 'translables', 'actionLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LanguageRequest $request, $id)
    {
        $language = Language::findOrFail($id);
        try {
            $language->fill($request->all())->save();
            return redirect()->route('languages.index')->with('success', __('messages.updated_successfully'));
        } catch (\Exception $exception) {
            return back()->with('errors', __('messages.updated_with_errors'));
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
        return \response( __('messages.deleted_successfully'));
    }

    /**
     * Remove many resources from storage
     * @param Request $request
     * @return mixed
     */
    public function multi_delete(Request $request)
    {
        $ids = $request->item;
        foreach ($ids as $id){
            $this->delete($id);
        }
        return \response( __('messages.deleted_successfully'));
    }
    /**
     * Remove specific record
     * @param $id
     */
    private function delete($id){
        $item = Language::findOrFail($id);
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
            Language::where('id', $request->id)->update(['status' => 'active']);
        else
            Language::where('id', $request->id)->update(['status' => 'inactive']);

        return response()->json(['status' => true]);
    }

    /**
     * Get Items that will be displayed at index page
     * @return Collection|\Illuminate\Support\Collection
     */
    private function getItems()
    {
        return Collection::make(Language::all())->map(function ($item) {
            return $item;
        });
    }

    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->addColumn('Actions', function ($item) {
                $view = 'languages';
                return view('admin.components.btns.actions', compact('view', 'item'));
            })
            ->addColumn('status', 'Admin.components.btns.active')
            ->rawColumns(['Actions', 'photo', 'checkbox', 'status'])
            ->make(true);
    }

}
