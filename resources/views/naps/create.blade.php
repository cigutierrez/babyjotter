@extends('layouts.app')

@section('content')

<h1 class="text-center">Enter Nap</h1>
<form method="POST" action="/babies/{{ $id }}/naps">
    <!-- Needed in order to authenticate against csrf attacks -->
    {{ csrf_field() }}
    <div class="form-group">
        <label for="start_time">Start Time</label>
        <input type="time" name="start_time" id="startTime" class="form-control shadow textPrimary">
    </div>
    <button class="btn btn-light textPrimary mb-3" id="caclStartTime">Set Start Time</button>

    <div class="form-group">
        <label for="end_time">End Time</label>
        <input type="time" name="end_time" id="endTime" class="form-control shadow textPrimary">
    </div>
    <button class="btn btn-light textPrimary mb-3" id="calcEndTime">Set End Time</button>

    <!-- TODO: Add a calculate button that prefills this information from the start time and end time -->
    <div class="form-group">
        <label for="total">Total Time</label>
        <input type="number" min=0.01 step=0.01 name="total" id="totalTime" class="form-control shadow textPrimary">
    </div>
    <div class="form-group">
        <label for="notes">Notes</label>
        <textarea name="notes" id="notes" cols="30" rows="5" class="form-control shadow textPrimary"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-light form-control shadow textPrimary">Submit</button>
    </div>

</form>
@include('layouts.errors')

<!-- Back Button -->
<div class="row justify-content-center mt-5">
    <div class="col">
        <a href="/babies/{{ $id }}/naps" class="btn btn-light btn-block shadow textPrimary">Back</a>
    </div>
</div>

@endsection