<?php

session_start();
var_dump($_SESSION['user_id']);
if(isset($_SESSION['user_id']))
{
    session_destroy();
    header("Location:../view/index.php");
}

?>