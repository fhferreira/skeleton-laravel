<?php
class HomeController extends BaseController {

    /**
     * Returns HomePage.
     *
     * @return View
     */
    public function getIndex()
    {
        // Show the page
        return View::make('frontend/home');
    }

}