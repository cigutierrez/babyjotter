@extends('layout')

@section('content')

    <div class="container mt-3">
        <h1 class="text-center">Enter Feeding</h1>
        <form method="POST" action="/babies/{{ $id }}/feedings">
        <!-- Needed in order to authenticate against csrf attacks -->
        {{ csrf_field() }}
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type" id="" class="form-control">
                    <option value="" selected disabled>Please Select a Type</option>
                    <option value="formula">Formula</option>
                    <option value="breast">Breast Fed</option>
                </select>
            </div>
            <!-- This only shows when breast fed is selected though -->
            <!-- TODO Change this -->
            <!-- TODO I am validating this in the FeedingsRequest.php -->
            <div class="form-group">
                <label for="breast">Breast</label>
                <select class="form-control" name="breast" id="" class="form-control">
                    <option value="" selected disabled>Please Select a Breast</option>
                    <option value="left">Left</option>
                    <option value="right">Right</option>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input class="" type="number" min=0 step=0.01 name="amount" id="amount">
            </div>
            <div class="form-group">
                <label for="measurement">Units</label>
                <select class="form-control" name="measurement" id="" class="form-control">
                    <option value="" selected disabled>Please Select a Unit</option>
                    <option value="oz">oz</option>
                    <option value="ml">ml</option>
                </select>
            </div>
            <!-- TODO Make a better time element. Will have to use some JS for it. -->
            <div class="form-group">
                <label for="length">Length of Feeding</label>
                <input type="text" name="length" id="length" placeholder="HH:MM:SS">
            </div>
            <!-- For the baby's id -->
            <input type="hidden" name="babyId" value="{{$id}}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @include('layouts.errors')
    </div>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-2">
                <a href="/" class="btn btn-primary btn-lg">Home</a>
            </div>
            <div class="col-2">
                <a href="/babies" class="btn btn-primary btn-lg">Babies</a>
            </div>
            <div class="col-2 px-0">
                <a href="/babies/{{ $id }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>

@endsection