<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class Home extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();
        return view('home', ['products' => $products]);
    }
}
