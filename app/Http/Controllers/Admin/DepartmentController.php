<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::all();
        return view('admin.department.index', compact('departments'));
    }
    public function create()
    {
        return view('admin.department.create');
    }
    public function store(Request $request)
    {
        // form validate 
        $request->validate([
            'title' => 'required|max:150'
        ]);
        Department::create([
            'title' => $request->title,
        ]);
        return redirect()->route('depart.index')->with('success', 'Department data Added');
    }
    public function edit($id)
    {
        $departments = Department::find($id);
        return view('admin.department.edit', compact('departments'));
    }
    public function update(Request $request, $id)
    {
        // form validate 
        $request->validate([
            'title' => 'required|max:150'
        ]);
        Department::find($id)->update([
            'title' => $request->title,
        ]);
        return redirect()->route('depart.index')->with('success', 'Department data Updated');
    }
    public function destroy($id)
    {
        Department::destroy($id);
        return redirect()->route('depart.index')->with('success', 'Department data Deleted');
    }
}