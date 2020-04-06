<?php

class Category
{
    protected $conn;

    function __construct()
    {
        include __DIR__."/dbconnect.php";
        $this->conn = $conn;
    }

    // **** for add new wine page select box **** //
        function select($id)
        {
            if($id == null)
                return mysqli_query($this->conn,"select * from `category`");
            else 
                return mysqli_query($this->conn,"select * from `category` where id = $id");
        }
    // **** for add new wine page select box **** //
}

?>