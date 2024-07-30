<?php

namespace App\Http\Controllers\Backend;

use File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Logo;

date_default_timezone_set('Asia/Phnom_Penh');

class LogoController extends Controller
{
    public function index(){
        $thumbnails = Logo::get();
        
        return view('Backend.view',compact('thumbnails'));
    }
    public function openAddLogo(){
        return view('Backend.addLogo');
    }
    public function addLogo(Request $request){
        // $input = $request->all();
        $thumbnail = $request->thumbnail;

        if($thumbnail){
            $thumbnailName = rand(1,99999).'-'.$thumbnail->getClientOriginalName();
            $thumbnail->move('images',$thumbnailName);
            $input['thumbnail'] = $thumbnailName;
            $res = Logo::create($input);
            $res->save();
            return redirect()->route('openAddLogo')->with('success','Logo success');
        }
        else{
            return redirect()->route('openAddLogo')->with('not success','not success');
        }
    }

    public function openUpdateLogo($id){
        $logo = DB::table("logos")->select('*')->where('id',$id)->first();
        return view('Backend.updateLogo',compact('logo'));
    }

    public function updateLogo(Request $request){ 
            $id = $request->id;
            $thumbnail = $request->thumbnail;
          
            if ($thumbnail) {

              $allowedMimeTypes = ['image/jpeg', 'image/png'];
              $maxFileSize = 2048 * 1024;
          
              if (!in_array($thumbnail->getMimeType(), $allowedMimeTypes)) {
                return redirect()->route('updateLogo')->with('updateError', 'Invalid file type. Only JPEG and PNG allowed.');
              }
              if ($thumbnail->getSize() > $maxFileSize) {
                return redirect()->route('updateLogo')->with('updateError', 'File exceeds the maximum upload size of 2 MB.');
              }

              $thumbnailImage = uniqid('', true) . '.' . $thumbnail->getClientOriginalExtension();

              try {
                $thumbnail->move('images', $thumbnailImage);
              } catch (Exception $e) {
                return redirect()->route('updateLogo')->with('updateError', 'Error uploading image: ' . $e->getMessage());
              }
              DB::table('logos')
                ->where('id', $id)
                ->update([
                  'thumbnail' => $thumbnailImage,
                  'updated_at' => date('Y-m-d H:i:s'),
                ]);
          
              return redirect()->route('openLogo')->with('updateSuccess', 'Logo updated successfully!');
            } else {
              $thumbnailImage = $request->old_thumbnail; 
            }
          
            return redirect()->route('updateLogo' . $id)->with('updateNotSuccess', 'An error occurred while updating the logo.'); // Improve error message
          }

      public function DeleteLogo(Request $request){
          $id = $request->input('remove-id');
          Logo::query()->where("id",$id)->delete();

          // DB::table('logos')->where('id',$id)->delete();
          return redirect()->route('openLogo')->with('deleteSuccess', 'Logo delete successfully!');
      }  
}
