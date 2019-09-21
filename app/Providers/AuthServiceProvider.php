<?php

namespace App\Providers;

use App\Policies\FeedingsPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Baby' => 'App\Policies\BabyPolicy',
        'App\Feedings' => 'App\Policies\BabyPolicy',
        // 'App\Feedings' => 'App\Policies\FeedingsPolicy'
        // Laravel 6.0 way
        // Feedings::class => FeedingsPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
