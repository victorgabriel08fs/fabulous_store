<?php

namespace App\Http\Controllers;

use App\Models\LibraryProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $library_products = LibraryProduct::where('library_id', auth()->user()->library->id)->paginate(9);
        return view('home', ['library_products' => $library_products]);
    }
}
