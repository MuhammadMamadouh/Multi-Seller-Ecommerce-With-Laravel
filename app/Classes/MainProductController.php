<?php


namespace App\Classes;


use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Color;
use App\Models\MainCategory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class MainProductController extends Controller
{
    public string $mainView = 'Admin';
    public string $route    = 'products';

    public function index(Request $request)
    {
        $items = $this->getItems();

        if ($request->ajax()) {
            return $this->getDataTable($items);
        }
        $attributes = Product::getreadables();
        $title      = __('titles.products');
        return view("$this->mainView.products.index", compact('title', 'items', 'attributes'));

    }


    public function create()
    {
        $title          = __('titles.products');
        $smallTitle     = __('titles.create_product');
        $writables      = Product::getWritables();
        $translables    = Product::translabes();
        $mainCategories = MainCategory::all();
        $actionLink     = route("$this->route.store");
        $colors         = Color::all();
        return view("Admin.products.edit-create",
            compact('title', 'smallTitle', 'writables', 'translables', 'mainCategories', 'colors', 'actionLink'));
    }

    public function store(Request $request, ProductRelatedTables $attaches)
    {
//        dd($request->dd());
        try {
            $data = $this->collectDataToBeStored($request);
            DB::beginTransaction();
            $product = Product::create($data);
            $this->addImagesToProduct($request, $product);
            $attaches->storeProductAccessories($request, $product);
            DB::commit();
            return redirect()->route("$this->route.index")->with('success', __('messages.created_successfully'));
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('error', __('messages.something_wrong'));
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }


    public function edit($id)
    {

        $item         = Product::findOrFail($id);
        $mainCategory = MainCategory::find($item->main_categories_id);
        $item->setAttribute('main_category', $mainCategory->name);
        $item->setAttribute('main_category_childern', MainCategory::find($item->main_categories_id)->children);

        $writables         = Product::getWritables();
        $translables       = Product::translabes();
        $title             = __('titles.products');
        $smallTitle        = __('titles.edit_product');
        $mainCategories    = MainCategory::active()->get(['id', 'name']);
        $subCategories     = $mainCategory->children()->get();
        $mainCategorySizes = $mainCategory->sizes()->get('id', 'name');
        $colors            = Color::all(['id', 'name']);
        $vendors           = $mainCategory->vendors()->get();
        $brands            = $mainCategory->brands()->get(['id', 'name']);
        $actionLink        = route("$this->route.update", $item->id);
        return view('Admin.products.edit-create',
            compact('title', 'item', 'smallTitle',
                'translables', 'writables', 'mainCategories', 'colors',
                'subCategories', 'mainCategorySizes', 'vendors', 'brands',
                'actionLink'
            ));
    }


    public function update(ProductsRequest $request, $id, ProductRelatedTables $productRelatedTables)
    {
        dd('Update');
        try {
            $product = Product::findOrFail($id);
            $data    = $this->collectDataToBeStored($request, $product);
            DB::beginTransaction();
            $product->fill($data)->save();
            $productRelatedTables->updateProductRelatedTables($request, $product);
            DB::commit();
            return redirect()->route('products.index')->with('success', __('messages.updated_successfully'));
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('products.index')->with('error', __('messages.something_wrong'));
        }
    }


    public function destroy($id)
    {
        dd('Destroy');
        $product = Product::findOrFail($id);
        Storage::deleteDirectory('uploads/images/products/' . $product->id);
        $product->delete();
        return redirect()->route("$this->route.index")->with('success', __('messages.deleted_successfully'));
    }


    private function generateSlug($title): string
    {
        $slug      = Str::slug($title);
        $slugCount = Product::where('slug', $slug)->count();
        if ($slugCount > 0) {
            $slug = $slug . '-' . random_int(100, 500);
        }
        return $slug;
    }


    /**
     * Get Items that will be displayed at index page
     * @return Collection|\Illuminate\Support\Collection
     */
    private function getItems()
    {
        return Collection::make(Product::with(['colors', 'sizes'])->get())->map(function ($product) {
            $product->setAttribute('discount', $product->discount);
            $product->setAttribute('sizes', $product->sizes()->get());
            $product->setAttribute('colors', $product->colors()->get());

            return $product;
        });
    }


    private function getDataTable($items)
    {
        return \DataTables::of($items)
            ->addColumn('Actions', function ($item) {
                $view = $this->route;
                return view('admin.components.btns.actions', compact('view', 'item'));
            })
            ->addColumn('photo', function ($item) {
                $url = $item->images !=null  ? asset('storage') . '/' . json_decode($item->images, true)[0]
                    : 'https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg';

                return view('admin.components.btns.photo', compact('url'));
            })
            ->addColumn('status', 'admin.components.btns.active')
            ->addColumn('checkbox', 'Seller.components.btns.checkbox')
            ->rawColumns(['Actions', 'checkbox', 'photo', 'status'])
            ->make(true);
    }

    private function unlinkOldImages($product_images): void
    {
        foreach ($product_images as $image) {
            unlinkPhoto($image);
        }
    }

    private function addImagesToProduct(ProductsRequest|Request $request, $product, string $type = 'store')
    {
        if ($request->has('images')) {
            $pics = [];
            foreach ($request->file('images') as $image) {
                $pics [] = uploadImage("products/$product->id/", $image);
            }
            $images = json_encode($pics);

            if ($type == 'update') {
                return $images;
            }
            $product->images = $images;
            $product->save();
        }
    }


    private function collectDataToBeStored(ProductsRequest|Request $request, $product = null): array
    {
        $data = $request->all();

        if ($request->has('translation')) {
            $data['slug'] = $this->generateSlug($request->translation[1]['name']);
            $translations = collect($request->translation);
            $name         = $description = $information = [];
            foreach (getLanguages() as $index => $language) {
                $name[$language->abbr]        = $translations[$index]['name'];
                $information[$language->abbr] = $translations[$index]['information'];
                $description[$language->abbr] = $translations[$index]['description'];
            }
            $data['name']        = json_encode($name);
            $data['description'] = json_encode($description);
            $data['information'] = json_encode($information);
        }
        if ($product) {
            if ($request->hasFile('images')) {
                $this->unlinkOldImages(json_decode($product->images, true));
                $data['images'] = $this->addImagesToProduct($request, $product, 'update');
            }
        } else {
            $data['images'] = null;
        }
        return $data;
    }
}
