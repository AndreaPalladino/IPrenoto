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
}
