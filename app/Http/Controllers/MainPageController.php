<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MainPageController extends Controller
{
    public function index(): View
    {
        return view('index');
    }
}
