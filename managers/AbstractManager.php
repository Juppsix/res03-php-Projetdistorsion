<?php

abstract class AbstractManager {
    
    protected PDO $db; 
    private string $dbName;
    private string $port;
    private string $host;
    private string $username;
    private string $password;

    public function __construct(string $dbName, string $port, string $host, string $username, string $password) {
        $this->dbName = $dbName;
        $this->port = $port;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db = new PDO(
            "mysql:host=db.3wa.io;port=3306;dbname=anthonycormier_phpj11",
            "anthonycormier",
            "f7af5a3387016b3d12b42619a8ad2703"
            );
    }
}

?>