<?php

namespace App\Controllers;

use App\Models\Story;

class StoryController extends BaseController {

    public static function list () {
        $stories = Story::all();

        self::loadView('/stories/home', [
            'title' => 'stories',
            'stories' => $stories
        ]);
    }

    public static function edit ($id) {
        print_r($id);
        $story = Story::find($id);

        self::loadView('/stories/edit', [
            'title' => 'Edit story',
            'story' => $story
        ]);
    }
}