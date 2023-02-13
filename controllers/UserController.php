<?php

require("AbstractController.php");


class UserController extends AbstractController {
    
    private UserManager $manager;
    
    public function __construct() {
        
        $this->manager = new UserManager();
    }
    
    public function index() {
        
        $allUsers = $this->manager -> getAllUsers();
        $this->render("index", ["users" => $allUsers]);
    }
    
    public function create(array $post) {
        
        $user = new User($post['email'], $post['username'], $post['password']);
        $this->manager-> insertUser($user);
        render("create", ["user"=>$this->manager->insertUser($user)]);
    }
        
    public function edit(array $post) {
        
        $user = new User($post['email'], $post['username'], $post['password']);
        $this->manager-> editUser($user);
        render("edit", ["user"=>$user]);
    }
}

?>