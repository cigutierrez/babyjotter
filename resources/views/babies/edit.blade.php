@extends('layouts.app')

@section('content')

<div class="row mt-3">
    <div class="col">
        <form method="POST" action="/babies/{{ $baby->id }}">
            <!-- Because this is a patch -->
            @method('PATCH')
            <!-- Needed in order to authenticate against csrf attacks -->
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="textPrimary">Baby Name</label>
                <input type="text" class="form-control shadow" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter enter baby name" value="{{ $baby->name }}">
            </div>
            <div class="form-group">
                <label for="birthday" class="textPrimary">Birthday</label>
                <input type="date" class="form-control shadow" name="birthday" id="birthday" placeholder="MM/DD/YYYY" value="{{ $baby->birthday }}">
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="gender" value="boy" id="babyBoy" {{ $baby->gender == 'boy' ? 'checked' : '' }}>
                <label class="form-check-label textPrimary" for="babyBoy">Boy</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="gender" value="girl" id="babyGirl" {{ $baby->gender == 'girl' ? 'checked' : '' }}>
                <label class="form-check-label textPrimary" for="babyGirl">Girl</label>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-light btn-block textPrimary shadow">Submit</button>
            </div>

        </form>
        @include('layouts.errors')
    </div>
</div>

<!-- Back Button -->
<div class="row justify-content-center mt-5">
    <div class="col">
        <a href="/babies/{{ $baby->id }}" class="btn btn-light btn-block shadow textPrimary">Back</a>
    </div>
</div>

@endsection