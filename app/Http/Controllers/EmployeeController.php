<?php

namespace App\Http\Controllers;
Use App\Models\Employee;


use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Employeecontroller extends Controller
{
    //
    public function create(){
        return view('employees.create');
    }
    public function store(Request $request){

        $messages = [
            'email.unique' => 'The email address has already been taken. Please use a different email.',
        ];

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            // Add more validation rules as needed
        ], $messages);

        // Create a new Employee instance
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        // Add more fields as needed

        // Save the employee to the database
        $employee->save($validatedData);

        session()->flash('success', 'Employee added successfully!');

        // Optionally, you can redirect to a different page or return a response
        return redirect()->route('employee.create');

    }
    public function view(){
        $employees=Employee::query();
       // return view('employees.view',compact('employees'));
        return Datatables()::of($employees)->toJson();
    }
    public function index(){
        return view('employees.view');
    }
}
