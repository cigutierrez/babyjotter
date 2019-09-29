@extends('layout')

@section('content')

    <div class="container mt-3">
        <h1 class="text-center">Enter Medication</h1>
        <form method="POST" action="/babies/{{ $medication->baby_id }}/medications/{{ $medication->id }}">
        <!-- Needed in order to authenticate against csrf attacks -->
        @method('PATCH')
        {{ csrf_field() }}
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type" id="" class="form-control">
                    <option value="" disabled>Please Select a Type</option>
                    <option value="liquid" {{ $medication->type == 'liquid' ? 'selected' : '' }} >Liquid</option>
                    <option value="pill" {{ $medication->type == 'pill' ? 'selected' : '' }} >Pill</option>
                    <option value="other" {{ $medication->type == 'other' ? 'selected' : '' }} >Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Medication Name</label>
                <input type="text" name="name" id="" value="{{ $medication->name }}">
            </div>
            <div class="form-group">
                <label for="how_often">How Often (Hours in between doses, if applicable)</label>
                <input type="number" name="how_often" step=0.25 id="" value="{{ $medication->how_often > 0 ? $medication->how_often : '' }}" >
            </div>
            <div class="form-group">
                <label for="times_per_day">Times Per Day (Amount of times per day for each dose, if applicable)</label>
                <input type="number" name="times_per_day" step=1 id="" value="{{ $medication->times_per_day > 0 ? $medication->times_per_day : '' }}" >
            </div>
            <div class="form-group">
                <label for="amount">Amount (If applicable)</label>
                <input type="number" name="amount" min=0.01 step=0.01 id="" value="{{ $medication->amount > 0 ? $medication->amount : '' }}" >
            </div>
            <div class="form-group">
                <label for="measurement">Units (If applicable)</label>
                <select class="form-control" name="measurement" id="" class="form-control">
                    <option value="" {{ $medication->measurement == 0 ? 'selected' : '' }}  disabled>Please Select a Unit</option>
                    <option value="oz" {{ $medication->measurement == 'oz' ? 'selected' : '' }} >oz</option>
                    <option value="ml" {{ $medication->measurement == 'ml' ? 'selected' : '' }} >ml</option>
                    <option value="g" {{ $medication->measurement == 'g' ? 'selected' : '' }} >g</option>
                    <option value="mg" {{ $medication->measurement == 'mg' ? 'selected' : '' }} >mg</option>
                </select>
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea class="form-control" name="notes" id="" cols="30" rows="5"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
            
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
            <div class="col-2">
                <a href="/babies/{{$medication->baby_id}}" class="btn btn-primary btn-lg">Back</a>
            </div>
        </div>
    </div>

@endsection