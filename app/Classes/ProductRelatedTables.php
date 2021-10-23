<?php


namespace App\Classes;

use App\Models\Product;
use App\Models\ProductAttributes;
use App\Models\ProductColorImages;
use App\Models\ProductSizes;
use Illuminate\Http\Request;

class ProductRelatedTables
{
    private $product;
    private $request;

    public function storeProductAccessories(Request $request, Product $product)
    {
        $this->product = $product;
        $this->request = $request;
        $this->attachColors();
        $this->attachSizes();
    }

    public function updateProductRelatedTables(Request $request, Product $product)
    {
        $this->product = $product;
        $this->request = $request;
        $this->updateColors();
        $this->updateSizes();
    }



    private function attachColors(): void
    {
        if ($this->request->has('colors')) {
            if ($this->request->colors[0]) {
                foreach ($this->request->colors as $key => $val) {
                    $image = null;
                    if (is_array($this->request->color_image) && $this->request->color_image[$key]) {
                        $image = uploadImage('products/' . $this->product->id . '/colors', $this->request->color_image[$key]);
                    }

                    $s = ProductColorImages::create([
                        'product_id' => $this->product->id,
                        'color_id' => $val,
                        'images' => $image,
                    ]);
                }
            }
        }
    }

    private function attachSizes(): void
    {
        if ($this->request->sizes) {
            foreach ($this->request->sizes as $key => $val) {
                ProductSizes::create([
                    'product_id' => $this->product->id,
                    'size_id' => $val,
                    'stock' => $this->request->size_stock[$key],
                    'original_price' => $this->request->size_price[$key],
                    'offer_price' => $this->request->size_offer_price[$key],
                ]);
            }
        }
    }

    private function updateColors(): void
    {

        if (isset($this->request->color_image_id)) {

            foreach ($this->request->color_image_id as $key => $val) {

                $prductClrImg = ProductColorImages::find($val);
                $image = null;
                if (is_array($this->request->color_image) && array_key_exists($key, $this->request->color_image)) {
                    $image = uploadImage('products/' . $this->product->id . '/colors', $this->request->color_image[$key]);
                }
                $data = [
                    'product_id' => $this->product->id,
                    'color_id' => $this->request->colors[$key],
                ];
                if ($image)
                    $data['images'] = $image;

                $prductClrImg->fill($data)->save();
            }
        } else{
            $this->attachColors();
        }

    }

    private function updateSizes(): void
    {
        ProductSizes::where('product_id', $this->product->id)->delete();
        $this->attachSizes();
    }

}
