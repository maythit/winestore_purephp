<?php

require_once '../model/dbconnect.php';
require_once '../model/wine_model.php';
require_once '../controller/file_upload.php';

$winecontroller = new WineController();

// *** for add wine from admin view *** //
    if(isset($_POST['add']))
    {
        $winecontroller->insert();
    }
// *** end for add wine from admin view *** //

// *** for update wine from admin datatable *** //
    elseif(isset($_POST['update']))
    {
        $winecontroller->update();
    }
// *** end for update wine from admin datatable *** //

// *** for delete wine from admin datatable *** //
    elseif(isset($_GET['deleteid']))
    {
        $winecontroller->delete();
        header("Location:../view/admin_view.php");
    }
// *** end for delete wine from admin datatable *** //

// *** for wine detail from wine_product view *** //
    elseif(isset($_GET['detailID']))
    {
        $winecontroller->detail($_GET['detailID']);
    }
// *** end for wine detail from wine_product view *** //

// *** for wine category *** //
    // *** red wine update *** //
        elseif(isset($_GET['redwine']))
        {
            $winecontroller->rwineselect("");   
        }
        elseif(isset($_POST['rwineupdate']))
        {
            $winecontroller->rwineupdate();
            header("Location:../view/redwine_view.php");
        }
    // *** end red wine update *** //

    // *** white wine update *** //
        elseif(isset($_GET['whitewine']))
        {
            $winecontroller->wwineselect("");
        }
        elseif(isset($_POST['wwineupdate']))
        {
            $winecontroller->wwineupdate();
            header("Location:../view/whitewine_view.php");
        }
    // *** end white wine update *** //

    // *** rose wine update *** //
        elseif(isset($_GET['rosewine']))
        {
            $winecontroller->rosewselect("");
        }
        elseif(isset($_POST['rosewupdate']))
        {
            $winecontroller->rosewupdate();
            header("Location:../view/rosewine_view.php");
        }
    // *** end rose wine update *** //

    // *** dessert wine update *** //
        elseif(isset($_GET['dessertwine']))
        {
            $winecontroller->dwineselect("");
        }
        elseif(isset($_POST['dwineupdate']))
        {
            $winecontroller->dwineupdate();
            header("Location:../view/dessertwine_view.php");
        }
    // *** end dessert wine udpate *** //

    // *** sparkling wine update *** //
        elseif(isset($_GET['sparklingwine']))
        {
            $winecontroller->swineselect("");
        }
        elseif(isset($_POST['swineupdate']))
        {
            $winecontroller->swineupdate();
            header("Location:../view/sparklingwine_view.php");
        }
    // *** end sparkling wine update *** //

// *** end for wine category *** //

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
            $id = $_GET['deleteid'];
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

// *** wine category *** //

    // *** red wine view *** //
        // *** select datatable for red wine view *** //
            function rwineselect($id)
            {
                $wine_model = new Wine();
                $data = $wine_model->rwineselect($id);
                return $data;
            }
        // *** end select datatable for red wine view *** //

        // *** update wine data for red wine view *** //
            function rwineupdate()
            {
                $id = $_POST['rwuid'];
                $name = $_POST['wname'];
                if($name == null)
                {
                    header("Location:../view/redwine_view.php");
                }
                else
                {
                    $wine_model = new Wine();
                    $wine_model->rwineupdate($id,$name);    
                    header("Location:../view/redwine_view.php");
                }
            }
        // *** end update wine data for red wine view *** //
    // *** end red wine view *** //
    
    // *** white wine view *** //
        // *** select datatable for white wine view *** //
            function wwineselect($id)
            {
                $wine_model = new Wine();
                $data = $wine_model->wwineselect($id);
                return $data;
            }
        // *** end select datatable for white wine view *** //

        // *** update wine data for white wine view *** //
            function wwineupdate()
            {
                $id = $_POST['wwuid'];
                $name = $_POST['wname'];
                if($name == null)
                {
                    header("Location:../view/whitewine_view.php");
                }
                else
                {
                    $wine_model = new Wine();
                    $wine_model->wwineupdate($id,$name);    
                    header("Location:../view/whitewine_view.php");
                }
            }
        // *** end update wine data for white wine view *** //
    // *** end white wine view *** //

    // *** rose wine view *** //
        // *** select datatable for rose wine view *** //
            function rosewselect($id)
            {
                $wine_model = new Wine();
                $data = $wine_model->rosewselect($id);
                return $data;
            }
        // *** end select datatable for rose wine view *** //

        // *** update wine data for rose wine view *** //
            function rosewupdate()
            {
                $id = $_POST['rosewuid'];
                $name = $_POST['wname'];
                if($name == null)
                {
                    header("Location:../view/rosewine_view.php");
                }
                else
                {
                    $wine_model = new Wine();
                    $wine_model->rosewupdate($id,$name);    
                    header("Location:../view/rosewine_view.php");
                }
            }
        // *** end update wine data for rose wine view *** //
    // *** end rose wine view *** //

    // *** dessert wine view *** //
        // *** select datatable for dessert wine view *** //
            function dwineselect($id)
            {
                $wine_model = new Wine();
                $data = $wine_model->dwineselect($id);
                return $data;
            }
        // *** end select datatable for dessert wine view *** //

        // *** update wine data for dessert wine view *** //
            function dwineupdate()
            {
                $id = $_POST['dwuid'];
                $name = $_POST['wname'];
                if($name == null)
                {
                    header("Location:../view/dessertwine_view.php");
                }
                else
                {
                    $wine_model = new Wine();
                    $wine_model->dwineupdate($id,$name);    
                    header("Location:../view/dessertwine_view.php");
                }
            }
        // *** end update wine data for dessert wine view *** //
    // *** end dessert wine view *** //

    // *** sparkling wine view *** //
        // *** select datatable for sparkling wine view *** //
            function swineselect($id)
            {
                $wine_model = new Wine();
                $data = $wine_model->swineselect($id);
                return $data;
            }
        // *** end select datatable for sparkling wine view *** //

        // *** update wine data for sparkling wine view *** //
            function swineupdate()
            {
                $id = $_POST['swuid'];
                $name = $_POST['wname'];
                if($name == null)
                {
                    header("Location:../view/sparklingwine_view.php");
                }
                else
                {
                    $wine_model = new Wine();
                    $wine_model->swineupdate($id,$name);    
                    header("Location:../view/sparklingwine_view.php");
                }
            }
        // *** end update data for sparkling wine view *** //
    // *** end sparkling wine view *** //
    
// *** end wine category *** //
}

?>