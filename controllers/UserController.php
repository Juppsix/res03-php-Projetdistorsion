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
        
        if (empty($post)) {
            $this->render("register", []);
        }
        
        else {
            if ((isset($post["first_name"]) && empty($post["first_name"])) || (isset($post["last_name"]) && empty($post["last_name"])) || (isset($post["email"]) && empty($post["email"])) || (isset($post["username"]) && empty($post["username"])) || (isset($post["password"]) && empty($post["password"])) || (isset($post["confirmPassword"]) && empty($post["confirmPassword"]))) {
    
            $this->render("register", []);
            echo "L'un des champs n'est pas rempli.";
            }
            else {
                
                if ($post["password"] === $post["confirmPassword"]) {
            
                    $hash = password_hash($post["password"], PASSWORD_DEFAULT);
                    $user = new User($post["first_name"], $post["last_name"], $post["email"], $post["username"], $hash);
                    $this->manager->insertUser($user);
                    $this->render("homepage", []);
                }
                
                else {
                    
                    echo "Les deux mots de passe ne sont pas identiques.";
                }
            }
        }
        
        
        
    }
    
    public function login(array $post) {
        if ((isset($post["loginEmail"]) && !empty($post["loginEmail"])) && (isset($post["loginPassword"]) && !empty($post["loginPassword"]))) {
    
            $recup = loadUser($_POST["loginEmail"]);
            $mdp = $recup->getPassword();
        
            if (password_verify($_POST["loginPassword"], $mdp)) {
                $this->render("homepage", []);
            }
            
            else {
                $this->render("login", []);
                echo "Le mot de passe est incorrect";
            }
        }
        
        else if ((isset($post["email"]) && empty($post["email"])) || (isset($post["password"]) && empty($post["password"]))) {
            
            echo "L'un des champs n'est pas rempli.";
            $this->render("login", []);
        }
        
        
    }
}

?>