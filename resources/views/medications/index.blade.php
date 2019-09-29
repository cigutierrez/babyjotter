@extends('layout')

@section('content')
    <div class="container-fluid">
        @foreach($medications as $med)
        <div class="row mt-3 justify-content-center">
            <div class="col-3 text-center">
                <h1>{{ $med->type }}</h1>
            </div>
            <div class="col-1">
                <a href="/babies/{{ $baby_id }}/feedings/{{ $med->id }}/" class="btn btn-primary btn-block">Details</a>
            </div>
            <div class="col-1">
                <a href="/babies/{{ $baby_id }}/feedings/{{ $med->id }}/edit" class="btn btn-success btn-block">Edit</a>
            </div>
            <div class="col-1">
                <!-- Delete Button -->
                <form action="/babies/{{ $baby_id }}/feedings/{{ $med->id }}" method="post">
                    @method('DELETE')
                    @csrf

                    <button id="deleteFeeding" class="btn btn-danger btn-block">DELETE</button>
                </form>
            </div>
        </div>
        @endforeach
        <div class="row justify-content-center mt-5">
            <div class="col-2 px-0">
                <a href="/babies/{{$baby_id}}/medications/create" class="btn btn-primary">Enter Medications</a>
            </div>
            <div class="col-2 px-0">
                <a href="/babies" class="btn btn-primary">Babies</a>
            </div>
            <div class="col-2 px-0">
                <a href="/babies/{{ $baby_id }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        
    </div>

    <!-- Insert navigation here -->
@endsection