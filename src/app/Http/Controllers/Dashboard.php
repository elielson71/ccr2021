<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function showIndex()
    {
        return view('dashboard.index');
    }
}
