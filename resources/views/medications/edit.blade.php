@extends('layouts.app')

@section('content')

    <h1 class="text-center">Enter Medication</h1>
    <form method="POST" action="/babies/{{ $medication->baby_id }}/medications/{{ $medication->id }}">
        <!-- Needed in order to authenticate against csrf attacks -->
        @method('PATCH')
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="textPrimary">Medication Name</label>
            <input type="text" class="shadow form-control" name="name" id="" value="{{ $medication->name }}">
        </div>
        <div class="form-group">
            <label for="amount" class="textPrimary">Amount</label>
            <input type="text" class="shadow form-control" name="amount" id="" value="{{ $medication->amount }}">
        </div>
        <div class="form-group">
            <label for="notes" class="textPrimary">Notes</label>
            <textarea class="form-control shadow" name="notes" id="" cols="30" rows="5">{{ $medication->notes }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-light btn-block shadow textPrimary form-control">Submit</button>
        </div>
    </form>
    @include('layouts.errors')

<!-- Back Button -->
<div class="row justify-content-center mt-5">
    <div class="col">
        <a href="/babies/{{ $medication->baby_id }}/medications" class="btn btn-light btn-block shadow textPrimary">Back</a>
    </div>
</div>

@endsection