<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class EmployeeManagementController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $employees = Employee::with('department')->get();
        return view('employees/index',compact('employees'));
    }
    public function create() {
         $departments = Department::all();
        return view('employees/create',compact('departments'));
    }

    public function store(Request $request) {
        $this->validate($request, [
          'name' => 'required|min:4|max:20|regex:/^[a-zA-Z\s]+$/',
          'email' => 'required|email|unique:employees,email', 
          'phone_number' => 'required|numeric|min:10',
          'department_id' => 'required',
      ]);
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->department_id = $request->department_id;
        $employee->save();
        return redirect()->intended('/employees');
    }

    public function edit($id) {
        $employee = Employee::find($id);
        $departments = Department::all();
        return view('employees/edit',['employee' => $employee,'departments' => $departments]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
         'name' => 'required|min:4|max:20|regex:/^[a-zA-Z\s]+$/',
         'email' => 'required',
         'phone_number' => 'required|numeric|min:10',
         'department_id' => 'required',
     ]);
        $employee = Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->department_id = $request->department_id;
        $employee->save();
        return redirect()->intended('/employees');
    }
    
    public function delete($id) {
     Employee::where('id', $id)->delete();
     return redirect()->intended('/employees');
 }
}