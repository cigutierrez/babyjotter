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
                <label for="babyAge">Age</label>
                <input type="number" min="0" class="form-control" name="age" id="babyAge" placeholder="Enter Age in Months">
                <small class="form-text text-muted">Please enter age in months</small>
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

    

@endsection