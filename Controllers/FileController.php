<?php

namespace App\Controllers;

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
                $uploadedFilePath = $uploadDir . basename($_FILES['newFile']['name']);
                move_uploaded_file($_FILES['newFile']['tmp_name'], $uploadedFilePath);
            }
    
            header('Location: /files');
            exit;
        } else {
            self::loadView('/files/edit', [
                'file' => $file
            ]);
        }
    }
} 