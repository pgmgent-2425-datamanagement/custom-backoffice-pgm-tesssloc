<?php
namespace App\Models;

class User extends BaseModel {
    // updates the new values of an object
    public function save() {
        $sql = "UPDATE users SET firstName = :firstName, lastName = :lastName, username = :username, password = :password, email = :email, profilePic = :profilePic WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':firstName' => $this->firstName,
            ':lastName' => $this->lastName,
            ':username' => $this->username,
            ':password' => $this->password,
            ':email' => $this->email,
            ':profilePic' => $this->profilePic,
            ':id' => $this->id,
        ]);
    }

        // adds a new user
        public function add() {
            $sql = "INSERT INTO users (`firstName`, `lastName`, `username`, `password`, `email`, `profilePic`) VALUES (:firstName, :lastName, :username, :password, :email, :profilePic)";
        
            $pdo_statement = $this->db->prepare($sql);
            $success = $pdo_statement->execute([
            ':firstName' => $this->firstName,
            ':lastName' => $this->lastName,
            ':username' => $this->username,
            ':password' => $this->password,
            ':email' => $this->email,
            ':profilePic' => $this->profilePic,
            ]);
        
            return $success;
        }

        protected function allWithStories () {
            $sql = 'SELECT *, count(user_id) as numberOfStories FROM users
                LEFT JOIN stories ON stories.user_id = users.id
                group by users.id
                ;
            ';
            $pdo_statement = $this->db->prepare($sql);
            $pdo_statement->execute();

            $db_items = $pdo_statement->fetchAll(); 
            
            return self::castToModel($db_items);
        }

        // get the user from a file
        protected function findByProfilePic($file) {
            $sql = "SELECT * FROM users WHERE profilePic = :profilePic LIMIT 1";
            $pdo_statement = $this->db->prepare($sql);
            $pdo_statement->execute([':profilePic' => $file]);
            $db_items = $pdo_statement->fetch();
        
            return self::castToModel($db_items);
        }

        // search in users
        protected function search($search) {
            $sql = 'SELECT * FROM `' . $this->table . '`
                WHERE (username LIKE :search Or firstName LIKE :search Or lastName LIKE :search Or email LIKE :search)
            ';

            $params = [':search' => '%' . $search . '%'];

            $pdo_statement = $this->db->prepare($sql);
            $pdo_statement->execute($params);

            $db_items = $pdo_statement->fetchAll(); 
            
            return self::castToModel($db_items);
        }
}