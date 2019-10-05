@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col nameBox text-center shadow">
        <span class="babyName text-decoration-none">{{ $baby->name }}</span>
    </div>
</div>

<div class="row text-center justify-content-around mt-4" id="babyIconContainer">
    <!-- Feedings Button -->
    <div class="col-md-2 py-3">
        <a href="/babies/{{ $baby->id }}/feedings">
            <img src="/icons/feeding-icon.png" alt="Feedings Icon" class="babyBtns" height=150 width=150>
            <h4 class="pt-2 mt-3">Feedings</h4>
        </a>
    </div>
    <!-- Diapers Button -->
    <div class="col-md-2 py-3">
        <a href="/babies/{{ $baby->id }}/diapers">
            <img src="/icons/diaper.png" alt="Diapers Icon" class="babyBtns" height=150 width=150>
            <h4 class="pt-2 mt-3">Diapers</h4>
        </a>
    </div>
    <!-- Naps Button -->
    <div class="col-md-2 py-3">
        <a href="/babies/{{ $baby->id }}/naps">
            <img src="/icons/sleep.png" alt="Sleep Icon" class="babyBtns" height=150 width=150>
            <h4 class="pt-2 mt-3">Naps</h4>
        </a>
    </div>
    <!-- Medication -->
    <div class="col-md-2 py-3">
        <a href="/babies/{{ $baby->id }}/medications">
            <img src="/icons/medication.png" alt="Medication Icon" class="babyBtns" height=150 width=150>
            <h4 class="pt-2 mt-3">Medications</h4>
        </a>
    </div>
</div>

<!-- Back to babies button -->
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <a href="/babies" class="btn btn-light btn-block textPrimary shadow">Back to Babies</a>
    </div>
    <div class="col-md-6">
        <a href="/babies/{{ $baby->id }}/edit" class="btn btn-light btn-block textPrimary shadow">Edit Baby Details </a>
    </div>
</div>

@endsection