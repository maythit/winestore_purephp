<?php

require_once '../model/dessertwine_model.php';

if(isset($_POST['update']))
{
    $update = new DessertWineController();
    $update->update();
    header("Location:../view/dessertwine_view.php");
}

class DessertWineController
{
    function __construct()
    {

    }

    // *** select datatable for dessert wine view *** //
        function select($id)
        {
            $dessertwine = new DessertWine();
            $data = $dessertwine->select($id);
            return $data;
        }
    // *** end select datatable for dessert wine view *** //

    // *** update wine data for dessert wine view *** //
        function update()
        {
            $id = $_POST['id'];
            $name = $_POST['wname'];
            if($name == null)
            {
                header("Location:../view/dessertwine_view.php");
            }
            else
            {
                $dessertwine = new DessertWine();
                $dessertwine->update($id,$name);    
                header("Location:../view/dessertwine_view.php");
            }
        }
}
?>

