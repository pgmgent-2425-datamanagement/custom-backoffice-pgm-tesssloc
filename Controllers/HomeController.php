<?php

namespace App\Controllers;

use App\Models\Story;
use App\Models\User;

class HomeController extends BaseController {

    public static function index () {
        $users = User::allWithStories();
        $stories= Story::amountOfStoriesPerDay();

        self::loadView('/home', [
            'title' => 'Homepage',
            'users' => $users,
            'stories' => $stories
        ]);
    }
}