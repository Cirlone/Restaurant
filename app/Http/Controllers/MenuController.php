<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show($id)
    {
        return view('food-info', ['id' => (int)$id]);
    }
}