@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <ul class="list-group">
                @foreach($babies as $baby)
                    <a href="/babies/{{ $baby->id }}" class="list-group-item list-group-item-action text-center">{{ $baby->name }}</a>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <a href="/babies/create" class="btn btn-primary btn-lg">Add Baby</a>
    </div>

</div>

@endsection