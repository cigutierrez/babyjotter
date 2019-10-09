@extends('layouts.app')

@section('content')

<div class="row text-center justify-content-around mt-4" id="babyIconContainer">
    <!-- Feedings Button -->
    <div class="col-md-6 py-3">
        <a href="/babies/{{ $id }}/feedings/create">
            <img src="/icons/feeding-icon.png" alt="Feedings Icon" class="babyBtns" height=150 width=150>
            <h4 class="pt-2 mt-3">Enter New Feeding</h4>
        </a>
    </div>
</div>

@foreach($feedings as $feeding)
<div class="row mt-3 justify-content-between historyBox align-items-center shadow">
    <div class="col-md-2 text-center textPrimary">
        <h5>{{ ucFirst($feeding->type) }} feeding</h5>
    </div>
    @if($feeding->type == 'breast')
    <div class="col-md-2 text-center textPrimary">
        <h5>{{ ucFirst($feeding->breast) }}</h5>
    </div>
    @endif
    @if($feeding->type == 'formula')
    <div class="col-md-2 text-center textPrimary">
        <h5>{{ $feeding->amount }} {{ $feeding->measurement }}</h5>
    </div>
    @endif
    <div class="col-md-2 text-center textPrimary">
        <h5>Duration: {{ $feeding->length }}</h5>
    </div>

    <!-- Time Created -->
    <div class="col-md-2" id="feedingDate">
        <h5>{{ date_format(date_create($feeding->created_at), 'g:i A') }}</h5>
    </div>

    <!-- Edit Button -->
    <div class="col-md-2 my-2 ">
        <a href="/babies/{{ $feeding->baby_id }}/feedings/{{ $feeding->id }}/edit" class="btn btn-outline-success btn-block">Edit</a>
    </div>

    <div class="col-md-2 my-md-2 mt-2">
        <!-- Delete Button -->
        <form action="/babies/{{ $id }}/feedings/{{ $feeding->id }}" method="post">
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
        <a href="/babies/{{ $id }}/" class="btn btn-light btn-block shadow textPrimary">Back</a>
    </div>
</div>

@endsection