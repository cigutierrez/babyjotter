@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col nameBox text-center">
        <span class="babyName text-decoration-none">{{ $baby->name }}</span>
    </div>
</div>

<div class="row text-center justify-content-around mt-4" id="babyIconContainer">
    <!-- Feedings Button -->
    <div class="col-md-2">
        <a href="">
            <img src="/icons/feeding-icon.png" alt="Feedings Icon" class="babyBtns" height=150 width=150>
            <h4 class="pt-2">Feedings</h4>
        </a>
    </div>
    <!-- Diapers Button -->
    <div class="col-md-2">
        <a href="">
            <img src="/icons/diaper.png" alt="Diapers Icon" class="babyBtns" height=150 width=150>
            <h4 class="pt-2">Diapers</h4>
        </a>
    </div>
    <!-- Sleep Button -->
    <div class="col-md-2">
        <a href="">
            <img src="/icons/sleep.png" alt="Sleep Icon" class="babyBtns" height=150 width=150>
            <h4 class="pt-2">Naps</h4>
        </a>
    </div>
    <!-- Medication -->
    <div class="col-md-2">
        <a href="">
            <img src="/icons/medication.png" alt="Medication Icon" class="babyBtns" height=150 width=150>
            <h4 class="pt-2">Medications</h4>
        </a>
    </div>
</div>

<!-- Edit Baby Button -->
<div class="row justify-content-center mt-3">
    <div class="col-md-4">
        <a href="/babies/{{ $baby->id }}/edit" class="btn btn-light btn-block">Edit Baby Details </a>
    </div>
</div>

<!-- Back to babies button -->
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <a href="/babies" class="btn btn-light btn-block">Back to Babies</a>
    </div>
</div>



@endsection