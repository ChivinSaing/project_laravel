<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search  = $request->search;
        $product= Product::where('name','like','%'.$search.'%')->get();
        $news   = News::where('title','like','%'.$search.'%')->get();
        return view('Frontend.search',compact('product','news'));
    }
}
