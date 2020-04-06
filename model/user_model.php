<?php

class User
{
    protected $conn;

    function __construct()
    {
        include __DIR__."/dbconnect.php";
        $this->conn = $conn;
    }

    // *** for add new wine page created by select box *** //
        function select($id)
        {
            if($id == null)
                return mysqli_query($this->conn,"select * from `user`");
            else
                return mysqli_query($this->conn,"select * from `user` where id = $id");
        }
    // *** end for add new wine page created by select box *** //
}

?>