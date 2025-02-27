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
        
        $bookings = Auth::user()->bookings()->Upcoming()->get();

        

        return view('member.upcoming', compact('bookings'));
    }

    public function create()
    {
        $scheduledClasses = ScheduledClass::upcoming()
        ->with('classType', 'instructor')
        ->whereDoesntHave('members', 
        function ($query) { 
            $query->where('user_id', Auth::id()); 
        })
        ->oldest('date_time')->get();
       
        return view('member.book', compact('scheduledClasses'));
    }

    public function store(Request $request)
    {


        Auth::user()->bookings()->attach($request->class_type_id);
        
        

        return redirect()->back();
    }

    public function destroy(int $id)
    {
     
        
        Auth::user()->bookings()->detach($id);

        return redirect()->back();
    }
}
