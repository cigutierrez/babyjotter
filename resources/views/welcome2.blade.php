@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1 class=" text-center">Welcome to My Baby Jotter</h1>
        <h4 class=" text-center">Please Login or Register!</h4>
    </div>
</div>
<div class="row justify-content-center pt-3">
    <div class="col-3 text-center">
        <a href="{{ route('login') }}" class="btn btn-light btn-block">Login</a>
    </div>
    <div class="col-3 text-center">
        <a href="{{ route('register') }}" class="btn btn-light btn-block">Register</a>
    </div>
</div>
@endsection

<!-- TODO: Get rid of this later -->
<!-- @guest
                            <li class="nav-item">
                                <a class="nav-link h3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest -->