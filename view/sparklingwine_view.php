<?php

require_once 'header.php';
require_once 'admin_navbar.php';
require_once '../controller/sparklingwine_controller.php';

session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location:../view/index.php");
}
$sparklingwine = new SparklingWineController();
$wupdate = "Update";
$ud = "";
?>

<script type="text/javascript" class="init">
$(document).ready( function () {
    $('#example').DataTable();
} );

</script>
<div class="container-fluid bg-light">
<!-- update link -->
    <div class="container pt-3 align-center">
		<form class="form-group" role="form" action ="../controller/sparklingwine_controller.php" method="post">
            <div class="form-group row">
                <label for="wname" class="col-sm-2 col-control-label">Sparkling Wine Name</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="wname" placeholder="Sparkling Wine Name"
                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $ud = "update";
                            $wupdate = "Update";
                            $update_data = mysqli_fetch_array($sparklingwine->select($id));
                    ?>
                            value="<?= $update_data['name'] ?>"
                    <?php
                        }
                    ?>
                    >
                    <?php
                        if($ud = "update")
                        {                            
                    ?>
                            <input type="hidden" name="id" value="<?= $id ?>">
                    <?php
                        }
                    ?>
                </div>
                <button class="btn btn-outline-secondary ml-5 mr-2 px-3" type="submit" name=<?= $ud ?>><?= $wupdate ?></button>
            </div>			
		</form>
	</div>
<!-- end update link -->

<!-- datatables for sparkling wine-->
    <div class="container py-2">
        <table id="example" class="display text-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Wine Name</th>
                    <th>Wine ID</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php                                        
                    $sql = $sparklingwine->select("");
                    $i = 1;
                    while($data = mysqli_fetch_array($sql))
                    {
                ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $data['name'] ?></td>
                            <td><?= $data['id'] ?></td>
                            <td>
                                <a href="../view/sparklingwine_view.php?id=<?= $data['id'] ?>" >Update</a>
                            </td>
                        </tr>
                <?php
                    }
                ?>                
            </tbody>
        </table>
    </div>
<!-- end datatables for sparkling wine -->
</div>
<?php

require_once 'footer.php';

?>