@extends('layout')

@section('content')
    @foreach($feedings as $feeding)
        <h1>{{ $feeding }}</h1>
    @endforeach

    <!-- Insert navigation here -->
@endsection