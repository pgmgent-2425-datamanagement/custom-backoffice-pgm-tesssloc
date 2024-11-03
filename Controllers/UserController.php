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
        $user = User::find($id);

        $newProfilePic = $user->profilePic;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // find the user

        // directories
        $uploadDir = BASE_DIR . '/public/images/';
        $filePath = $uploadDir . $user->profilePic;

        // edit the user
        if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['username']) && isset($_POST['email'])) {
            if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {
                if (file_exists($filePath)) {
                    unlink($filePath);
                }

                // upload new file
                $uuid = uniqid() . '-' . $_FILES['profilePic']['name'];

                move_uploaded_file($_FILES['profilePic']['tmp_name'], $uploadDir . $uuid);

                $newProfilePic = $uuid;
            }

            if (!empty($_POST['password'])) {
                $user->password = $_POST['password'];
            }

            $user->firstName = $_POST['firstName'];
            $user->lastName = $_POST['lastName'];
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->profilePic = $newProfilePic;
            $user->save();

            header('Location: /users');
        }

        } else {            
            // load the view
            self::loadView('/users/edit', [
                'title' => 'Edit User',
                'user' => $user
            ]);
        }
    }
    
    public static function add () {
        // load view
        self::loadView('/users/add', [
            'title' => 'Add User'
        ]);
    }

    public static function store () {
        
        $name = $_FILES['profilePic']['name'];
        $tmp = $_FILES['profilePic']['tmp_name'];
        $to_folder = BASE_DIR . '/public/images/';

        $uuid = uniqid() . '-' . $name;

        move_uploaded_file($tmp, $to_folder . $uuid);
        
        // add the user
        $user = new User();
        $user->firstName = $_POST['firstName'];
        $user->lastName = $_POST['lastName'];
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        $user->email = $_POST['email'];
        $user->profilePic = $uuid;
        $success = $user->add();

        if($success) {
            header('Location: /users');
        } else {
            echo 'error';
        }
    }

    public static function delete ($id) {
        // delete the user
        $user = User::deleteById($id);

        // redirect to the list of users
        header('Location: /users');
    }

    public static function detail($id) {
        $user = User::find($id);

        self::loadView('/users/detail', [
            'title' => 'User detail',
            'user' => $user
        ]);
    }

    public static function get_users() {
        $search = $_GET['search'] ?? '';

        $users = User::search($search);
        header("Content-type:application/json");

        echo json_encode($users);

        exit;
    }
}
