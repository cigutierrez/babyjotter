@extends('layout')

@section('content')
    <div class="container-fluid">
        <!-- If there are no naps (e.g. $naps is empty) -->
        @if(count($naps) == 0)
            <div class="row mt-3 justify-content-center">
                <div class="col text-center">
                    <h1>No naps found!</h1>
                </div>
            </div>
        @endif
        @foreach($naps as $nap)
        <div class="row mt-3 justify-content-center">
            <div class="col-6 text-center">
                <h1>Total: {{ $nap->total }}</h1>
                <p class="lead">Start Time: {{ $nap->start_time }}</p>
                <p class="lead">End Time: {{ $nap->end_time }}</p>
            </div>
            <div class="col-3">
                <h2>Notes</h2>
                <p class="lead">{{ $nap->notes }}</p>
            </div>
            <div class="col-1">
                <a href="/babies/{{ $nap->baby_id }}/naps/{{ $nap->id }}/edit" class="btn btn-success btn-block">Edit</a>
            </div>
            <div class="col-1">
                <!-- Delete Button -->
                <form action="/babies/{{ $nap->baby_id }}/naps/{{ $nap->id }}" method="post">
                    @method('DELETE')
                    @csrf

                    <button id="deleteFeeding" class="btn btn-danger btn-block">DELETE</button>
                </form>
            </div>
        </div>
        @endforeach
        <div class="row justify-content-center mt-5">
            <div class="col-2 px-0">
                <!-- We can use $naps[0] because all of the naps belong to the same baby -->
                <!-- Actually we can't use that because if there are no existing naps, we receive an error. -->
                <a href="/babies/{{$baby_id}}/naps/create" class="btn btn-primary">Enter Nap</a>
            </div>
            <div class="col-2 px-0">
                <a href="/babies" class="btn btn-primary">Babies</a>
            </div>
            <div class="col-2 px-0">
                <a href="/babies/{{ $baby_id }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>

@endsection