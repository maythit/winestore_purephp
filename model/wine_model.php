<?php

class Wine
{
    protected $conn;

    function __construct()
    {
        include __DIR__ . "/dbconnect.php";
        $this->conn = $conn;
    }

    function insert($name, $cateid, $desc, $img, $createdby, $updatedby, $cat, $uat)
    {
        mysqli_query(
            $this->conn,
            "INSERT INTO `wine`(`name`, `categoryid`, `description`, `image_url`, 
            `created_by`, `updated_by`, `created_at`, `updated_at`) 
             VALUES('$name','$cateid','$desc','$img','$createdby','$updatedby','$cat',
            '$uat')"
        ) or die(mysqli_error($this->conn));
    }
    function update($id, $name, $cateid, $desc, $img, $createdby, $updatedby, $createdat, $updatedat)
    {
        mysqli_query(
            $this->conn,
            "UPDATE `wine` 
             SET `name` = '$name',
             `categoryid` = $cateid,
             `description`='$desc',
             `image_url` = '$img',
             `created_by` = $createdby,
             `updated_by` = $updatedby,
             `created_at` = '$createdat',
             `updated_at` = '$updatedat'
             WHERE `id` = $id"
        ) or die(mysqli_error($this->conn));
    }
    function delete($id)
    {
        mysqli_query(
            $this->conn,
            "DELETE FROM `wine` WHERE `id`=$id");
    }
    function search($name)
    {
        return mysqli_query(
            $this->conn,
            "SELECT wine.*,category.* 
             FROM `wine` 
             INNER JOIN `category` ON category.category_id = wine.categoryid 
             WHERE `name` like '%$name%' 
             or `category_name` like '%$name%'");
    }
    function getAllWine()
    {
        return mysqli_query(
            $this->conn,
            "SELECT wine.*,category.* 
             FROM `wine` 
             INNER JOIN `category` ON category.category_id = wine.categoryid 
             ORDER BY wine.id");
    }
    function getWineByID($id)
    {
        return mysqli_query(
            $this->conn,
            "SELECT wine.*,category.*
             FROM wine 
             INNER JOIN category ON category.category_id = wine.categoryid 
             WHERE wine.id=$id");
    }
    function getWineByCategoryID($cateid)
    {
        return mysqli_query(
            $this->conn,
            "SELECT wine.*,category.* 
             FROM `wine` 
             INNER JOIN `category` 
             WHERE category.category_id=wine.categoryid and category.category_id=$cateid");
    }
    function updateCategoryByID($id,$name)
    {
        mysqli_query(
            $this->conn,
            "UPDATE `wine`
             SET `name`='$name'
             WHERE id=$id");
    }
    function getDataByCateID($cateid)
    {
        return mysqli_query($this->conn,
                "SELECT wine.*,category.* 
                FROM `wine` 
                INNER JOIN `category` 
                WHERE category.category_id=wine.categoryid and category.category_id=$cateid");
    }
    function WineCount()
    {
        $count = mysqli_query(
            $this->conn,
            "SELECT count(*) as Total FROM `wine`"
        );
        $result = mysqli_fetch_array($count);
        return $result;
    }
    function getWinesByPage($limit,$offset)
    {
        return mysqli_query($this->conn,
                "SELECT wine.*,category.* 
                FROM `wine` 
                INNER JOIN `category` ON category.category_id = wine.categoryid 
                ORDER BY wine.id
                LIMIT $limit
                OFFSET $offset");
    }
}
?>