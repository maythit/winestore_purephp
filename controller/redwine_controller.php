<?php

require_once '../model/redwine_model.php';

if(isset($_POST['update']))
{
    $update = new RedWineController();
    $update->update();
    header("Location:../view/redwine_view.php");
}

class RedWineController
{
    function __construct()
    {

    }

    // *** select datatable for red wine view *** //
        function select($id)
        {
            $redwine = new RedWine();
            $data = $redwine->select($id);
            return $data;
        }
    // *** end select datatable for red wine view *** //

    // *** update wine data for red wine view *** //
        function update()
        {
            $id = $_POST['id'];
            $name = $_POST['wname'];
            if($name == null)
            {
                header("Location:../view/redwine_view.php");
            }
            else
            {
                $redwine = new RedWine();
                $redwine->update($id,$name);    
                header("Location:../view/redwine_view.php");
            }
        }
}
?>

