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
}