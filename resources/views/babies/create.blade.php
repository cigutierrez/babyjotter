@extends('layout')

@section('content')

    <div class="container mt-3">
        <form method="POST" action="/babies">
        <!-- Needed in order to authenticate against csrf attacks -->
        {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Baby Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter enter baby name">
            </div>
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" class="form-control" name="birthday" id="birthday" placeholder="MM/DD/YYYY">
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="gender" value="boy" id="babyBoy">
                <label class="form-check-label" for="babyBoy">Boy</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="gender" value="girl" id="babyGirl">
                <label class="form-check-label" for="babyGirl">Girl</label>
            </div>
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
        </div>
    </div>

@endsection