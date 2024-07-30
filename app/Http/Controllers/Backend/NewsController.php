<?php

namespace App\Http\Controllers\Backend;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::get();
        return view('Backend.view-news',compact('news'));
    }
    public function opennews()
    {
        return view('Backend.add-new');
    }
    public function addnews(Request $request)
    {
        $title   = $request->title;
        $description= $request->description;
        $thumbnail= $request->thumbnail;
        if($thumbnail){
            $thumbnailName = rand(1,99999).'-'.$thumbnail->getClientOriginalName();
            $thumbnail->move('images',$thumbnailName);
        }

        try {
            News::create([
                
                'title' =>$title,
                'viewer'=>0,
                'thumbnail'=>$thumbnailName,
                'description'=>$description,
            ]);
            return redirect()->route('News')->with('success','add news success');
        } catch (Exception $e) {
            return redirect()->route('News')->with('notsuccess','add news not success');
        }   
    }
    public function openupdatenews($id)
    {
        $news=News::find($id);
        return view('Backend.update-news',compact('news'));
    }
    public function updatenews(Request $request)
    {
        $id  = $request->id;
        $title   = $request->title;
        $description= $request->description;
        $thumbnail= $request->thumbnail;
        if($thumbnail){
            $thumbnailName = rand(1,99999).'-'.$thumbnail->getClientOriginalName();
            $thumbnail->move('images',$thumbnailName);
        }
        else{
            $thumbnailName = $request->old_thumbnail;
        }

        try {
            News::where('id',$id)->update([
                'title' =>$title,
                'viewer'=>0,
                'thumbnail'=>$thumbnailName,
                'description'=>$description,
            ]);
            return redirect()->route('viewnews',$id)->with('updatesuccess','update new success');
        } catch (Exception $e) {
            return redirect()->route('viewnews',$id)->with('updatenotsuccess','update new not success');

        }
    }
    public function deletenew(Request $request)
    {
        $id  = $request->remove_id;
        News::where('id',$id)->delete();
        return redirect()->route('viewnews')->with('deletesuccess','delete success...');

    }
}
