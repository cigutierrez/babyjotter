@extends('layout')

@section('content')

    <div class="container mt-3">
        <form method="POST" action="/babies/{{ $baby->id }}">
        <!-- Because this is a patch -->
        @method('PATCH')
        <!-- Needed in order to authenticate against csrf attacks -->
        {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Baby Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter enter baby name" value="{{ $baby->name }}">
            </div>
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" class="form-control" name="birthday" id="birthday" placeholder="MM/DD/YYYY" value="{{ $baby->birthday }}">
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="gender" value="boy" id="babyBoy" {{ $baby->gender == 'boy' ? 'checked' : '' }}>
                <label class="form-check-label" for="babyBoy">Boy</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="gender" value="girl" id="babyGirl" {{ $baby->gender == 'girl' ? 'checked' : '' }}>
                <label class="form-check-label" for="babyGirl">Girl</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @include('layouts.errors')
    </div>

    @include('layouts.bottomNavigation')

@endsection