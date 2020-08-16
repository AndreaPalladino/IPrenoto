<?php

namespace App\Http\Controllers;


use App\User;
use App\Booking;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    public function prenota()
    {
        $locations_1 = Location::where('type_id','=','2')->paginate(8);
        $locations_2 = Location::where('type_id','=','1')->paginate(8);
        $locations_3 = Location::where('type_id','=','3')->paginate(8);


        return view('prenota', compact('locations_1', 'locations_2', 'locations_3'));
    }


    public function bookingStore(Request $request){

        $b = new Booking();
        $user = Auth::user();
        $b->name=$request->input('name');
        $b->email=$request->input('email');
        $b->location=$request->input('location');
        $b->number=$request->input('number');
        $b->user_id=$user->id;

        $b->save();

        
        return redirect('/')->with('booking.confirmation','confirm');
    }


    public function profile(){

         $user = Auth::user();
         $locations = $user->locations()->get();
         $bookings = Booking::where('email', '=', $user->email)->orderBy('created_at', 'desc')->paginate(6);
         $utenti = User::all();
         $prenotazioni = Booking::all();
         
            
        
         
         /* dd($lista); */

         /* $booking = Booking::all();
         $utenti = User::all();
         $users = User::where('name','=', $utenti->bookings->name)->paginate(10); */
         
        
         
         /* $bookings_1 = Booking::where('user_id','=',$users->id)->get(); */
       
         
         

        return view('profile', compact('user','bookings','locations', 'prenotazioni'));
    }
}
