@extends('layouts.app')

@section('content')
<div class="container">

            @if (Session('success'))
                <p class="alert alert-primary ">{{Session('success')}}</p>
            @endif

            <div class="card">
                <div class="card-header">All Student
                    <a href="{{route('student.create')}}" class="float-right btn btn-primary btn-sm">Add New</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>phone</th>
                                <th >Regs_id</th>
                                <th >Roll</th>
                                <th>class</th>
                                <th >Depart</th>
                                <th>Image</th>
                                <th>F_name</th>
                                <th >M_name</th>
                                <th >Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stedetns as $student)
                                
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->phone_number}}</td>
                                <td>{{$student->regs_id}}</td>
                                <td>{{$student->roll}}</td>
                                <td>{{$student->classes->class_name}}</td>
                                <td>{{$student->depart->title}}</td>
                                <td>
                                    <img src="{{asset($student->image)}}" alt="" style="width:60px;">
                                </td>
                                <td>{{$student->father_name}}</td>
                                <td>{{$student->mother_name}}</td>
                                <td>{{$student->Address}}</td>
                                <td>
                                    <a href="{{route('student.edit',$student->id)}}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
                                    <form class="d-inline" action="{{route('student.destroy',$student->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return cofirm('Are you shere deleted data')"><i class="fas fa-trash"></i></button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
    
</div>
@endsection
