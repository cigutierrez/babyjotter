@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                <h1 class="display-2 text-center">{{ $baby->name }}</h1>
            </div>
            <div class="col-3 align-self-center">
                <h1 class="display-2 text-center">{{ $baby->gender }}</h1>
            </div>

        </div>

        <!-- Feedings and stuff will go here -->
        <div class="row align-items-center mt-3">
            <div class="col-4">
                <h2 class="text-center display-4">Birthday</h2>
                <h3 class="text-center">{{ date_create($baby->birthday)->format("m/d/Y") }}</h3>
            </div>
            <div class="col-4">
                <p class="lead">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis officiis laborum, voluptatum amet architecto provident incidunt sequi hic ducimus doloremque. Itaque maxime porro exercitationem quidem dolorum repellendus tempora, harum quisquam nostrum quaerat reiciendis aperiam aliquid aspernatur quam repellat officiis a blanditiis dolores. Id velit debitis distinctio voluptatum, iusto dolor dignissimos nam assumenda suscipit laudantium. Facilis reprehenderit optio quidem consequatur ratione?
                </p>
            </div>
            <div class="col-4">
                <p class="lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius est quam ut corporis magni quia, omnis id possimus corrupti, vero molestiae blanditiis dolore dignissimos! Voluptatum ea culpa vel? Molestias beatae numquam eum molestiae blanditiis, earum pariatur quam similique possimus fugiat consequatur, reprehenderit ex sint corrupti harum ipsam modi voluptate debitis natus assumenda ratione iusto doloribus quis! Labore mollitia deleniti nisi similique aliquam cumque eius. Hic ratione dicta ad! Similique, magni!
                </p>
            </div>
        </div>
    </div>

    <!-- Insert navigation here -->
    @include('layouts.bottomNavigation')
@endsection