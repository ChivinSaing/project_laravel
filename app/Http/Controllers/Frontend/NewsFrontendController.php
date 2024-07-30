<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsFrontendController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id','desc')->get();
        return view('Frontend.news',compact('news'));
    }
    public function newsdetail($id)
    {
        $viewers =News::select('viewer')->where('id',$id)->first();
        // return $viewers;
        News::where('id',$id)->update([
            'viewer'=>$viewers->viewer+1
        ]);
        $news = News::find($id);
        return view('Frontend.new-detail',compact('news'));
    }
}
