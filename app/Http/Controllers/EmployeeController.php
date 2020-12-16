<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function addEmployee(){
    	return view('add-Employee');
    }
    public function createEmployee(Request $request){
        $request->validate([
            'EName' => 'required',
            'EMail' => 'required|email|unique:employee',
            'EAddress' => 'required',
            'EDepartment' => 'required',
            'ERole' => 'required',
            'EPhn' => 'required'
        ]);
    	$employee = new Employee();
    	$employee->Employeename = $request->EName;
    	$employee->Employeemail = $request->EMail;
    	$employee->Employeeaddress = $request->EAddress;
    	$employee->Employeedepartment = $request->EDepartment;
    	$employee->Employeerole = $request->ERole;
    	$employee->Employeephonenumber = $request->EPhn;
    	$employee->save();
    	return back()->with('employee_created', 'Employee Record has been created successfully');
    }
    public function getEmployee(){
    	$employees = Employee::orderBy('id', 'ASC')->get();
    	return view('employees', compact('employees'));
    }
    public function getEmployeeById($id){
    	$employee = Employee::where('id', $id)->first();
    	return view('single-employee', compact('employee'));
    }
    public function deleteEmployee($id){
    	Employee::where('id', $id)->delete();
    	return back()->with('employee_deleted', 'Employee Record has been deleted successfully');
    }
    public function editEmployee($id){
    	$employee = Employee::find($id);
    	return view('edit-employee', compact('employee'));
    }
    public function updateEmployee(Request $request){
    	$employee = Employee::find($request->id);
    	$employee->Employeename = $request->EName;
    	$employee->Employeemail = $request->EMail;
    	$employee->Employeeaddress = $request->EAddress;
    	$employee->Employeedepartment = $request->EDepartment;
    	$employee->Employeerole = $request->ERole;
    	$employee->Employeephonenumber = $request->EPhn;
    	$employee->save();
    	return back()->with('employee_updated', 'Employee Record has been updated successfully');
    }
}
