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
        return view('member.bookings');
    }

    public function create()
    {
        $scheduledClasses = ScheduledClass::where('date_time', '>', now())->oldest()->get();
       

        return view('member.book', compact('scheduledClasses'));
    }

    public function store(Request $request)
    {

        dd(Auth::check());
        // $validated = $request->validate([
        //     'scheduled_class_id' => 'required',
        // ]);

        // $scheduledClass = ScheduledClass::find($validated['scheduled_class_id']);
        // $scheduledClass->members()->attach(Auth::user()->id);

        // return redirect()->back()->with('success', 'Class scheduled successfully');
    }

    public function destroy()
    {
        //
    }
}
