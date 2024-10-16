<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController {

    public static function list () {
        $users = User::all();

        self::loadView('/users/home', [
            'title' => 'Users',
            'users' => $users
        ]);
    }

    public static function edit ($id) {
        // find the user
        $user = User::find($id);

        // edit the user
        if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['profilePic'])) {
            $user->firstName = $_POST['firstName'];
            $user->lastName = $_POST['lastName'];
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->email = $_POST['email'];
            $user->profilePic = $_POST['profilePic'];
            $user->save();
        }

        // load the view
        self::loadView('/users/edit', [
            'title' => 'Edit User',
            'user' => $user
        ]);
    }

    public static function delete ($id) {
        // delete the user
        $user = User::deleteById($id);

        // redirect to the list of users
        header('Location: /users');
    }

    public static function get_users() {
        $users = User::all();
        header("Content-type:application/json");

        echo json_encode($users);

        exit;
    }
}
