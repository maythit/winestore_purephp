<?php

class Wine
{
    protected $conn;

    function __construct()
    {
        include __DIR__."/dbconnect.php";
        $this->conn = $conn;
    }

    // *** add new wine *** //
        function insert($name,$cateid,$desc,$img,$createdby,$updatedby,$cat,$uat)
        {
            //var_dump($name,$cateid,$desc,$img,$createdby,$updatedby,$cat,$uat);
            mysqli_query($this->conn,
            "INSERT INTO `wine`(`name`, `categoryid`, `description`, `image_url`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES('$name','$cateid','$desc','$img','$createdby','$updatedby','$cat','$uat')");
        }
    // *** end add new wine *** //

    // *** datatables from admin view *** //
        function join($id)
        {
            //var_dump($id);
            if($id == null)
            {
                $sql = mysqli_query($this->conn,
                "SELECT wine.id,wine.name,category.category_name 
                FROM wine
                INNER JOIN category ON wine.categoryid = category.category_id")
                or die(mysqli_error($this->conn));
            }
            return $sql;
        }
    // *** end datatables from admin view *** //

    // *** update wine data from datatables *** //
        function select($id)
        {
            if($id == null)
                return mysqli_query($this->conn,
                "select * from `wine`");
            else 
                return mysqli_query($this->conn,
                "select * from `wine` where id = $id");
        }
    // *** end update wine data from datatables *** //

    // *** update wine data from admin view *** //
        function update($id,$name,$cateid,$desc,$img,$createdby,$updatedby,$createdat,$updatedat)
        {
            mysqli_query($this->conn,
            "UPDATE `wine` 
                SET `name` = '$name',`categoryid` = $cateid,`description`='$desc',
                `image_url` = '$img',`created_by` = $createdby,`updated_by` = $updatedby,
                `created_at` = '$createdat',`updated_at` = '$updatedat'
             WHERE `id` = $id") or die(mysqli_error($this->conn));
        }
    // *** end update wine data from admin view *** //

    // *** delete wine data from admin view *** //
        function delete($id)
        {
            mysqli_query($this->conn,
            "DELETE FROM `wine` WHERE `id`=$id") or die(mysqli_error($this->conn));
        }
    // *** end delete wine data from admin view *** //

    // *** wine product view from index.php *** //
        function showwine()
        {
            return mysqli_query($this->conn,
                    "SELECT wine.image_url,category.category_name,wine.name,wine.id 
                     FROM `wine` 
                     INNER JOIN `category` ON category.category_id = wine.categoryid 
                     ORDER BY wine.id");
        }
    // *** end wine product view from index.php *** //

    // *** wine detail view *** //
        function detailview($id)
        {
            return mysqli_query($this->conn,
                    "SELECT wine.*,category.*
                     FROM wine 
                     INNER JOIN category ON category.category_id = wine.categoryid 
                     WHERE wine.id=$id");
        }
    // *** end detail view *** //

    // *** search box *** //
        function search($name)
        {
            return mysqli_query($this->conn,
                    "SELECT wine.*,category.* 
                     FROM `wine` 
                     INNER JOIN `category` ON category.category_id = wine.categoryid 
                     WHERE `name` like '%$name%' 
                     or `category_name` like '%$name%'");
        }
    // *** end search box *** //

// *** wine category  *** //

    // *** red wine view *** //
        // *** select datatable for red wine view *** //
            function rwineselect($id)
            {
                if($id == null)
                    return mysqli_query($this->conn,
                    "SELECT wine.*,category.* 
                     FROM `wine` 
                     INNER JOIN `category` 
                     WHERE wine.categoryid=2 and category.category_id=2");
                else 
                    return mysqli_query($this->conn,
                    "SELECT * 
                     FROM `wine` 
                     WHERE id=$id");     
            }
        // *** end select datatable for red wine view *** //

        // *** update wine data for red wine view *** //
            function rwineupdate($id,$name)
            {
                mysqli_query($this->conn,
                "UPDATE `wine`
                 SET `name`='$name'
                 WHERE id=$id") or die(mysqli_error($this->conn));
            }
        // *** end update wine data for red wine view *** //
    // *** end red wine view *** //
        
    // *** white wine view *** //
        // *** select datatable for white wine view *** //
            function wwineselect($id)
            {
                if($id == null)
                    return mysqli_query($this->conn,
                    "SELECT wine.name,wine.id,category.category_id 
                     FROM `wine` 
                     INNER JOIN `category` 
                     WHERE wine.categoryid=1 and category.category_id=1");
                else 
                    return mysqli_query($this->conn,
                    "SELECT * 
                     FROM `wine` WHERE id=$id");     
            }
        // *** end select datatable for white wine view *** //

        // *** update wine data for white wine view *** //
            function wwineupdate($id,$name)
            {
                mysqli_query($this->conn,
                "UPDATE `wine`
                 SET `name`='$name'
                 WHERE id=$id") or die(mysqli_error($this->conn));
            }
        // *** end update wine data for white wine view *** //
    // *** end white wine view *** //

    // *** rose wine view *** //
        // *** select datatable for rose wine view *** //
            function rosewselect($id)
            {
                if($id == null)
                    return mysqli_query($this->conn,
                    "SELECT wine.name,wine.id,category.category_id  
                    FROM `wine` 
                    INNER JOIN `category` 
                    WHERE wine.categoryid=3 and category.category_id=3");
                else 
                    return mysqli_query($this->conn,
                    "SELECT * 
                    FROM `wine` 
                    WHERE id=$id");     
            }
        // *** end select datatable for rose wine view *** //

        // *** update wine data for rose wine view *** //
            function rosewupdate($id,$name)
            {
                mysqli_query($this->conn,
                "UPDATE `wine`
                SET `name`='$name'
                WHERE id=$id") or die(mysqli_error($this->conn));
            }
        // *** end update wine data for rose wine view *** //
    // *** end rose wine view *** //

    // *** dessert wine view *** //
        // *** select datatable for dessert wine view *** //
            function dwineselect($id)
            {
                if($id == null)
                    return mysqli_query($this->conn,
                    "SELECT wine.name,wine.id,category.category_id 
                     FROM `wine` 
                     INNER JOIN `category` 
                     WHERE wine.categoryid=4 and category.category_id=4");
                else 
                    return mysqli_query($this->conn,
                    "SELECT * 
                        FROM `wine` WHERE id=$id");     
            }
        // *** end select datatable for dessert wine view *** //

        // *** update wine data for dessert wine view *** //
            function dwineupdate($id,$name)
            {
                mysqli_query($this->conn,
                "UPDATE `wine`
                 SET `name`='$name'
                 WHERE id=$id") or die(mysqli_error($this->conn));
            }
        // *** end update wine data for dessert wine view *** //
    // *** end dessert wine view *** //

    // *** sparkling wine view *** //
        // *** select datatable for sparkling wine view *** //
            function swineselect($id)
            {
                if($id == null)
                    return mysqli_query($this->conn,
                    "SELECT wine.name,wine.id,category.category_id 
                     FROM `wine` 
                     INNER JOIN `category` 
                     WHERE wine.categoryid=5 and category.category_id=5");
                else 
                    return mysqli_query($this->conn,
                    "SELECT * 
                        FROM `wine` WHERE id=$id");     
            }
        // *** end select datatable for sparkling wine view *** //

        // *** update wine data for sparkling wine view *** //
            function swineupdate($id,$name)
            {
                mysqli_query($this->conn,
                "UPDATE `wine`
                 SET `name`='$name'
                 WHERE id=$id") or die(mysqli_error($this->conn));
            }
        // *** end update wine data for sparkling wine view *** //
    // *** end sparkling wine view *** //

// *** end wine category *** //
    
}
?>