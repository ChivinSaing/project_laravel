<?php

namespace App\Http\Controllers\Backend;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    public function index(){
       $name = Size::get();
        return view('Backend.viewsize',compact('name'));
    }
    public function opensize(){
        return view('Backend.addsize');
    }

    public function addsize(Request $request){
        $name = $request->name;
        Size::create([
            'name'=>$name
        ]);
       return redirect()->route('Addsize')->with('add success','add data success');
    }

    public function openupdatesize($id){
        // return $id;
        // $size = Size::find($id)->first();
       $size =  DB::table('sizes')->select('*')->where('id',$id)->first();
        return view('Backend.updatesize',compact('size'));
    }

    public function updatesize(Request $request){
        $id  = $request->id;
        $name= $request->name;

        Size::query()->where('id',$id)->update([
            'name'=>$name
        ]);
        return redirect()->route('viewsize')->with('update success','you update success');
    }

    public function deletesize(Request $request){
        $id = $request->input('remove-id');

        Size::query()->where('id',$id)->delete();

        return redirect()->route('viewsize')->with('delete success','delete data success');
    }

}
