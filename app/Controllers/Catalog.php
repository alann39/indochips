<?php

namespace App\Controllers;

class Catalog extends BaseController
{
    public function index(): string
    {
        return view('v_catalog');
    }
}
