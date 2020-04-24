<?php

require_once '../model/dbconnect.php';
require_once '../model/wine_model.php';
require_once '../controller/file_upload.php';

$winecontroller = new WineController();

    if(isset($_POST['add']))
    {
        $winecontroller->insert();
    }
    elseif(isset($_POST['update']))
    {
        $winecontroller->update();
    }
    elseif(isset($_GET['deleteid']))
    {
        $winecontroller->delete();
        header("Location:../view/admin_view.php");
    } 

    elseif(isset($_GET['detailID']))
    {
        $winecontroller->detail($_GET['detailID']);
    }
    // *** for category *** //
        elseif(isset($_GET['red']))
        {
            $cateid = 2;
            $winecontroller->getDataByCateID($cateid);   
        }
        elseif(isset($_POST['rwineupdate']))
        {
            $winecontroller->updateCategoryByID();
            header("Location:../view/redwine_view.php");
        }
        elseif(isset($_GET['whitewine']))
        {
           $cateid = 1;
            $winecontroller->getDataByCateID($cateid);
        }
        elseif(isset($_POST['wwineupdate']))
        {
            $winecontroller->updateCategoryByID();
            header("Location:../view/whitewine_view.php");
        }
        elseif(isset($_GET['rosewine']))
        {
            $cateid = 3;
            $winecontroller->getDataByCateID($cateid);
        }
        elseif(isset($_POST['rosewupdate']))
        {
            $winecontroller->updateCategoryByID();
            header("Location:../view/rosewine_view.php");
        }
        elseif(isset($_GET['dessertwine']))
        {
            $cateid = 4;
            $winecontroller->getDataByCateID($cateid);
        }
        elseif(isset($_POST['dwineupdate']))
        {
            $winecontroller->updateCategoryByID();
            header("Location:../view/dessertwine_view.php");
        }
        elseif(isset($_GET['sparklingwine']))
        {
            $cateid = 5;
            $winecontroller->getDataByCateID($cateid);
        }
        elseif(isset($_POST['swineupdate']))
        {
            $winecontroller->updateCategoryByID();
            header("Location:../view/sparklingwine_view.php");
        }
    // *** end for category *** //
class WineController
{
    function __construct()
    {
        
    }
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
    function update()
    {
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
        
        $wine_update = new Wine();
        $wine_update->update($id,$name,$cateid,$desc,$image,$createdby,$updatedby,$createdat,$updatedat);

        header("Location:../view/admin_view.php");
    }
    function delete()
    {
        $id = $_GET['deleteid'];
        $book_delete = new Wine();
        $book_delete->delete($id);
    }

    function getAllWine()
    {
        $wine = new Wine();
        return $wine->getAllWine();
             
    }
    function getWineByID($id)
    {
        $detail = new Wine();
        return $detail->getWineByID($id);
    }
    function getWineByCategoryID($cateid)
    {
        $wine_model = new Wine();
        $data = $wine_model->getWineByCategoryID($cateid);
        return $data;
    }
    function updateCategoryByID()
    {
        $id = $_POST['wineid'];
        $name = $_POST['winename'];        
        $wine_model = new Wine();
        $wine_model->updateCategoryByID($id,$name);  
    }

    function getDataByCateID($cateid)
    {
        $wine_model = new Wine();
        $data = $wine_model->getDataByCateID($cateid);
        return $data;
    }

    function WineCount()
    {
        $wine_model = new Wine();
        $count = $wine_model->WineCount();
        return $count;
    }

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