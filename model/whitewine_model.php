<?php

class WhiteWine
{
    protected $conn;

    function __construct()
    {
        include __DIR__."/dbconnect.php";
		$this->conn = $conn;
    }
    
    // *** select datatable for white wine view *** //
        function select($id)
        {
            if($id == null)
                return mysqli_query($this->conn,
                "SELECT wine.name,wine.id,category.category_id FROM `wine` INNER JOIN `category` WHERE wine.categoryid=1 and category.category_id=1");
            else 
                return mysqli_query($this->conn,
                "SELECT * 
                    FROM `wine` WHERE id=$id");     
        }
    // *** end select datatable for white wine view *** //

    // *** update wine data for white wine view *** //
        function update($id,$name)
        {
            mysqli_query($this->conn,
            "UPDATE `wine`
             SET `name`='$name'
             WHERE id=$id") or die(mysqli_error($this->conn));
        }
    // *** end update wine data for white wine view *** //
}

?>