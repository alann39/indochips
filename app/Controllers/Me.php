<?php

namespace App\Controllers;

class Me extends BaseController
{
    public function index(): string
    {
        return view('v_me');
    }
}
