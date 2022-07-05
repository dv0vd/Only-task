<?php

declare(strict_types = 1);

class Db{

    private string $username;
    private string $password;
    private string $database;
    private string $hostname;

    public function __construct(string $username, string $password, string $database, string $hostname){
        $username = trim($username);
        if (strlen($username) != 0) {
            $this -> username = $username;
        }
        $password = trim($password);
        if (strlen($password) != 0) {
            $this -> password = $password;
        }
        $database = trim($database);
        if (strlen($database) != 0) {
            $this -> database = $database;
        }
        $hostname = trim($hostname);
        if (strlen($hostname) != 0) {
            $this -> hostname = $hostname;
        }
    }

    public function connect() {
        $connection = mysqli_connect($this -> hostname, $this -> username, $this -> password, $this -> database);
        return $connection;
    }

    public function close($connection) : bool {
        return mysqli_close($connection);
    }

}

?>