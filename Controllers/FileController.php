<?php

namespace App\Controllers;

class FileController extends BaseController {
    public static function list () {
        $list = scandir(BASE_DIR . '/public/images');

        // print_r($list);
        
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
} 