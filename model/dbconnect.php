<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "winestore";

$conn = mysqli_connect($server,$user,$pass) or die("Can't connect to the database!!");

mysqli_set_charset($conn,'utf8');

mysqli_select_db($conn,$db) or die("Sorry , can't select the database");

?>