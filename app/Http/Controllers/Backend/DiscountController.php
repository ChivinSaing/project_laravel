<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(){
        $name =  Discount::get();
        return view('Backend.viewdiscount',compact('name'));
    }

    public function opendis(){
       
        return view('Backend.adddiscount');
    }

    public function adddiscount(Request $request){
        $name = $request->name;
        Discount::create([
            'name'=>$name
        ]);
        return redirect()->route('Adddis')->with('add success','add data success');
    }
    public function openupdatdis($id){
        // return $id;
        $dis =  DB::table('discounts')->select('*')->where('id',$id)->first();
        return view('Backend.updatediscount',compact('dis'));
    }

    public function updatedis(Request $request){
        $id   = $request->id;
        $name = $request->name;

        Discount::query()->where('id',$id)->update([
            'name'=>$name
        ]);

        return redirect()->route('viewdis')->with('update success','update data success');
    }

    public function deletedis(Request $request){
        $id = $request->input('remove-id');

        Discount::query()->where('id',$id)->delete();
        return redirect()->route('viewdis')->with('delete success','delete data not found');
    }

}
