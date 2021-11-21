<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $studentclass = StudentClass::all();
        return view('admin.class.index', compact('studentclass'));
    }
    public function create()
    {
        return view('admin.class.create');
    }
    public function store(Request $request)
    {
        // form validate 
        $request->validate([
            'class_name' => 'required|max:150'
        ]);
        StudentClass::create([
            'class_name' => $request->class_name,
        ]);
        return redirect()->route('class.index')->with('success', 'Class data Added');
    }
    public function edit($id)
    {
        $studentclass = StudentClass::find($id);
        return view('admin.class.edit', compact('studentclass'));
    }
    public function update(Request $request, $id)
    {
        // form validate 
        $request->validate([
            'class_name' => 'required|max:150'
        ]);
        StudentClass::find($id)->update([
            'class_name' => $request->class_name,
        ]);
        return redirect()->route('class.index')->with('success', 'Class data Updated');
    }
    public function destroy($id)
    {
        StudentClass::destroy($id);
        return redirect()->route('class.index')->with('success', 'Class data Deleted');
    }
}