<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    protected $product;
    public function __construct()
    {
        helper('number');
        helper('form');
        $this->product = new ProductModel();
    }

    public function index()
    {
        $products = $this->product->findAll();
        $data = [
            'products' => $products,
        ];
        return view('v_home', $data);
    }
}
