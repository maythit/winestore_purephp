<?php

require_once '../model/rosewine_model.php';

if(isset($_POST['update']))
{
    $update = new RoseWineController();
    $update->update();
    header("Location:../view/rosewine_view.php");
}

class RoseWineController
{
    function __construct()
    {

    }

    // *** select datatable for rose wine view *** //
        function select($id)
        {
            $rosewine = new RoseWine();
            $data = $rosewine->select($id);
            return $data;
        }
    // *** end select datatable for rose wine view *** //

    // *** update wine data for rose wine view *** //
        function update()
        {
            $id = $_POST['id'];
            $name = $_POST['wname'];
            if($name == null)
            {
                header("Location:../view/rosewine_view.php");
            }
            else
            {
                $rosewine = new RoseWine();
                $rosewine->update($id,$name);    
                header("Location:../view/rosewine_view.php");
            }
        }
}
?>

