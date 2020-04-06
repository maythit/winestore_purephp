<?php

require_once '../model/dbconnect.php';
require_once '../model/wine_model.php';
require_once '../controller/file_upload.php';

if(isset($_POST['add']))
{
    $insert = new WineController();
    $insert->insert();
}
elseif(isset($_POST['update']))
{
    $update = new WineController();
    $update->update();
    //header("Location:../view/admin_view.php");
}
elseif(isset($_GET['id']))
{
    $delete = new WineController();
    $delete->delete();
    header("Location:../view/admin_view.php");
}
elseif(isset($_GET['detailID']))
{
    $detail = new WineController();
    $detail->detail($_GET['detailID']);
}

class WineController
{
    function __construct()
    {
        
    }

    // *** add new wine *** //
        function insert()
        {            
            $name = $_POST['wname'];
            $cateid = $_POST['categoryid'];
            $desc = $_POST['description'];
                        
            $file_upload = new File_upload();
            $img = $file_upload->file_save("image");

            $createdby = $_POST['createdby'];
            $updatedby = $_POST['updatedby'];

            $createdat = date("Y-m-d");
            $updatedat = date("Y-m-d");
            
            $wine_insert = new Wine();
            $wine_insert->insert($name,$cateid,$desc,$img,$createdby,$updatedby,$createdat,$updatedat);
            header("Location:../view/admin_view.php");
        }
    // *** end add new wine *** //

    // *** for datatables admin view *** //
        function selectJoin($id)
        {
            $wine = new Wine();
            $data = $wine->join($id);
            return $data;
        }
    // *** end for datatables admin view *** //

    // *** from datatables update wine data && wine detail view *** //
        function select($id)
        {
            $wine = new Wine();
            $data = $wine->select($id);
            return $data;
        }
    // *** end from datatables update wine data && wine detail view *** //

    // *** update wine data *** //
        function update()
        {
            // echo "<pre>";
            var_dump($_FILES);
            // die();
            $id = $_POST['id'];
            $name = $_POST['wname'];
            $cateid = $_POST['categoryid'];
            $desc = $_POST['description'];
                        
            $file_upload = new File_upload();
            $image = $_FILES["image"]["name"];

            if($image == null)
            {
                $image = $_POST['himage'];
            }
            else 
            {
                $file_upload = new File_upload();
                $image = $file_upload->file_save("image");
            }

            $createdby = $_POST['hcreatedby'];
            $updatedby = $_POST['hupdatedby'];

            $createdat = date("Y-m-d");
            $updatedat = date("Y-m-d");
            
            // var_dump($id,$name,$cateid,$desc,$img,$createdby,$updatedby,$createdat,$updatedat);
            $wine_update = new Wine();
            $wine_update->update($id,$name,$cateid,$desc,$image,$createdby,$updatedby,$createdat,$updatedat);

            header("Location:../view/admin_view.php");
        }
    // *** end update wine data *** //

    // *** delete wine data *** //
        function delete()
        {
            $id = $_GET['id'];
            $book_delete = new Wine();
            $book_delete->delete($id);
        }
    // *** end delete wine data *** //

    // *** wine product view from index.php *** //
        function showwine()
        {
            $data = new Wine();
            return $data->showwine();
        }
    // *** end wine product view form index.php *** //

    // *** wine detail view *** //
        function detail($id)
        {
            $detail = new Wine();
            return $detail->detailview($id);
        }
    // *** end wine datail view *** //

}

?>