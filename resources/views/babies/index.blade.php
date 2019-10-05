@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    @foreach($babies as $baby)
        <div class="col-12 mt-3 nameBox text-center shadow">
            <a href="/babies/{{ $baby->id }}" class="babyNameLink text-decoration-none">{{ $baby->name }}</a>
        </div>
    @endforeach
</div>
<div class="row justify-content-center mt-3">
    <a href="/babies/create" class="btn btn-light shadow textPrimary btn-lg">Add Baby</a>
</div>

@endsection