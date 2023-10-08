<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\ImgProduct;

class HomeController extends Controller
{
    public function index() {
        $featuredProduct=Product::where('featured',1)->get();
        $latestProduct=Product::orderBy('Created_at','DESC')->take(3)->get();
        return view('fe.home',compact('featuredProduct','latestProduct'));
    }
    public function detail($slug) {
        $detail=Product::where('slug',$slug)->first();
        $related = Product::where('category_id',$detail->category_id)->where('id','!=',$detail->id)->get();
        return view('fe.detail',compact('detail','related'));
    }
}
