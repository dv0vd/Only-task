<?php

declare(strict_types = 1);

require_once('Model.php');


class User extends Model{

    private string $name;
    private string $email;
    private string $password;

    // public function __construct(string $name, string $email, string $password){
    //     $name = trim($name);
    //     if (strlen($name) != 0) {
    //         $this -> name = $name;
    //     }
    //     $email = trim($email);
    //     if (strlen($email) != 0) {
    //         $this -> email = $email;
    //     }
    //     $password = trim($password);
    //     if (strlen($password) != 0) {
    //         $this -> password = $password;
    //     }
    // }

    public function __construct(){
        $this -> name = "";
        $this -> email = "";
        $this -> password = "";
        // $name = trim($name);
        // if (strlen($name) != 0) {
        //     $this -> name = $name;
        // }
        // $email = trim($email);
        // if (strlen($email) != 0) {
        //     $this -> email = $email;
        // }
        // $password = trim($password);
        // if (strlen($password) != 0) {
        //     $this -> password = $password;
        // }
    }

    public function setName($name){
        $name = trim($name);
        if (strlen($name) != 0) {
            $this -> name = $name;
            return true;
        } else{
            return false;
        }
    }

    public function setEmail($email){
        $email = trim($email);
        if (strlen($email) != 0) {
            $this -> email = $email;
            return true;
        } else{
            return false;
        }
    }

    public function setPassword($password){
        $password = trim($password);
        if (strlen($password) != 0) {
            $this -> password = $password;
            return true;
        } else{
            return false;
        }
    }
    

    public function save($connection){
        $table_name = strtolower(get_class($this)) . "s";
        $name = $this -> name;
        $password = hash('sha256', $this -> password);
        $email = $this -> email;
        $query = "INSERT INTO $table_name (user_name, user_password, user_email) VALUES ('$name','$password','$email')";
        return mysqli_query($connection, $query);
    }

}

?>