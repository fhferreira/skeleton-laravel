<?php

Route::get('/hello', function()
{
    return View::make('hello::hello');
});