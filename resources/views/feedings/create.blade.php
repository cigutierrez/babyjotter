@extends('layouts.app')

@section('content')

<h1 class="text-center">Enter Feeding</h1>
<form method="POST" action="/babies/{{ $id }}/feedings">
    <!-- Needed in order to authenticate against csrf attacks -->
    {{ csrf_field() }}
    <div class="form-group">
        <label for="type" class="textPrimary">Type</label>
        <select class="form-control shadow textPrimary" name="type" id="" class="form-control">
            <option value="" selected disabled>Please Select a Type</option>
            <option value="formula">Formula</option>
            <option value="breast">Breast Fed</option>
        </select>
    </div>
    <!-- This only shows when breast fed is selected though -->
    <!-- TODO Change this -->
    <!-- TODO I am validating this in the FeedingsRequest.php -->
    <div class="form-group">
        <label for="breast" class="textPrimary">Breast</label>
        <select class="form-control textPrimary shadow" name="breast" id="" class="form-control">
            <option value="" selected disabled>Please Select a Breast</option>
            <option value="left">Left</option>
            <option value="right">Right</option>
        </select>
    </div>
    <div class="form-group">
        <label for="amount" class="textPrimary">Amount</label>
        <input class="form-control textPrimary shadow" type="number" min=0 step=0.01 name="amount" id="amount">
    </div>
    <div class="form-group">
        <label for="measurement" class="textPrimary">Units</label>
        <select class="form-control textPrimary shadow" name="measurement" id="" class="form-control">
            <option value="" selected disabled>Please Select a Unit</option>
            <option value="oz">oz</option>
            <option value="ml">ml</option>
        </select>
    </div>
    <!-- TODO Make a better time element. Will have to use some JS for it. -->
    <div class="form-group">
        <label for="length" class="textPrimary">Length of Feeding</label>
        <input type="text" name="length" id="length" class="form-control textPrimary shadow" placeholder="HH:MM:SS">
    </div>
    <!-- For the baby's id -->
    <input type="hidden" name="babyId" value="{{$id}}">
    <button type="submit" class="btn btn-light btn-block textPrimary shadow">Submit</button>
</form>
@include('layouts.errors')

<!-- Back Button -->
<div class="row justify-content-center mt-5">
    <div class="col">
        <a href="/babies/{{ $id }}/feedings" class="btn btn-light btn-block shadow textPrimary">Back</a>
    </div>
</div>


@endsection