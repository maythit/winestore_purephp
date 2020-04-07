<?php

require_once '../view/navbar.php';
require_once '../model/wine_model.php';

$winename = $_POST['wsearch'];
$wine = new Wine();
$sql = mysqli_fetch_array($wine->search($winename));

?>
<!-- wine search -->
<div class="container-fluid bg-light">
        <div class="container py-3">
            <div class="row">
                <div class="col-sm-5">
                    <figure class="figure">
                        <img src="../images/upload_file/<?= $sql['image_url'] ?>" class="rounded w-100" height="350" width="150">
                    </figure>
                </div> 

                <div class="col-sm-5 py-5">
                    <table class="table table-bordered">
                        <tr>
                            <td>Wine Name</td>
                            <td><?= $sql['name'] ?> </td>
                        </tr>
                        <tr>
                            <td>Cateogry Name</td>
                            <td><?= $sql['category_name'] ?> </td>
                        </tr>
                    </table>
                        <h3>Description</h3>
                        <p><?= $sql['description'] ?></p>
                </div>
            </div>
        </div>
    </div>
<!-- end wine search -->

<?php 

require_once '../view/footer.php';

?>

