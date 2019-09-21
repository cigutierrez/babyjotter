@extends('layout')

@section('content')
    <div class="container-fluid">
        @foreach($feedings as $feeding)
        <div class="row mt-3 justify-content-center">
            <div class="col-6 text-center">
                <h1>{{ $feeding->created_at }}</h1>
                <p class="lead">{{ $feeding->type }}</p>
            </div>
            <div class="col-2">
                <a href="#" class="btn btn-success btn-block">Edit</a>
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
        </div>
        
    </div>

    <!-- Insert navigation here -->
@endsection