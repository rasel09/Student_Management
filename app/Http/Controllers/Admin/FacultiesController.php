<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Facultie;
use Illuminate\Http\Request;

class FacultiesController extends Controller
{
    public function index()
    {
        $faculties = Facultie::all();
        return view('admin.facultie.index', compact('faculties'));
    }
    public function create()
    {
        $departments = Department::all();
        return view('admin.facultie.create', compact('departments'));
    }
    public function store(Request $request)
    {

        // form validate
        $request->validate([
            'first_name' => 'required|max:80',
            'last_name' => 'required|max:80',
            'email' => 'required|max:150',
            'phone' => 'required|max:80',
            'department_id' => 'required|max:120',
        ]);

        Facultie::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department_id' => $request->department_id,
        ]);
        return redirect()->route('facultie.index')->with('success', 'Facultie data Added');
    }
    public function edit($id)
    {
        $faculties = Facultie::find($id);
        $departments = Department::all();
        return view('admin.facultie.edit', compact('faculties', 'departments'));
    }
    public function update(Request $request, $id)
    {
        // form validate
        $request->validate([
            'first_name' => 'required|max:80',
            'last_name' => 'required|max:80',
            'email' => 'required|max:150',
            'phone' => 'required|max:80',
            'department_id' => 'required|max:120',
        ]);

        Facultie::find($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department_id' => $request->department_id,
        ]);
        return redirect()->route('facultie.index')->with('success', 'Facultie data Updated');
    }
    public function destroy($id)
    {
        Facultie::destroy($id);
        return redirect()->route('facultie.index')->with('success', 'Facultie data deleted');
    }
}