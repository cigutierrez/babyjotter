@extends('layouts.app')

@section('content')

   <div class="row justify-content-center">
        <div class="col nameBox text-center ">
            @foreach($babies as $baby)
                <a href="/babies/{{ $baby->id }}" class="babyNameLink text-decoration-none">{{ $baby->name }}</a>
            @endforeach
            <!-- <ul class="list-group">
                @foreach($babies as $baby)
                    <a href="/babies/{{ $baby->id }}" class="list-group-item list-group-item-action text-center">{{ $baby->name }}</a>
                @endforeach
            </ul> -->
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <a href="/babies/create" class="btn btn-primary btn-lg">Add Baby</a>
    </div>

@endsection