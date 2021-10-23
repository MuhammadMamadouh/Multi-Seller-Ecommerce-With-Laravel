<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use App\Models\ProductColorImages;
use http\Env\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Exception;
use Yajra\DataTables\Contracts\DataTable;

class ColorsController extends Controller
{

    public function index(Request $request)
    {
        $items = Color::all();
        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = Color::getreadables();
        $title      = __('titles.colors');
        $route      = 'colors';
        return view('Admin.components.index', compact(
            'title', 'items', 'attributes', 'route'
        ));
    }


    public function create()
    {
        $title       = __('titles.colors');
        $smallTitle  = __('titles.create_color');
        $writables   = Color::getWritables();
        $translables = Color::translabes();
        $actionLink  = route('colors.store');
        return view('Admin.components.edit-create',
            compact('title', 'smallTitle',
                'writables', 'translables',
                'actionLink'));
    }


    public function store(ColorRequest $request)
    {
        try {
            $data = $this->collectDataToBeStored($request);
            Color::create($data);
            return redirect()->route('colors.index')->with('success', __('messages.created_successfully'));
        } catch (Exception $exception) {
            return back()->with('errors', __('messages.something_wrong'));
        }
    }


    public function edit($id)
    {
        $item        = Color::find($id);
        $title       = __('titles.colors');
        $smallTitle  = __('titles.edit_color');
        $writables   = Color::getWritables();
        $translables = Color::translabes();
        $actionLink  = route('colors.update', $id);
        return view('Admin.components.edit-create',
            compact('title', 'item', 'smallTitle'
                , 'writables', 'translables', 'actionLink'));
    }


    public function update(ColorRequest $request, $id)
    {
        $color = Color::findOrFail($id);
        $data  = $this->collectDataToBeStored($request);
        try {
            $color->fill($data)->save();
            return redirect()->route('colors.index')->with('success', __('messages.updated_successfully'));
        } catch (Exception $exception) {
            return redirect()->route('colors.index')->with('error', __('messages.updated_with_errors'));
        }
    }

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
        return \response(__('messages.deleted_successfully'));

    }


    private function delete($id)
    {
        Color::findOrFail($id)->delete();
    }


    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('Actions', function ($item) {
                $view = 'colors';
                return view('admin.components.btns.actions', compact('view', 'item'));
            })
            ->addColumn('color', function ($item) {
                return '<div id="selectedcolor" class="w3-small" style="background-color:' . $item->color . '">
                            <br><br>
                        </div>';
            })
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->rawColumns(['Actions', 'checkbox', 'color'])
            ->make(true);
    }

//    public function destroyProductColor($id)
//    {
//        $pColor = ProductColorImages::findOrFail($id);
//        $pColor->delete();
//        return \response()->json([__('messages.deleted_successfully')]);
//    }

    private function collectDataToBeStored(ColorRequest|Request $request): array
    {
        $data = $request->validated();
        if ($request->has('translation')) {
            $translations = collect($request->translation);
            foreach (getLanguages() as $index => $language) {
                $name[$language->abbr] = $translations[$index]['name'];
            }
            $data['name'] = json_encode($name);
        }
        return $data;
    }
}
