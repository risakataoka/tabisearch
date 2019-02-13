<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabiController extends Controller
{
    public function index()
    {
      return view('index');
    }

    public function adminIndex()
    {
      return view('admin.index');
    }
}
