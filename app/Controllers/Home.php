<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('plantilla_eatoday_web/index');
    }
}
