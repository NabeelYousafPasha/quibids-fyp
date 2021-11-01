<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $packages = Package::all();

        return view('frontend.index', [
            'packages' => $packages,
        ]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
