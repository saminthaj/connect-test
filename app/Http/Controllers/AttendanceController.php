<?php

namespace App\Http\Controllers;

use App\Imports\attendanceImporter;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;
use Src\AppHumanResources\Attendance\Domain\Attendance;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {
        $data = array();
        $attendances = Attendance::select(['date', 'employee_id'])->groupBy('date', 'employee_id')->get();
        foreach ($attendances as $attendance) {
            $dateAttendance = Attendance::where('date', $attendance->date)->where('employee_id', $attendance->employee_id)->get();
            $data[] = [
                'employee' => $attendance->employee->name,
                'checkin' => $dateAttendance->first()->time,
                'checkout' => $dateAttendance->last()->time,
                'duration' => Carbon::parse($dateAttendance->first()->time)->diffInMinutes(Carbon::parse($dateAttendance->last()->time)),
            ];
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function import(Request $request): RedirectResponse
    {
        $this->validate($request, ['file' => 'required|file']);
        Excel::import(new attendanceImporter($request), request()->file('file'));
        return back()->with(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param \Src\AppHumanResources\Attendance\Domain\Attendance $attendance
     * @return Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Src\AppHumanResources\Attendance\Domain\Attendance $attendance
     * @return Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \Src\AppHumanResources\Attendance\Domain\Attendance $attendance
     * @return Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Src\AppHumanResources\Attendance\Domain\Attendance $attendance
     * @return Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
