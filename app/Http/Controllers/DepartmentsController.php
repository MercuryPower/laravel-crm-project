<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function getDepartments()
    {
        $departments = Departments::all();
        return view('departments.departments', ['departments'=>$departments]);
    }

    public function create(){
        return view('departments.create', []);
    }

    public function store(Request $request){
        $departments = new Departments();
        $departments->name = $request->input('name');
        $departments->info = $request->input('info');
        $departments->save();

        return redirect() -> to(route("departments"));
    }

    public function delete($id)
    {
        $departments = Departments::find($id);
        $departments->delete();
        return  redirect()->route('departments');
    }

    public function edit($id)
    {
        $department = Departments::find($id);
        return view('departments.edit', ['department'=>$department]);
    }

    public function update(Request $request, $id)
    {
        $department = Departments::find($id);
        $department->name = $request->input('name');
        $department->info = $request->input('info');
        $department->save();

        return  redirect()->route('departments');
    }
}
