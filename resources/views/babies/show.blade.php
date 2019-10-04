@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col nameBox text-center">
        <span class="babyName text-decoration-none">{{ $baby->name }}</span>
    </div>
</div>

<div class="row text-center justify-content-around mt-4" id="babyIconContainer">
    <!-- Feedings Button -->
    <div class="col-2 feedingBtn">
        <a href="">
            <img src="/icons/feeding.png" alt="Feedings Icon" height=150 width=150>
            <h4 class="pt-2">Feedings</h4>
        </a>
    </div>
    <!-- Diapers Button -->
    <div class="col-2">
        <a href="">
            <img src="/icons/diaper.png" alt="Feedings Icon" height=150 width=150>
            <h4 class="pt-2">Diapers</h4>
        </a>
    </div>
    <!-- Sleep Button -->
    <div class="col-2">
        <a href="">
            <img src="/icons/sleep.png" alt="Feedings Icon" height=150 width=150>
            <h4 class="pt-2">Naps</h4>
        </a>
    </div>
    <!-- Medication -->
    <div class="col-2">
        <a href="">
            <img src="/icons/medication.png" alt="Feedings Icon" height=150 width=150>
            <h4 class="pt-2">Medications</h4>
        </a>
    </div>
</div>


<!-- Insert navigation here -->
@include('layouts.bottomNavigation')
@endsection