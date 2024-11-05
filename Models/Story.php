<?php
namespace App\Models;

class Story extends BaseModel {
    // updates the new values of an object
    public function save() {
        $sql = "UPDATE stories SET title = :title, content = :content, user_id = :user_id, date_posted = :date_posted WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $succes = $pdo_statement->execute([
            ':title' => $this->title,
            ':content' => $this->content,
            ':user_id' => $this->user_id,
            ':date_posted' => $this->date_posted,
            ':id' => $this->id,
        ]);

        return $succes;
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
    protected function search($search, $id, $sort) {
        $sql = 'SELECT * FROM `' . $this->table . '`
            WHERE (title LIKE :search Or content LIKE :search)
        ';

        $params = [':search' => '%' . $search . '%'];

        if (!empty($id)) {
            $sql .= ' AND user_id = :id';
            $params[':id'] = $id;
        };

        if ($sort === 'date_posted_r') {
            $sql .= ' ORDER BY date_posted ASC';
        } else
        if ($sort === 'date_posted') {
            $sql .= ' ORDER BY date_posted DESC';
        } else
        if ($sort === 'alphabetical') {
            $sql .= ' ORDER BY title DESC';
        } else
        if ($sort === 'alphabetical_r') {
            $sql .= ' ORDER BY title ASC';
        } else
        if ($sort === 'standard') {
            $sql .= ' ORDER BY date_posted DESC';
        }

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute($params);

        $db_items = $pdo_statement->fetchAll(); 
        
        return self::castToModel($db_items);
    }

    // gets the story's user
    public function getUser() {
        return User::find($this->user_id);
    }

    // all stories per day
    protected function amountOfStoriesPerDay () {
        $sql = 'SELECT DATE(date_posted) AS posting_date, COUNT(*) AS numberOfStories
            FROM stories
            GROUP BY posting_date
            ORDER BY posting_date DESC
            LIMIT 10;
        ';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();

        $db_items = $pdo_statement->fetchAll(); 
        
        return self::castToModel($db_items);
    }
}