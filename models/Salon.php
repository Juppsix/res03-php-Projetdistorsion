<?php class Salon {
    private int $id;
    private string $name;
    private string $description;
    private int $message_id;
    
    public function _construct(string $name, string $description)
 {
     $this->id = null;
     $this->email = $name;
     $this->description = $description;
     $this->message_id= null;
 }
 
 public function getId() : int
    {
     return $this->id;
    }
    
    public function setId($id) : void
    {
    $this->id = $id;
    }
    
    public function getName() : string
    {
     return $this->name;
    }
    
    public function setName($id) : void
    {
    $this->name = $name;
    }
 
 public function getDescription() : string
    {
     return $this->description;
    }
    
    public function setDescription(string $description) : void
    {
    $this->description=$description;
    }
    
    public function getMessage_id() : int
    {
     return $this->message_id;
    }
    
    public function setMessage_id($message_id) : void
    {
    $this->message_id = $message_id;
    }
}