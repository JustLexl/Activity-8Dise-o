@extends('layouts.app')
@section('content')
  <style>
    .margin {
      margin-top: 40px;
    }
  </style>
  <div class="margin">
    @if (session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div><br />
    @endif
    <div class="row">
      <a class="btn btn-primary" href="{{ route('superhero.create') }}">Add New Superhero</a>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Real Name</th>
          <th>Hero Name</th>
          <th width="80px"></th>
          <th width="80px"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($superheroes as $superhero)
          <tr>
            <td><a href="{{ route('superhero.show', $superhero->id) }}">{{ $superhero->id }}</a></td>
            <td><a href="{{ route('superhero.show', $superhero->id) }}">{{ $superhero->real_name }}</a></td>
            <td><a href="{{ route('superhero.show', $superhero->id) }}">{{ $superhero->hero_name }}</a></td>
            <td><a href="{{ route('superhero.edit', $superhero->id) }}" class="btn btn-primary">Edit</a></td>
            <td>
              <form action="{{ route('superhero.destroy', $superhero->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
