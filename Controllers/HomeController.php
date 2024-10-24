<?php

namespace App\Controllers;

use App\Models\User;

class HomeController extends BaseController {

    public static function index () {
        $users = User::allWithStories();

        self::loadView('/home', [
            'title' => 'Homepage',
            'users' => $users
        ]);
    }
}