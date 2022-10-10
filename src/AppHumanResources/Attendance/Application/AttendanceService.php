<?php

namespace Src\AppHumanResources\Attendance\Application;

use Illuminate\Http\Request;
use Src\AppHumanResources\Attendance\Domain\Attendance;

class AttendanceService
{
    public function __construct()
    {
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }

    public function create(Request $request): Attendance
    {
        $table = new Attendance();
        $table->firstOrCreate($request->all());
        return $table;
    }
}
