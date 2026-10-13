@extends('layouts.app')

@section('content')
  <style>
    .uper {
      margin-top: 40px;
    }
  </style>
  <div class="card uper">
    <div class="card-header">
      Edit Superhero
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
      <form method="post" action="{{ route('superhero.update', $superhero->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="real_name">Superhero's Real Name:</label>
          <input type="text" class="form-control" name="real_name" value="{{ $superhero->real_name }}" />
        </div>
        <div class="form-group">
          <label for="hero_name">Name the Superhero is Known By:</label>
          <input type="text" class="form-control" name="hero_name" value="{{ $superhero->hero_name }}" />
        </div>
        <div class="form-group">
          <label for="picture">Superhero's Photo (URL):</label>
          <input type="text" class="form-control" name="picture" value="{{ $superhero->picture }}" />
        </div>
        <div class="form-group">
          <label for="additional_info">Additional Information:</label>
          <textarea rows="5" class="form-control" name="additional_info">{{ $superhero->additional_info }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('superhero.index') }}" class="btn btn-primary">Return</a>
      </form>
    </div>
  </div>
@endsection
