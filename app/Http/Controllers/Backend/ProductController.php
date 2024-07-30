<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Size;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){

        $products = Product::with('colors','sizes')
                    ->select('products.*','users.name as Username','categorys.name as CategoryName','discounts.name as DiscountName')
                    ->join('users','products.user_id','=','users.id')
                    ->join('categorys','products.category_id','=','categorys.id')
                    ->join('discounts','products.discount_id','=','discounts.id')
                    ->orderByDesc('products.id')
                    ->get();

        $totalPro= Product::count('id');
        $totalcategory= Category::withCount('products')->get();
        // return $totalcategory;
        $category =[];
        foreach ($totalcategory as $Tcategory) {
            array_push($category,"Category ".$Tcategory->name.": ".$Tcategory->products_count);
        }
        return view('Backend.view-product',compact('products','totalPro','category'));
    }
    public function openpro(){
        $discount = Discount::get();
        $color    = Color::get();
        $size     = Size::get();
        $category = Category::get();
        return view('Backend.add-product',compact('discount','color','size','category'));
    }

    public function addproduct(Request $request){
        $name = $request->name;
        $qty  = $request->qty;
        $regular_price = $request->regular_price;
        $discountid = $request->discount;
        $size    = $request->size;
        $color   = $request->color;
        // return $size;
        $category= $request-> category;
        $discription= $request->description;
        $thumbnail= $request->thumbnail;

        $discount = Discount::find($discountid);
        // return $discount;
        if($thumbnail){
            $thumbnailName = rand(1,99999).'-'.$thumbnail->getClientOriginalName();
            $thumbnail->move('images',$thumbnailName);
        }

        $sale_pice = $regular_price-($regular_price*$discount->name/100);

        try {
            $product = Product::create([
                'name' =>$name,
                'qty'=>$qty,
                'thumbnail'=>$thumbnailName,
                'description'=>$discription,
                'user_id'=>Auth::user()->id,
                'category_id'=>$category,
                'discount_id'=>$discountid,
                'sale_price'=>$sale_pice,
                'viewer'=>0,
                'regular_price'=>$regular_price,
            ]);
            $product ->sizes()->attach($size);
            $product ->colors()->attach($color);

            return redirect()->route('Product')->with('success','add product successfully');
        } catch (Exception $e) {
            return redirect()->route('Product')->with('notsuccess','add product not successfully');
        }
    }

    public function openupdatpro($id){

        $product  = Product::with('colors','sizes')->find($id);
        $discounts= Discount::get();
        $colors   = Color::get();
        $sizes    = Size::get();
        $categorys= Category::get();
        // return $products;

        return view('Backend.update-product',compact('product','discounts','colors','sizes','categorys'));
        
    }

    public function updatepro(Request $request){
        $id   = $request->id;
        $name = $request->name;
        $qty  = $request->qty;
        $regular_price = $request->regular_price;
        $discountid = $request->discount;
        $size    = $request->size;
        $color   = $request->color;
        // return $size;
        $category= $request-> category;
        $discription= $request->description;
        $thumbnail= $request->thumbnail;

        $discount = Discount::find($discountid);
        // return $discount;
        if($thumbnail){
            $thumbnailName = rand(1,99999).'-'.$thumbnail->getClientOriginalName();
            $thumbnail->move('images',$thumbnailName);
        }
        else{
            $thumbnailName = $request->old_thumbnail;
        }
        $sale_pice = $regular_price-($regular_price*$discount->name/100);
        try {
            $product = new Product();
            $product = $product->find($id);
            $product->update([
                'name' =>$name,
                'qty'        =>$qty,
                'thumbnail'  =>$thumbnailName,
                'description'=>$discription,
                'user_id'=>Auth::user()->id,
                'category_id'=>$category,
                'discount_id'=>$discountid,
                'sale_price'=>$sale_pice,
                'viewer'=>0,
                'regular_price'=>$regular_price,
            ]);
            $product ->sizes()->sync($size);
            $product ->colors()->sync($color);

            return redirect()->route('openupdatepro',$id)->with('update product success','');
        } catch (Exception $e) {
            return redirect()->route('openupdatepro',$id)->with('update product not success','');
        }
    }

    public function deletepro(Request $request){
        $id = $request->remove_id;
        // return $id;
        $product = Product::find($id);
        
        $product->sizes()->detach();
        $product->colors()->detach();
        $product->delete();
        return redirect()->route('viewpro')->with('success','Product deleted successfully...!');
    }

}