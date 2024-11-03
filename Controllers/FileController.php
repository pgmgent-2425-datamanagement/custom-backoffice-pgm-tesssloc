<?php

namespace App\Controllers;

use App\Models\User;

class FileController extends BaseController {
    public static function list () {
        $list = scandir(BASE_DIR . '/public/images');

        // load view
        self::loadView('/files/home', [
            'list' => $list
        ]);
    }


    public static function delete ($file) {
        if ($file) {
            unlink(BASE_DIR . '/public/images/' . $file);
        }

        header('Location: /files');
    }

    public static function edit($file) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadDir = BASE_DIR . '/public/images/';
            $filePath = $uploadDir . $file;
    
            //  check if new file exists
            if (isset($_FILES['newFile']) && $_FILES['newFile']['error'] === UPLOAD_ERR_OK) {
                // delete old file
                if (file_exists($filePath)) {
                    unlink($filePath);
                }

                // upload new file
                $uuid = uniqid() . '-' . $_FILES['newFile']['name'];

                move_uploaded_file($_FILES['newFile']['tmp_name'], $uploadDir . $uuid);
            }

            $oldFile = $_POST['oldFile'];
            $user = User::findByProfilePic($oldFile);
            $user->profilePic = $uuid;
            $user->save();
    
            print_r($oldFile);
            
            header('Location: /files');
            exit;
        } else {
            self::loadView('/files/edit', [
                'file' => $file
            ]);
        }
    }

    public static function add () {
        // get all users
        $users = User::all();

        // load view
        self::loadView('/files/add', [
            'title' => 'Add file',
            'users' => $users,
        ]);
    }

    public static function store () {
        $name = $_FILES['profilePic']['name'];
        $tmp = $_FILES['profilePic']['tmp_name'];
        $to_folder = BASE_DIR . '/public/images/';

        $uuid = uniqid() . '-' . $name;

        move_uploaded_file($tmp, $to_folder . $uuid);

        $user_id = $_POST['user_id'];

        $user = User::find($user_id);

        $user->profilePic = $uuid;
        $user->save();

        header('Location: /files');
    }
} 