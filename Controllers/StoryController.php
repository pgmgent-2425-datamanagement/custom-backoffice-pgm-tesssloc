<?php

namespace App\Controllers;

use App\Models\Story;
use App\Models\User;

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
        // find the story
        $story = Story::find($id);

        // get all users
        $users = User::all();

        // edit the story
        if(isset($_POST['title'])) {
            $story->title = $_POST['title'];
            $story->content = $_POST['content'];
            $story->user_id = $_POST['user_id'];
            $story->date_posted = $_POST['date_posted'];
            $story->save();
        };

        // load the view
        self::loadView('/stories/edit', [
            'title' => 'Edit story',
            'story' => $story,
            'users' => $users
        ]);
    }

    public static function get_stories() {
        $stories = Story::all();
        header("Content-type:application/json");

        echo json_encode($stories);

        exit;
    }
}