<?php namespace App\Modules\Hello;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register()
    {
        parent::register('hello');
    }

    public function boot()
    {
        parent::boot('hello');
    }

}