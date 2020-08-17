<?php

namespace App\Http\Controllers;

use App\Type;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function __construct(){
        $this->middleware('manager');
    }

    public function create(){

        return view('manager.create');
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
}
