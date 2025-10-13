<?php

namespace App\Providers;

use Front\Main\Components\FormSelect;
use Front\Main\Components\OffcanvasMenu;
use Illuminate\Support\Facades\Blade;

class FrontServiceProvider extends \Enesisrl\LaravelMasterCore\Providers\FrontServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
