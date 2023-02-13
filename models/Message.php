<?php class Message {
    private int $id;
    private string $username;
    private string $content;
    private int $user_id;
    
     public function _construct(string $name, string $content)
 {
     $this->id = null;
     $this->email = $name;
     $this->content = $content;
     $this->user_id= null;
 }
 
   public function getId() : int
    {
     return $this->id;
    }
    
    public function setId($id) : void
    {
    $this->id = $id;
    }
    
    public function getContent() : string
    {
     return $this->content;
    }
    
    public function setContent($content) : void
    {
    $this->content = $content;
    }
    
    public function getUser_id() : int 
    {
        return $this->user_id;
    }
    
    public function setUser_id($user_id) : void 
    {
        $this->user_id-> $user_id;
    }
}
