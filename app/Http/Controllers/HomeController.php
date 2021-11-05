<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $packages = Package::all();

        return view('frontend.index', [
            'packages' => $packages,
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();

        return view('dashboard')->with([
            'authUser' => $user,
        ]);
    }
}
