@extends('layouts.app')

@section('content')
<div class="container">

            @if (Session('success'))
                <p class="alert alert-primary ">{{Session('success')}}</p>
            @endif
            <div class="card">
                <div class="card-header">All Department
                    <a href="{{route('depart.create')}}" class="float-right btn btn-primary btn-sm">Add New</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            
                            <tr>
                                <th>Srial No</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                
                            <tr>
                                <td>{{$department->id}}</td>
                                <td>{{$department->title}}</td>
                                <td>
                                    <a href="{{route('depart.edit',$department->id)}}" class="btn btn-success btn-sm">Edit</i></a>
                                    <form class="d-inline" action="{{route('depart.destroy',$department->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return cofirm('Are you shere deleted data')">Delete</button>
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
