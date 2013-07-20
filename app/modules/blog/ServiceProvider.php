<?php namespace App\Modules\Blog;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register()
    {
        parent::register('blog');
    }

    public function boot()
    {
        parent::boot('blog');
    }

}