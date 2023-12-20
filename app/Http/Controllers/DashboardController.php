<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $data['employees'] = Employee::count();
        $data['departments'] = Department::count();
         return view('dashboard',$data);
    }
}