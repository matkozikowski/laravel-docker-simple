<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\VoteServices;

class VoteServiceProvider extends ServiceProvider
{
    /**
     * Register VoteService class with the Laravel IoC container.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind('VoteService', function()
        {
            return VoteServices::class;
        });
    }
}
