<?php

require("AbstractController.php");


class UserController extends AbstractController {
    
    private UserManager $manager;
    
    public function __construct() {
        
        $this->manager = new UserManager("anthonycormier_phpdistorsion", "3306", "db.3wa.io", "anthonycormier","f7af5a3387016b3d12b42619a8ad2703");
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
}

?>