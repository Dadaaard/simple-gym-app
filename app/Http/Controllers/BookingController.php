<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use App\Models\ScheduledClass;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    
    
    public function index()
    {

        
        $bookings = Auth::user()->bookings()->get();

      

        return view('member.upcoming', compact('bookings'));
    }

    public function create()
    {
        $scheduledClasses = ScheduledClass::where('date_time', '>', now())->with('classType', 'instructor')->oldest()->get();
       
        return view('member.book', compact('scheduledClasses'));
    }

    public function store(Request $request)
    {

        Auth::user()->bookings()->attach($request->class_type_id);
        

        return redirect()->back();
    }

    public function destroy()
    {
        //
        $booking = Auth::user()->bookings()->detach();

        return redirect()->back();
    }
}
