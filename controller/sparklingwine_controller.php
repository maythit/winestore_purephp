<?php

require_once '../model/sparklingwine_model.php';

if(isset($_POST['update']))
{
    $update = new SparklingWineController();
    $update->update();
    header("Location:../view/sparklingwine_view.php");
}

class SparklingWineController
{
    function __construct()
    {

    }

    // *** select datatable for sparkling wine view *** //
        function select($id)
        {
            $sparklingwine = new SparklingWine();
            $data = $sparklingwine->select($id);
            return $data;
        }
    // *** end select datatable for sparkling wine view *** //

    // *** update wine data for sparkling wine view *** //
        function update()
        {
            $id = $_POST['id'];
            $name = $_POST['wname'];
            if($name == null)
            {
                header("Location:../view/sparklingwine_view.php");
            }
            else
            {
                $sparklingwine = new SparklingWine();
                $sparklingwine->update($id,$name);    
                header("Location:../view/sparklingwine_view.php");
            }
        }
}
?>

