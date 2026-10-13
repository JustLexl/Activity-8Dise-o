@extends('layouts.app') 

@section('content') 
  <style> 
    .uper { 
      margin-top: 40px; 
    } 

  </style> 
  <div class="card uper"> 
    <div class="card-header"> 
      Edit Student 
    </div> 
    <div class="card-body"> 
      @if ($errors->any()) 
        <div class="alert alert-danger"> 
          <ul> 
            @foreach ($errors->all() as $error) 
              <li>{{ $error }}</li> 
            @endforeach 
          </ul> 
        </div><br /> 
      @endif 
      <form method="post" action="{{ route('student.update', $student->id) }}"> 
        @csrf 
        @method('PATCH') 
          <div class="form-group"> 
          <label for="picture">Picture:</label> 
          <input type="text" class="form-control" name="picture" /> 
        </div> 
        <div class="form-group"> 
          <label for="first_name">Superheroes RealName:</label> 
          <input type="text" class="form-control" name="first_name" value="{{ $student->first_name }}" /> 
        </div> 
        <div class="form-group"> 
          <label for="last_name">Name is known:</label> 
          <input type="text" class="form-control" name="last_name" value="{{ $student->last_name }}" /> 
        </div> 
        <div class="form-group"> 
          <label for="symptoms">Aditional Information :</label> 
          <textarea rows="5" columns="5" class="form-control" name="description">{{ $student->description }}</textarea> 
        </div> 
        <button type="submit" class="btn btn-primary">Save</button> 
        <a href="{{ route('student.index') }}" class="btn btn-primary">Return</a> 
      </form> 
    </div> 
  </div> 
@endsection 