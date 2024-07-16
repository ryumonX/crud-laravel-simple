<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getStudentData(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        // Fetch student count grouped by date
        $studentData = student::whereBetween('timestamp', [$start, $end])
            ->selectRaw('DATE(timestamp) as date, COUNT(*) as count')
            ->groupBy('date')
            ->get();

        return response()->json($studentData);
    }
}
