@extends('layout')

@section('content')
    <div class="container-fluid">
        @if(count($medications) < 1)
        <div class="row mt-3 justify-content-center">
            <div class="col-6 text-center">
                <h1>No Medications Found!</h1>
            </div>
        </div>
        @endif
        @foreach($medications as $med)
        <div class="row mt-3 justify-content-center">
            <div class="col-2 text-center">
                <h1>{{ $med->type }}</h1>
            </div>
            <div class="col-2 text-center">
                <h1>{{ $med->name }}</h1>
            </div>
            <!-- Conditionally render the how_often, times_per_day, amount, measurement, and notes -->
            @if($med->how_often > 0)
            <div class="col-2 text-center">
                <h5>How Often: {{ $med->how_often }}</h5>
            </div>
            @endif
            @if($med->times_per_day > 0)
            <div class="col-2 text-center">
                <h5>Times Per Day:{{ $med->times_per_day }}</h5>
            </div>
            @endif
            @if($med->amount > 0)
            <div class="col-2 text-center">
                <h5>Amount: {{ $med->amount }}</h5>
            </div>
            @endif
            @if($med->measurement != "")
            <div class="col-2 text-center">
                <h5>Measurement: {{ $med->measurement }}</h5>
            </div>
            @endif
            @if($med->notes != "")
            <div class="col-2 text-center">
                <h5>Notes: {{ $med->notes }}</h5>
            </div>
            @endif
            <div class="col-1">
                <a href="/babies/{{ $baby_id }}/medications/{{ $med->id }}/edit" class="btn btn-success btn-block">Edit</a>
            </div>
            <div class="col-1">
                <!-- Delete Button -->
                <form action="/babies/{{ $baby_id }}/medications/{{ $med->id }}" method="post">
                    @method('DELETE')
                    @csrf

                    <button id="deleteFeeding" class="btn btn-danger btn-block">DELETE</button>
                </form>
            </div>
        </div>
        @endforeach
        <div class="row justify-content-center mt-5">
            <div class="col-2 px-0">
                <a href="/babies/{{$baby_id}}/medications/create" class="btn btn-primary">Enter Medications</a>
            </div>
            <div class="col-2 px-0">
                <a href="/babies" class="btn btn-primary">Babies</a>
            </div>
            <div class="col-2 px-0">
                <a href="/babies/{{ $baby_id }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        
    </div>

    <!-- Insert navigation here -->
@endsection