<?php

namespace App\Model;

use App\Model\AbstractModel;

class User extends AbstractModel
{
    public function saveUser($pseudo, $email, $pswd)
    {
        $stmt = $this->pdo->prepare('INSERT INTO user (username, email, mdp) VALUE (:pseudo, :email, :pswd)');
        
        $stmt->execute([
            ':pseudo' => $pseudo,
            ':email' => $email,
            ':pswd' => $pswd
        ]);
        return $stmt -> fetch();
    }

    public function isEmailExiste($email)
    {
        $stmt = $this->pdo->prepare('SELECT email FROM user WHERE email = :email');

        $stmt->execute([
            ':email' => $email,
        ]);
        return $stmt->fetch();
        
    }
}