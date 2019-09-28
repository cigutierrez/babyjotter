@extends('layout')

@section('content')

    <div class="container mt-3">
        <h1 class="text-center">Enter Wet Diaper</h1>
        <form method="POST" action="/babies/{{ $id }}/diapers">
        <!-- Needed in order to authenticate against csrf attacks -->
        {{ csrf_field() }}
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type" id="" class="form-control">
                    <option value="" selected disabled>Please Select a Type</option>
                    <option value="pee">Pee</option>
                    <option value="poop">Poop</option>
                </select>
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
            <div class="col-2 px-0">
                <a href="/babies/{{ $id }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>

@endsection