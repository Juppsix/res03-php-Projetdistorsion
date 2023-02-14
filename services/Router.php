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
            $this->userController->login();
        }
        
        else if ($route === "create") {
            $this->userController->create();
        }
        
        else {
            $this->userController->index();
        }
        
    }
}

?>