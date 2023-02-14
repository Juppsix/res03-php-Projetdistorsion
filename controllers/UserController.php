<?php

require("AbstractController.php");
require("managers/UserManager.php");


class UserController extends AbstractController {
    
    private UserManager $manager;
    
    public function __construct() {
        
        $this->manager = new UserManager("anthonycormier_phpdistorsion", "3306", "db.3wa.io", "anthonycormier","f7af5a3387016b3d12b42619a8ad2703");
    }
    
    public function index() {
        
        $this->render("homepage", []);
    }
    
    public function create(array $post) {
        
        $this->render("register", []);
        // $user = new User($post['email'], $post['username'], $post['password']);
        // $this->manager-> insertUser($user);
        // render("create", ["user"=>$this->manager->insertUser($user)]);
    }
    
    public function login(array $post) {
        var_dump($post);
        $this->render("login", []);
        
    }
}

?>