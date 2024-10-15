<?php
namespace App\Models;

class Story extends BaseModel {
    // updates the new values of an object
    public function save() {
        $sql = "UPDATE stories SET title = :title, content = :content, user_id = :user_id, date_posted = :date_posted WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':title' => $this->title,
            ':content' => $this->content,
            ':user_id' => $this->user_id,
            ':date_posted' => $this->date_posted,
            ':id' => $this->id,
        ]);
    }
}