<?php namespace App\Modules\Blog\Controllers;

//Para Utilizar os Models
use App\Modules\Blog\Models\Post;

class BlogController extends \BaseController{

    /***
     * @return View
     */
    public function getIndex()
    {
        return \View::make('blog::index');
    }

}