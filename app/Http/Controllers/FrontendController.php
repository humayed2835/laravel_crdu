<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Banners;

class FrontendController extends Controller
{
    public function index()
    {
        $all_product = Product::all();
        $banner_all = Banners::Where('status', 1)->get();
        return view('welcome',compact('all_product','banner_all'));
        
    }
}
