<?php

require_once '../model/whitewine_model.php';

if(isset($_POST['update']))
{
    $update = new WhiteWineController();
    $update->update();
    header("Location:../view/whitewine_view.php");
}

class WhiteWineController
{
    function __construct()
    {

    }

    // *** select datatable for white wine view *** //
        function select($id)
        {
            $whitewine = new WhiteWine();
            $data = $whitewine->select($id);
            return $data;
        }
    // *** end select datatable for white wine view *** //

    // *** update wine data for white wine view *** //
        function update()
        {
            $id = $_POST['id'];
            $name = $_POST['wname'];
            if($name == null)
            {
                header("Location:../view/whitewine_view.php");
            }
            else
            {
                $whitewine = new WhiteWine();
                $whitewine->update($id,$name);    
                header("Location:../view/whitewine_view.php");
            }
        }
}
?>

