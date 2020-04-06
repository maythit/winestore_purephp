<?php

class DessertWine
{
    protected $conn;

    function __construct()
    {
        include __DIR__."/dbconnect.php";
		$this->conn = $conn;
    }
    
    // *** select datatable for dessert wine view *** //
        function select($id)
        {
            if($id == null)
                return mysqli_query($this->conn,
                "SELECT wine.name,wine.id,category.category_id FROM `wine` INNER JOIN `category` WHERE wine.categoryid=4 and category.category_id=4");
            else 
                return mysqli_query($this->conn,
                "SELECT * 
                    FROM `wine` WHERE id=$id");     
        }
    // *** end select datatable for dessert wine view *** //

    // *** update wine data for dessert wine view *** //
        function update($id,$name)
        {
            mysqli_query($this->conn,
            "UPDATE `wine`
             SET `name`='$name'
             WHERE id=$id") or die(mysqli_error($this->conn));
        }
    // *** end update wine data for dessert wine view *** //
}

?>