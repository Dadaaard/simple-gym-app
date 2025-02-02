<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use App\Models\ScheduledClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduledClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $scheduledClasses = Auth::user()->scheduledClasses()
            ->where('date_time', '>', now())
            ->orderBy('date_time', 'asc')
            ->paginate(5);

        return view('instructor.upcoming', ['scheduledClasses' => $scheduledClasses]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $classTypes = ClassType::all();

        return view('instructor.schedule', ['classTypes' => $classTypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // combine date and time into a single datetime field
        $datetime = $request->input('date').' '.$request->input('time');

        // merge the datetime and instructor_id into the request for validation
        $request->merge([
            'date_time' => $datetime,
            'instructor_id' => Auth::id(),
        ]);

        $validated = $request->validate([
            'class_type_id' => 'required',
            'instructor_id' => 'required',
            'date_time' => 'required|unique:scheduled_classes,date_time|after:now',
        ]);

        // save the validated data into the database
        ScheduledClass::create($validated);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScheduledClass $schedule)
    {

        if (Auth::user()->cannot('delete', $schedule)) {
            abort(403);
        }
        $schedule->delete();

        return redirect()->route('schedule.index');
    }
}
