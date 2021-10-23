<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->getItems();


        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = Settings::getreadables();
        $title      = __('titles.settings');
        $route      = 'settings';
        return view('Admin.components.index', compact(
            'title', 'items', 'attributes', 'route'
        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Response
     */
    public function create()
    {
        $title = __('titles.settings');
        $smallTitle ='';
        $writables = Settings::getWritables();
        $translables = Settings::translabes();
        $actionLink = route('settings.store');
        return view('Admin.components.edit-create',
            compact('title', 'smallTitle', 'writables', 'translables', 'actionLink'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $this->collectData($request);
            $settings = Settings::create($data);
            DB::commit();
            return redirect()->route('settings.index')->with('success', __('messages.created_successfully'));
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('errors', __('messages.something_wrong'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item = Settings::find($id);
        $title = __('titles.settings');
        $smallTitle = '';
        $writables = Settings::getWritables();
        $translables = Settings::translabes();
        $actionLink = route('settings.update', $id);
        return view('Admin.components.edit-create',
            compact('title', 'item', 'actionLink',
                'writables', 'translables', 'smallTitle'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $settings = Settings::findOrFail($id);
        $data = $request->all();
        try {
            $settings->fill($data)->save();
            return redirect()->route('settings.index')->with('success', __('messages.updated_successfully'));
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('settings.index')->with('error', __('messages.updated_with_errors'));
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
        $settings = Settings::findOrFail($id);
        $settings->delete();
        return redirect()->route('settings.index')->with('success', __('messages.deleted_successfully'));
    }


    /**
     * Get Items that will be displayed at index page
     * @return Collection|\Illuminate\Support\Collection
     */
    private function getItems()
    {
        return Settings::all();

    }

    private
    function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('Actions', function ($item) {
                $view = 'settings';
                return view('admin.components.btns.actions', compact('view', 'item'));
            })
            ->addColumn('Settings', function ($item) {
                return '<div id="selectedcolor" class="w3-small" style="background-Settings:' . $item->Settings . '">
                            <br><br>
                        </div>';
            })
            ->addColumn('checkbox', 'Admin.components.btns.checkbox')
            ->rawColumns(['Actions', 'checkbox', 'Settings'])
            ->make(true);
    }
}
