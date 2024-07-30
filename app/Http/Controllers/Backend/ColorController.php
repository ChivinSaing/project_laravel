<?php

namespace App\Http\Controllers\Backend;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    public function index(){
        $name = Color::get();
        return view('Backend.viewcolor',compact('name'));
    }

    public function openaddColor(){
        return view('Backend.addColor');
    }

    public function addcolor(Request $request){
        $name = $request->name;
        Color::create([
            'name'=>$name
        ]);
       return redirect()->route('addcolors')->with('add success','add data success');
    }
    public function openupdatecolor($id){
        // return $id;
        $color = Color::find($id);
        // $color = DB::table("colors")->select('*')->where('id',$id)->first();
        return view('Backend.updatecolor',compact('color'));
    }

    public function Updatecolor(Request $request){
        $id  = $request->id;
        $name= $request->name;

        Color::query()->where('id',$id)->update([
            'name'=>$name
        ]);
        return redirect()->route('viewcolor')->with('updatecolor success','update success');
    }

    public function DeleteColor(Request $request){
        $id = $request->input('remove-id');
        Color::query()->where("id",$id)->delete();

        return redirect()->route('viewcolor')->with('deletesuccess','delete success');

    }
}
