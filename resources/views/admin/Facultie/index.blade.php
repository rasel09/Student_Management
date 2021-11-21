@extends('layouts.app')

@section('content')
<div class="container">

            @if (Session('success'))
                <p class="alert alert-primary ">{{Session('success')}}</p>
            @endif

            <div class="card">
                <div class="card-header">All Fscultie
                    <a href="{{route('facultie.create')}}" class="float-right btn btn-primary btn-sm">Add New</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            
                            <tr>
                                <th>Id</th>
                                <th>First_name</th>
                                <th>Last_name</th>
                                <th >Email</th>
                                <th >Phone</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faculties as $facultie)
                                
                            <tr>
                                <td>{{$facultie->id}}</td>
                                <td>{{$facultie->first_name}}</td>
                                <td>{{$facultie->last_name}}</td>
                                <td>{{$facultie->email}}</td>
                                <td>{{$facultie->phone}}</td>
                                <td>{{$facultie->facultie->title}}</td>
                                
                                <td>
                                    <a href="{{route('facultie.edit',$facultie->id)}}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
                                    <form class="d-inline" action="{{route('facultie.destroy',$facultie->id)}}" method="POST">
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
