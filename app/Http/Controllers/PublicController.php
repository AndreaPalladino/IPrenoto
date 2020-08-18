<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $types = Type::all();
        return view('welcome', compact('types'));
    }

    public function elencoAtt($name, $type_id){

        $type = Type::find($type_id);
        
        $locations = $type->location()->paginate(10);
        

        return view('elenco', compact('type', 'locations'));
    }

    
}
