<?php

Route::get('blog', array('as' => 'blog.index',
                          'uses' => 'App\Modules\Blog\Controllers\BlogController@getIndex'));