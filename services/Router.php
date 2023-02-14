<?php

require("controllers/UserController.php");

class Router {
    
    private UserController $userController;
    // private CategoryController $categoryController;
    // private SalonController $salonController;
    // private MessageController $messageController;
    
    public function __construct() {
        $this->userController = new UserController();
        // $this->categoryController = new CategoryController();
        // $this->salonController = new SalonController();
        // $this->messageController = new MessageController();
    }
    
    public function checkRoute(string $route) : void {
        
        if ($route === "homepage") {
            $this->userController->index();
        }
        
        else if ($route === "login") {
            $post = $_POST;
            $this->userController->login($post);
        }
        
        else if ($route === "create") {
            $post = $_POST;
            $this->userController->create($post);
        }
        
        else {
            $this->userController->index();
        }
        
    }
}

?>