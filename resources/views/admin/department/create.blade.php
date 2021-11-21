@extends('layouts.app')

@section('content')
<div class="container">

            <div class="card">
                <div class="card-header">Create Department</div>

                <div class="card-body">
                    <div class="department">
                        <form action="{{route('depart.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                            </div>
                            @error('title')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                            <button type="submit" class="btn btn-primary btn-sm">Add_Department</button>
                        </form>
                    </div>
                </div>
            </div>
        
    
</div>
@endsection
