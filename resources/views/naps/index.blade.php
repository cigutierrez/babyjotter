@extends('layouts.app')

@section('content')

<div class="row text-center justify-content-around mt-4" id="babyIconContainer">
    <!-- Naps Button -->
    <div class="col-md-6 py-3">
        <a href="/babies/{{ $baby_id }}/naps/create">
            <img src="/icons/sleep.png" alt="Sleep Icon" class="babyBtns" height=150 width=150>
            <h4 class="pt-2 mt-3">Create Nap</h4>
        </a>
    </div>
</div>

<!-- If there are no naps (e.g. $naps is empty) -->
@if(count($naps) == 0)
<div class="row mt-3 justify-content-center">
    <div class="col text-center">
        <h1>No naps found!</h1>
    </div>
</div>
@endif

@foreach($naps as $nap)
<div class="row mt-3 justify-content-between historyBox align-items-center shadow">
    <div class="col-md-2 text-center pt-2">
        <h4>Total Hours: {{ $nap->total }}</h4>
    </div>
    <div class="col-md-3 text-center pt-2">
        <h4>Notes: {{ $nap->notes }}</h4>
    </div>
    <div class="col-md-2 my-2 offset-md-3">
        <a href="/babies/{{ $baby_id }}/naps/{{ $nap->id }}/edit" class="btn btn-outline-success btn-block">Edit</a>
    </div>
    <div class="col-md-2 my-md-2 mt-2">
        <!-- Delete Button -->
        <form action="/babies/{{ $baby_id }}/naps/{{ $nap->id }}" method="post">
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