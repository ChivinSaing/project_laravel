<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $name = Category::get();
         return view('Backend.view-category',compact('name'));
     }
     public function opencategory(){
         return view('Backend.add-category');
     }
 
     public function addcategory(Request $request){
         $name = $request->name;
         Category::create([
             'name'=>$name
         ]);
        return redirect()->route('Addcategory')->with('add success','add data success');
     }
 
     public function openupdatecategory($id){
         // return $id;
         $categorys = Category::find($id)->first();
        // $size =  DB::table('sizes')->select('*')->where('id',$id)->first();
         return view('Backend.update-category',compact('categorys'));
     }
 
     public function updatecategory(Request $request){
         $id  = $request->id;
         $name= $request->name;
 
         Category::query()->where('id',$id)->update([
             'name'=>$name
         ]);
         return redirect()->route('viewcategory')->with('update success','you update success');
     }
 
     public function deletecategory(Request $request){
         $id = $request->input('remove-id');
 
         Category::query()->where('id',$id)->delete();
 
         return redirect()->route('viewcategory')->with('delete success','delete data success');
     }
}
