@extends('layout')

@section('content')
    <div class="container-fluid">
        <!-- If there are no naps (e.g. $naps is empty) -->
        @if(count($diapers) == 0)
            <div class="row mt-3 justify-content-center">
                <div class="col text-center">
                    <h1>No diapers entered!</h1>
                </div>
            </div>
        @endif
        @foreach($diapers as $diaper)
        <div class="row mt-3 justify-content-center">
            <div class="col-6 text-center">
                <h1>Type: {{ $diaper->type }}</h1>
            </div>
            <div class="col-3">
                <h2>Notes</h2>
                <p class="lead">{{ $diaper->notes }}</p>
            </div>
            <div class="col-1">
                <a href="/babies/{{ $diaper->baby_id }}/naps/{{ $diaper->id }}/edit" class="btn btn-success btn-block">Edit</a>
            </div>
            <div class="col-1">
                <!-- Delete Button -->
                <form action="/babies/{{ $diaper->baby_id }}/naps/{{ $diaper->id }}" method="post">
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
                <a href="/babies/{{$baby_id}}/diapers/create" class="btn btn-primary">Enter Diaper</a>
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