<?php

class Login
{
    protected $conn;

    function __construct()
    {
        include __DIR__."/dbconnect.php";
        $this->conn = $conn;
    }

    function login($email,$pw)
    {       
        $user = mysqli_fetch_array(mysqli_query($this->conn,
                "select * from `user` where email = '$email' and password = '".sha1($pw) ."'"));
        return $user['id'];
    }
}
?>