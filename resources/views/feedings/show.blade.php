@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <h1>Feeding Type: {{ $feeding->type }}</h1>
                <p class="lead">Amount: {{ $feeding->amount }}</p>
                <p class="lead">Length: {{ $feeding->length }}</p>
                <p class="lead">Time Created: {{ $feeding->created_at }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="/babies/{{ $feeding->baby_id }}/feedings" class="btn btn-primary btn-block">Back</a>
            </div>
        </div>
    </div>
@endsection