<?php

require_once 'header.php';
require_once 'navbar.php';
require_once '../controller/wine_controller.php';

$id = $_GET['detailID'];
$controller = new WineController();
$detail = mysqli_fetch_array($controller->detail($id));

?>
<!-- wine products -->
    <div class="container-fluid bg-light">
        <div class="container py-3">
            <div class="row">
                <div class="col-sm-5">
                    <figure class="figure">
                        <img src="../images/upload_file/<?= $detail['image_url'] ?>" class="rounded w-100" height="350" width="150">
                    </figure>
                </div> 

                <div class="col-sm-5 py-5">
                    <table class="table table-bordered">
                        <tr>
                            <td>Wine Name</td>
                            <td><?= $detail['name'] ?> </td>
                        </tr>
                        <tr>
                            <td>Cateogry Name</td>
                            <td><?= $detail['category_name'] ?> </td>
                        </tr>
                    </table>
                        <h3>Description</h3>
                        <p><?= $detail['description'] ?></p>
                </div>
            </div>
        </div>
    </div>
<!-- end wine products -->
<?php
require_once 'footer.php';
?>