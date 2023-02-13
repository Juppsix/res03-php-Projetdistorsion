<?php class Category {
    private int $id;
    private string $name;
    private string $description;
    private int $salon_id;
    
         public function _construct(string $name, string $description)
 {
     $this->id = null;
     $this->name = $name;
     $this->description = $description;
     $this->user_id= null;
 }
}