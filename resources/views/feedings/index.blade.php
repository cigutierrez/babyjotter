@extends('layouts.app')

@section('content')

@foreach($feedings as $feeding)
<div class="row mt-3 justify-content-center">
    <!-- Type -->
    <!-- Time Created -->
    <!-- Amount -->
    <!-- Type represented by symbol -->
    <div class="col-md-1">
        <!-- TODO: Make the symbol change depending on type -->
        <img src="/icons/bottle.png" class="img-fluid" alt="" srcset="">
    </div>

    <!-- Time Created -->
    <div class="col-md-2">
        {{ $feeding->created_at }}
    </div>

    <!-- <div class="col-6 text-center"> -->
    <!-- <h1>{{ $feeding->created_at }}</h1>
        <p class="lead">{{ $feeding->type }}</p>
    </div> -->
    <!-- <div class="col-1">
        <a href="/babies/{{ $id }}/feedings/{{ $feeding->id }}/" class="btn btn-primary btn-block">Details</a>
    </div>
    <div class="col-1">
        <a href="/babies/{{ $id }}/feedings/{{ $feeding->id }}/edit" class="btn btn-success btn-block">Edit</a>
    </div> -->
    <div class="col-1">
        <!-- Delete Button -->
        <form action="/babies/{{ $id }}/feedings/{{ $feeding->id }}" method="post">
            @method('DELETE')
            @csrf

            <button id="deleteFeeding" class="btn btn-danger btn-block">DELETE</button>
        </form>
    </div>
</div>
@endforeach
<div class="row justify-content-center mt-5">
    <div class="col-2 px-0">
        <a href="/babies/{{$id}}/feedings/create" class="btn btn-primary">Enter Feeding</a>
    </div>
    <div class="col-2 px-0">
        <a href="/babies" class="btn btn-primary">Babies</a>
    </div>
    <div class="col-2 px-0">
        <a href="/babies/{{ $id }}" class="btn btn-primary">Back</a>
    </div>
</div>



<!-- Insert navigation here -->
@endsection