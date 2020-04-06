<?php

require_once '../model/login_model.php';

session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $LogIn = new Login();
    $login = $LogIn->login($email,$password);
    

    if($login != null)
    {
        $_SESSION['user_id'] = $login;
        header("Location:../view/admin_view.php");
    }
    else
    {
        header("Location:../view/index.php");
    }

?>