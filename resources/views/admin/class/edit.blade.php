@extends('layouts.app')

@section('content')
<div class="container">
            <div class="card">
                <div class="card-header">Update Class</div>

                <div class="card-body">
                    <div class="department">
                        <form action="{{route('class.update',  $studentclass->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                              <label for="class_name">Class_name</label>
                              <input type="text" name="class_name" id="class_name" class="form-control" placeholder="Class_name" value="{{ $studentclass->class_name}}">
                            </div>
                            @error('class_name')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                            <button type="submit" class="btn btn-primary btn-sm">Update_Class</button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
@endsection
