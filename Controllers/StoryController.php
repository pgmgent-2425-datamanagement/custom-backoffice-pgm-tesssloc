<?php

namespace App\Controllers;

use App\Models\Story;

class StoryController extends BaseController {

    public static function list () {
        $stories = Story::all();

        self::loadView('/home', [
            'title' => 'stories',
            'stories' => $stories
        ]);
    }

}