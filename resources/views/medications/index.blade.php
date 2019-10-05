@extends('layouts.app')

@section('content')

<!-- Medication Controls -->
<div class="row text-center justify-content-around mt-4" id="babyIconContainer">
    <!-- Enter a new Medication -->
    <div class="col-md-3">
        <a href="/babies/{{ $baby_id }}/medications/create">
            <img src="/icons/medication.png" alt="Medication Icon" class="babyBtns" height=150 width=150>
            <h4 class="pt-2 mt-3">Enter Medication</h4>
        </a>
    </div>
</div>

@if(count($medications) < 1) 

    <div class="row mt-3 justify-content-center">
        <div class="col-6 text-center">
            <h1 class="textPrimary">No Medications Found!</h1>
        </div>
    </div>
    @endif

    @foreach($medications as $med)
    <div class="row mt-3 justify-content-between historyBox align-items-center shadow">
        <div class="col-md-2 text-center pt-2">
            <h4>{{ $med->name }}</h4>
        </div>
        <div class="col-md-2 text-center pt-2">
            <h5>Amount: {{ $med->amount }}</h5>
        </div>
        <div class="col-md-3 text-center pt-2">
            <h5>Notes: {{ $med->notes }}</h5>
        </div>
        <div class="col-md-2 my-2">
            <a href="/babies/{{ $baby_id }}/medications/{{ $med->id }}/edit" class="btn btn-outline-success btn-block">Edit</a>
        </div>
        <div class="col-md-2 my-md-2 mt-2">
            <!-- Delete Button -->
            <form action="/babies/{{ $baby_id }}/medications/{{ $med->id }}" method="post">
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
            <a href="/babies/{{ $med->baby_id }}" class="btn btn-light btn-block shadow textPrimary">Back</a>
        </div>
    </div>

    @endsection