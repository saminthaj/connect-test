<?php

namespace App\Imports;

use App\Employee;
use App\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Src\AppHumanResources\Attendance\Application\AttendanceService;

class attendanceImporter implements ToModel, WithStartRow
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        DB::transaction(function () use ($row) {
            $employee = Employee::where('attendance_number', [$row[1]])->first();
            $location = Location::where('device_id', [$row[0]])->first();
            $service = new AttendanceService();
            $service->create((new Request())->replace([
                'employee_id' => $employee->id,
                'location_id' => $location->id,
                'date' => Carbon::instance(Date::excelToDateTimeObject($row[2]))->toDateString(),
                'time' => Carbon::instance(Date::excelToDateTimeObject($row[3]))->toTimeString(),
                'attendance_id' => $row[1],
            ]));
        });
    }

    public function startRow(): int
    {
        return 2;
    }
}
