<?php

namespace App\Http\Controllers\Seller;

use App\Classes\MainProductController;

class ProductsController extends MainProductController
{

    //Override Variables of Main Product Controller
    public string $mainView = 'Seller';
    public string $route    = 'seller-products';

}
