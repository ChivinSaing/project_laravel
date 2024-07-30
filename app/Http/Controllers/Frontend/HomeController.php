<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product  = Product::orderByDesc('id')->limit(4)->get();
        $promotion= Product::whereRaw("sale_price <> regular_price")->orderBy('id','DESC')->limit(4)->get();
        $popularpro                                                 = Product::orderBy('viewer','desc')->limit(4)->get();
        return view('Frontend.index',compact('product','promotion','popularpro'));
    }
    public function detail($id)
    {
        $product = Product::with('colors','sizes')->find($id);
        $relatepro=Product::where('category_id','=',$product->category_id)->orderBy('id','desc')->limit(4)->get();
        Product::where('id',$id)->update([
            'viewer'=>$product->viewer+1
        ]);
        // return $relatepro;
        return view('Frontend.product-detail',compact('product','relatepro'));
    }
}
