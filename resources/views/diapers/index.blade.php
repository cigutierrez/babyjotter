@extends('layouts.app')

@section('content')

<!-- Diaper Controls -->
<div class="row text-center justify-content-center mt-4" id="babyIconContainer">
    <!-- Enter a new Diaper -->
    <div class="col-md-6 py-3">
        <a href="/babies/{{ $baby_id }}/diapers/create">
            <img src="/icons/diaper.png" alt="Diapers Icon" class="babyBtns" height=150 width=150>
        </a>
    </div>
    <div class="col-12">
        <h4 class="textPrimary">Enter New Diaper</h4>
    </div>
</div>

@if(count($diapers) < 1) <div class="row mt-3 justify-content-center">
    <div class="col-6 text-center">
        <h1 class="textPrimary">No Diapers Found!</h1>
    </div>
    </div>
    @endif

    @foreach($diapers as $diaper)
    <div class="row mt-3 justify-content-between historyBox align-items-center shadow">
        <div class="col-md-4 text-center pt-2">
            <h5>Notes: {{ $diaper->notes }}</h5>
        </div>
        <div class="col-md-2 my-2 offset-md-4">
            <a href="/babies/{{ $baby_id }}/diapers/{{ $diaper->id }}/edit" class="btn btn-outline-success btn-block">Edit</a>
        </div>
        <div class="col-md-2 my-md-2 mt-2">
            <!-- Delete Button -->
            <form action="/babies/{{ $baby_id }}/diapers/{{ $diaper->id }}" method="post">
                @method('DELETE')
                @csrf

                <button id="deleteFeeding" class="btn btn-outline-danger btn-block">DELETE</button>
            </form>
        </div>
    </div>
    @endforeach


    <!-- Back Button -->
    <div class="row justify-content-center mt-5">
        <div class="col">
            <a href="/babies/{{ $baby_id }}" class="btn btn-light btn-block shadow textPrimary">Back</a>
        </div>
    </div>

    @endsection