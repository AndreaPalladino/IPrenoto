<?php

namespace App\Http\Controllers;


use App\Type;
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
        $locations = Location::all();
        $locations_1 = Location::where('type_id','=','2')->paginate(8);
        $locations_2 = Location::where('type_id','=','1')->paginate(8);
        $locations_3 = Location::where('type_id','=','3')->paginate(8);


        return view('prenota', compact('locations','locations_1', 'locations_2', 'locations_3'));
    }


    public function bookingStore(Request $request){

        $b = new Booking();
        $user = Auth::user();
        $b->name=$request->input('name');
        $b->email=$request->input('email');
        $b->location=$request->get('location');
        $b->number=$request->input('number');
        $b->user_id=$user->id;
        

        $b->save();

        
        return redirect('/')->with('booking.confirmation','confirm');
    }


    public function profile(){

         $user = Auth::user();
         $locations = $user->locations()->get();
         $bookings = Booking::where('email', '=', $user->email)->orderBy('created_at', 'desc')->paginate(6);

        return view('profile', compact('user','bookings','locations'));
    }

    public function edit(Booking $booking){
        return view('edit', compact('booking'));
    }

    public function update(Booking $booking, Request $request){
        
        $user = Auth::user();
        $booking->name=$request->input('name');
        $booking->email=$request->input('email');
        $booking->location=$request->input('location');
        $booking->number=$request->input('number');
        $booking->user_id=$user->id;
        $booking->update();

        return redirect('profile')->with('updated.success','ok');
    }

    public function deleteBooking(Booking $booking){
        $booking->delete();

        return redirect('profile')->with('deleted.booking','ok');
    }

    public function show(Location $location){
        return view('mostra', compact('location'));
    }

    
}
