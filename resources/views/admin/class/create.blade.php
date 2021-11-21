@extends('layouts.app')

@section('content')
<div class="container">
            <div class="card">
                <div class="card-header">Create Class</div>
                <div class="card-body">
                    <div class="department">
                        <form action="{{route('class.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="class_name">Class_name</label>
                              <input type="text" name="class_name" id="class_name" class="form-control" placeholder="Class_name">
                            </div>
                            @error('class_name')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                            <button type="submit" class="btn btn-primary btn-sm">Add_class</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
