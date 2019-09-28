@extends('layout')

@section('content')

    <div class="container mt-3">
        <h1 class="text-center">Enter Nap</h1>
        <form method="POST" action="/babies/{{ $id }}/naps">
        <!-- Needed in order to authenticate against csrf attacks -->
        {{ csrf_field() }}
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="time" name="start_time" id="startTime" class="form-control">
            </div>
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="time" name="end_time" id="endTime" class="form-control">
            </div>

            <!-- TODO: Add a calculate button that prefills this information from the start time and end time -->
            <div class="form-group">
                <label for="total">Total Time</label>
                <input type="number" min=0.01 step=0.01 name="total" id="total" class="form-control">
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea name="notes" id="notes" cols="30" rows="5" class="form-control"></textarea>
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
                <a href="/babies/{{$id}}" class="btn btn-primary btn-lg">Back</a>
            </div>
        </div>
    </div>

@endsection