@extends('layouts.app')

@section('content')
<div class="container">

            <div class="card">
                <div class="card-header">Create Student</div>

                <div class="card-body">
                    <div class="department">
                        <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                            @error('name')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="phone_number">phone_number</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="phone_number">
                              </div>
                              @error('phone_number')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror
                              <div class="form-group">
                                <label for="regs_id">Regs_id</label>
                                <input type="text" name="regs_id" id="regs_id" class="form-control" placeholder="Regs_id">
                              </div>
                              @error('regs_id')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror
                              <div class="form-group">
                                <label for="roll">Roll</label>
                                <input type="text" name="roll" id="roll" class="form-control" placeholder="Roll">
                              
                              @error('roll')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror
                              <div class="form-group">
                                <label for="class_id">Class</label>
                                  <select name="class_id" id="class_id" class="form-control">
                                      <option value="">Class_Once</option>
                                      @foreach ($classes  as $row)
                                      <option value="{{$row->id}}">{{$row->class_name}}</option>
                                      @endforeach
                                  </select>
                              </div>
                              @error('class_id')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror

                              <div class="form-group">
                                <label for="department_id">Department</label>
                                  <select name="department_id" id="department_id" class="form-control">
                                  <option value="">Department_once</option>
                                  @foreach ( $departments  as $department)
                                    
                                  <option value="{{$department->id}}">{{$department->title}}</option>
                                  @endforeach
                                </select>
                              </div>
                              @error('regs_id')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror
                            
                              <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" >
                              </div>
                              @error('image')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror
                              <div class="form-group">
                                <label for="father_name">Father_name</label>
                                <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Father_name">
                              </div>
                              @error('father_name')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror
                              <div class="form-group">
                                <label for="mothor_name">Mother_name</label>
                                <input type="text" name="mother_name" id="mothor_name" class="form-control" placeholder="Mother_name">
                              </div>
                              @error('mothor_name')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror
                              <div class="form-group">
                                <label for="address">Address</label>
                                  <textarea name="Address" id="address"  rows="6" class="form-control"></textarea>
                              </div>
                              @error('Address')
                                  <p class="text-danger mt-2">{{$message}}</p>
                              @enderror
                            <button type="submit" class="btn btn-primary btn-sm">Add_Student</button>
                        </form>
                    </div>
                </div>
            </div>
        
    
</div>
@endsection
