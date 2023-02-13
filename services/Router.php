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
        
        if ($route === "users") {
            $this->route -> UserController::index;
        }
        
        else if ($route === "user-create") {
            $this->route -> UserController::create;
        }
        
        else if ($route === "user-login") {
            $this->route -> UserController::login;
        }
        
        else {
            $this->route -> UserController::index;
        }
        
    }
}

?>