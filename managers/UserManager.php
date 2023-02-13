<?php

class UserManager extends AbstractManager {

    public function getUserById(int $id) : User {
        
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $parameters = ['id' => $id];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    
    public function getAllUsers() : array {
        
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    
    public function insertUser(User $user) : User {
        
        $query = $this->db->prepare("INSERT INTO users VALUES (null, :email, :username, :password)");
        $parameters = [
            'email' => $user -> getEmail(),
            'username' => $user -> getUsername(),
            'password' => $user -> getPassword(),
            ];
        $query->execute($parameters);
        $query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}

?>