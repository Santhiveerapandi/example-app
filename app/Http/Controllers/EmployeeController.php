<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('name', 'asc')->paginate(2,['phone','email','name','joining_date','is_active','id']);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|numeric|unique:employees,phone',
            'joining_date' => 'required',
            'salary' => 'required|numeric',
            'is_active' => 'required'
        ],[
            'phone.unique' => 'Phone number already exist'
        ]);
        //Collect data
        $data= $request->except('_token');
        //Mass Data Assignment to DB
        Employee::create($data);
        // insert Single row
        // $employee = new Employee();
        // $employee->name=$data['name'];
        // $employee->email=$data['email'];
        // $employee->joining_date = $data['joining_date'];
        // $employee->salary = $data['salary'];
        // $employee->phone = $data['phone'];
        // $employee->is_active = $data['is_active'];
        // $employee->save();
        // dd('Successfully created');
        return redirect()->route('employee.index')->withSuccess('Employee has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        // $employee=Employee::find($id);
        // dd($employee);
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //validation data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'phone' => 'required|numeric|unique:employees,phone,'.$employee->id,
            'joining_date' => 'required',
            'salary' => 'required|numeric',
            'is_active' => 'required'
        ],[
            'phone.unique' => 'Phone number already exist'
        ]);
        // dd($employee);
        // dd($request->all());
        $data = $request->all();
        // $employee=Employee::find($id);
        $employee->update($data);
        // dd("Successfully updated!");
        return redirect()->route('employee.edit', $employee->id)->withSuccess('Employee details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        // dd($employee);
        $employee->delete();
        return redirect()->route('employee.index')->withSuccess("Employee deleted successfully!");
    }
}
