<?php

namespace App\Http\Controllers;

use App\Type;
use App\Location;
use App\LocationImage;
use App\Jobs\ResizeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ManagerController extends Controller
{
    public function __construct(){
        $this->middleware('manager');
    }

    public function create(Request $request){

        $uniqueSecret = $request->old('uniqueSecret' , base_convert(sha1(uniqid(mt_rand())), 16, 36));

        return view('manager.create', compact('uniqueSecret'));
    }

    public function storeLoc(Request $request){

        $l = new Location();
        $user = Auth::user();
        
        
        $l->name=$request->input('name');
        $l->location=$request->input('location');
        $l->description=$request->input('description');
        $l->user_id=$user->id;
        $l->type_id=$request->input('type');

        $l->save();

        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}",[]);

        $images = array_diff($images, $removedImages);


        foreach ($images as $image) {
            $i = new LocationImage();

            $fileName = basename($image);
            $newFileName = "public/locations/{$l->id}/{$fileName}";
            Storage::move($image, $newFileName);

            dispatch(new ResizeImage(
                $newFileName,
                300,
                150
            )); 

            dispatch(new ResizeImage(
                $newFileName,
                700,
                300
            )); 

            $i->file = $newFileName;
            $i->location_id = $l->id;

            $i->save();

            
        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));


        return redirect()->back()->with('location.created','ok');
    }


    public function prenotazioni($name, $location_id){
        $location = Location::find($location_id);
        $bookings = $location->bookings()->get();

    return view('manager.prenotazioni', compact('location','bookings'));
    }

    public function locEdit(Location $location){
        return view('manager.edit', compact('location'));
    }

    public function locUpdate(Request $request, Location $location){
        $user = Auth::user();
        $location->name=$request->input('name');
        $location->location=$request->input('location');
        $location->description=$request->input('description');
        $location->user_id=$user->id;
        $location->type_id=$request->input('type');

        $location->update();

        return redirect('profile')->with('location.updated','ok');
    }

    public function locDelete(Location $location){
        $location->delete();
        return redirect('profile')->with('location.deleted','ok');
    }

    public function uploadImage(Request $request){


        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        
        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        )); 

        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json(
            [
                'id'=>$fileName
            ]
           );

    }

    public function removeImage(Request $request){

        $uniqueSecret = $request->input('uniqueSecret');

        $fileName = $request->input('id');

        session()->push("removedimages.{$uniqueSecret}", $fileName);

        Storage::delete($fileName);

        return response()->json('ok');
    }

    public function getImages(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}",[]);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images, $removedImages);
        
        $data = [];

        foreach ($images as $image) {
            $data[] = [
                'id' => $image,
                'src' =>LocationImage::getUrlByFilePath($image, 120, 120)
            ];
        }

        return response()->json($data);
    }

}
