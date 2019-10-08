@extends('layouts.app')

@section('content')

    <h1 class="text-center">Enter Wet Diaper</h1>
    <form method="POST" action="/babies/{{ $id }}/diapers">
        <!-- Needed in order to authenticate against csrf attacks -->
        {{ csrf_field() }}
        <div class="form-group">
            <label for="type" class="textPrimary">Type</label>
            <select class="form-control" name="type" id="" class="form-control shadow">
                <option value="" selected disabled>Please Select a Type</option>
                <option value="pee">Pee</option>
                <option value="poop">Poop</option>
            </select>
        </div>
        <div class="form-group">
            <label for="notes" class="textPrimary">Notes</label>
            <textarea name="notes" id="notes" cols="30" rows="5" class="form-control shadow"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-light shadow form-control">Submit</button>
        </div>
    </form>
    @include('layouts.errors')

<!-- Back Button -->
<div class="row justify-content-center mt-5">
    <div class="col">
        <a href="/babies/{{ $id }}/diapers" class="btn btn-light btn-block shadow textPrimary">Back</a>
    </div>
</div>

@endsection