<?php

namespace App\Controllers;

use App\Models\Story;
use App\Models\User;

class StoryController extends BaseController {

    public static function list () {
        // get the search term
        $search = $_GET['search'] ?? '';

        $user_id = $_GET['user_id'] ?? '';

        $sort = $_GET['sort'] ?? '';

        // get stories
        $stories = Story::search($search, $user_id, $sort);

        // get user for story
        foreach ($stories as $story) {
            $story->user = $story->getUser();
        }

        // load view
        self::loadView('/stories/home', [
            'title' => 'stories',
            'stories' => $stories,
            'search' => $search,
            'user_id' => $user_id,
            'sort' => $sort,
        ]);
    }

    public static function edit ($id) {
        // find the story
        $story = Story::find($id);

        // get all users
        $users = User::all();

        // set $succes
        $succes = false;

        // edit the story
        if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['user_id']) && isset($_POST['date_posted'])) {
            $story->title = $_POST['title'];
            $story->content = $_POST['content'];
            $story->user_id = $_POST['user_id'];
            $story->date_posted = $_POST['date_posted'];
            $succes = $story->save();
        };

        // load the view
        self::loadView('/stories/edit', [
            'title' => 'Edit story',
            'story' => $story,
            'users' => $users
        ]);

        if($succes) {
            header('Location: /stories');
        }
    }

    
    public static function add () {
        // get all users
        $users = User::all();

        // load view
        self::loadView('/stories/add', [
            'title' => 'Add story',
            'users' => $users
        ]);
    }

    public static function store () {
        // add the story
        $story = new Story();
        $story->title = $_POST['title'];
        $story->content = $_POST['content'];
        $story->user_id = $_POST['user_id'];
        $story->date_posted = $_POST['date_posted'];
        $succes = $story->add();

        if($succes) {
            header('Location: /stories');
        } else {
            echo 'error';
        }
    }

    public static function delete ($id) {
        // delete the story
        $story = Story::deleteById($id);

        // redirect to the list of stories
        header('Location: /stories');
    }

    public static function detail($id) {
        // find the story
        $story = Story::find($id);

        // get the author of the story
        $user = $story->getUser();

        self::loadView('/stories/detail', [
            'title' => 'Story detail',
            'story' => $story,
            'user' => $user
        ]);
    }

    public static function get_stories() {
        $search = $_GET['search'] ?? '';
        $user_id = $_GET['user_id'] ?? '';
        $sort = $_GET['sort'] ?? '';

        $stories = Story::search($search, $user_id, $sort);
        header("Content-type:application/json");

        echo json_encode($stories);

        exit;
    }

    public static function add_story() {
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input['title'] || !$input['content'] || !$input['user_id']) {
            echo 'not all the info was added';
            exit;
        }

        $story = new Story();
        $story->title = $input['title'];
        $story->content = $input['content'];
        $story->user_id = $input['user_id'];
        $story->date_posted = date('Y-m-d H:i:s');
        $succes = $story->add();

        if ($succes) {

            echo json_encode($story);
        } else {
            echo 'error';
        }
    }
}