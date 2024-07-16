<?php

namespace App\Http\Controllers;


use App\Models\Departement;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the number of departments and students by counting the unique IDs
        $departementCount = Departement::count();
        $studentCount = Student::count();
        $goals = Departement::all();

        // Static values for other metrics, replace with actual logic if needed
        $cpuTraffic = 10; // Replace with actual logic if needed
        $likes = 41410; // Replace with actual logic if needed
        $sales = 760; // Replace with actual logic if needed
        $newMembers = 2000; // Replace with actual logic if needed

        // Pass the data to the view
        return view('Layout.content.dashboard', compact('studentCount', 'departementCount', 'cpuTraffic', 'likes', 'sales', 'newMembers', 'goals' ));
    }
}
