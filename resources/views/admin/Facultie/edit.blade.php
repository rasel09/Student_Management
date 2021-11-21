@extends('layouts.app')

@section('content')
<div class="container">

            <div class="card">
                <div class="card-header">Facultie Update</div>

                <div class="card-body">
                    <div class="department">
                        <form action="{{route('facultie.update',$faculties->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                              <label for="first_name">First_name</label>
                              <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First_name" value="{{$faculties->first_name}}">
                            </div>
                            @error('first_name')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="last_name">Last_name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last_name" value="{{$faculties->last_name}}">
                              </div>
                              @error('last_name')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{$faculties->email}}">
                              </div>
                              @error('email')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror
                              <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{$faculties->phone}}">
                              </div>
                              @error('phone')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror
                              
                              <div class="form-group">
                                <label for="department_id">Department</label>
                                  <select name="department_id" id="department_id" class="form-control">
                                  <option value="">Department_once</option>
                                  @foreach ( $departments  as $department)
                                    
                                  <option value="{{$department->id}}" {{$department->id==$faculties->id? 'selected' : ''}}>{{$department->title}}</option>
                                  @endforeach
                                </select>
                              </div>
                              @error('department_id')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror
                               
                            <button type="submit" class="btn btn-primary btn-sm">Upadate_Faculte</button>
                        </form>
                    </div>
                </div>
            </div>
        
    
</div>
@endsection
