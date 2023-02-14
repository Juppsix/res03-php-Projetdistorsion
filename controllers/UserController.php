<?php

require("AbstractController.php");
require("managers/UserManager.php");
require("models/User.php");



class UserController extends AbstractController {
    
    private UserManager $manager;
    
    public function __construct() {
        
        $this->manager = new UserManager("anthonycormier_phpdistorsion", "3306", "db.3wa.io", "anthonycormier","f7af5a3387016b3d12b42619a8ad2703");
    }
    
    public function index() {
        
        $this->render("homepage", []);
    }
    
    public function create(array $post) {
        var_dump($post);
        if(empty($post["firstName"]) && empty($post["lastName"]) && empty($post["email"]) && empty($post["username"]) && empty($post["password"])) {
            echo "Veuillez remplir le formulaire";
            $this->render("register", []);
        }
        else {
            $user = new User($post['firstName'], $post['lastName'], $post['email'], $post['username'], $post['password']);
            $this->manager->insertUser($user);
            $this->render("homepage", []);
        }
        
        
    }
    
    public function login(array $post) {
        
        $this->render("login", []);
        
    }
}

?>