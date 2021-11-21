<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $stedetns = Student::all();
        return view('admin.student.index', compact('stedetns'));
    }
    public function create()
    {
        $classes = StudentClass::all();
        $departments = Department::all();
        return view('admin.student.create', compact('classes', 'departments'));
    }

    public function store(Request $request)
    {


        // validate form
        $request->validate([
            'name' => 'required|max:150',
            'phone_number' => 'required|max:50',
            'regs_id' => 'required|max:80',
            'roll' => 'required|max:50',
            'class_id' => 'required|max:90',
            'department_id' => 'required|max:90',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'father_name' => 'required|max:90',
            'mother_name' => 'required|max:90',
            'Address' => 'required',
        ]);

        $img = $request->file('image');

        $name_gne = hexdec(uniqid());
        $img_ext = strtolower($img->getClientOriginalExtension());
        $img_name = $name_gne . '. ' . $img_ext;
        $up_location = 'backend/student/';
        $last_img = $up_location . $img_name;
        $img->move($up_location, $img_name);


        Student::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'regs_id' => $request->regs_id,
            'roll' => $request->roll,
            'class_id' => $request->class_id,
            'department_id' => $request->department_id,
            'image' => $last_img,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'Address' => $request->Address,

        ]);
        return redirect()->route('student.index')->with('success', 'Student data Added');
    }
    public function edit($id)
    {
        $students = Student::find($id);
        $classes = StudentClass::all();
        $departments = Department::all();
        return view('admin.student.edit', compact('students', 'classes', 'departments'));
    }
    public function update(Request $request, $id)
    {


        // validate form
        $request->validate([
            'name' => 'required|max:150',
            'phone_number' => 'required|max:50',
            'regs_id' => 'required|max:80',
            'roll' => 'required|max:50',
            'class_id' => 'required|max:90',
            'department_id' => 'required|max:90',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'father_name' => 'required|max:90',
            'mother_name' => 'required|max:90',
            'Address' => 'required',
        ]);

        $img = $request->file('image');

        $name_gne = hexdec(uniqid());
        $img_ext = strtolower($img->getClientOriginalExtension());
        $img_name = $name_gne . '. ' . $img_ext;
        $up_location = 'backend/student/';
        $last_img = $up_location . $img_name;
        $img->move($up_location, $img_name);

        $img = Student::find($id);
        $old_img = $img->image;
        unlink($old_img);

        Student::find($id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'regs_id' => $request->regs_id,
            'roll' => $request->roll,
            'class_id' => $request->class_id,
            'department_id' => $request->department_id,
            'image' => $last_img,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'Address' => $request->Address,

        ]);
        return redirect()->route('student.index')->with('success', 'Student data Updated');
    }
    public function destroy($id)
    {
        $img = Student::find($id);
        $old_img = $img->image;
        unlink($old_img);

        Student::destroy($id);

        return redirect()->route('student.index')->with('success', 'Student data deleted');
    }
}