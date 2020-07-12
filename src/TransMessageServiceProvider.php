<?php

namespace Helmab\TransMessage;

use Illuminate\Support\ServiceProvider;

class TransMessageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            TransMessageCommand::class,
        ]);
    }
}
