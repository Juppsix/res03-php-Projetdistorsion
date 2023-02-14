<?php

require("managers/AbstractManager.php");

class UserManager extends AbstractManager {

    public function getUserById(int $id) : User {
        
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $parameters = ['id' => $id];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    
    public function insertUser(User $user) : User {
        
        $query = $this->db->prepare("INSERT INTO users VALUES (null,:first_name, :last_name, :email, :username, :password)");
        $parameters = [
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'email' => $user->getEmail(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            ];
        $query->execute($parameters);
        $query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}

?>