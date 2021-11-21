@extends('layouts.app')

@section('content')
<div class="container">
            @if (Session('success'))
                <p class="alert alert-primary ">{{Session('success')}}</p>
            @endif
            <div class="card">
                <div class="card-header">All Class Name
                    <a href="{{route('class.create')}}" class="float-right btn btn-primary btn-sm">Add New</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            
                            <tr>
                                <th>Srial No</th>
                                <th>Class_name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentclass  as $row)
                                
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->class_name}}</td>
                                <td>
                                    <a href="{{route('class.edit',$row->id)}}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
                                    <form class="d-inline" action="{{route('class.destroy',$row->id)}}" method="POST">
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
@endsection
