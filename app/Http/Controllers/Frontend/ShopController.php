<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request){
        $cate = $request->cate;
        $page = $request->page;
        $price= $request->price;
        $promotion = $request->promotion;
        // return $request->cate;
        if($request->cate)
        {
            $totalCate = Product::where('category_id','=',$request->cate)->count('id');
            // logger($page);
            $totalPage = ceil($totalCate/3);
            $rsProduct = ($page-1)*3;   
            $product   = Product::where('category_id','=',$request->cate)->orderBy('id','desc')->offset($rsProduct)->limit(3)->get();
            
            // return $product;
        }

        else if($request->price=='min')
        {
            $totalCate = Product::count('id');
            $totalPage = ceil($totalCate/3);
            $rsProduct = ($page-1)*3;
            $product   = Product::orderBy('sale_price','asc')->offset($rsProduct)->limit(3)->get();
        }
        else if($request->price=='max')
        {
            $totalCate = Product::count('id');
            $totalPage = ceil($totalCate/3);
            $rsProduct = ($page-1)*3;
            $product   = Product::orderBy('sale_price','desc')->offset($rsProduct)->limit(3)->get();
        }
        else if($request->promotion)
        {
            $total    = Product::whereRaw('regular_price != sale_price')->count('id');
            $totalPage = ceil($total/3);
            $rsProduct = ($page-1)*3;
            $product = Product::whereRaw('regular_price != sale_price')->offset($rsProduct)->limit(3)->get();
        }
        else{
            $total    = Product::count('id');
            $totalPage = ceil($total/3);
            $rsProduct = ($page-1)*3;
            $product = Product::orderBy('id','desc')->offset($rsProduct)->limit(3)->get();
        }

        $categories = Category::get();
        return view('Frontend.shop',compact('product','cate','price','promotion','categories','totalPage'));
    }
}
