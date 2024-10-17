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

    // adds a new story
    public function add() {
        $sql = "INSERT INTO stories (`title`, `content`, `user_id`, `date_posted`) VALUES (:title, :content, :user_id, :date_posted)";

        $pdo_statement = $this->db->prepare($sql);
        $succes = $pdo_statement->execute([
            ':title' => $this->title,
            ':content' => $this->content,
            ':user_id' => $this->user_id,
            ':date_posted' => $this->date_posted,
        ]);

        return $succes;
    }

    // searches in stories
    protected function search($search) {
        $sql = 'SELECT * FROM `' . $this->table . '`
            WHERE title LIKE :search Or content LIKE :search
        ';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':search' => '%' . $search . '%',
        ]);

        $db_items = $pdo_statement->fetchAll(); 
        
        return self::castToModel($db_items);
    }
}