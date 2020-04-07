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
    
}
?>