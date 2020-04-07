<?php

require_once '../view/navbar.php';
require_once '../model/wine_model.php';

$winename = $_POST['wsearch'];
$wine = new Wine();
$sql = $wine->search($winename);

?>
<!-- wine search -->
<div class="container-fluid bg-light">
        <div class="container py-3">
        <?php
            while($data = mysqli_fetch_array($sql))
            {
        ?>
            <div class="row">
                <div class="col-sm-5">
                    <figure class="figure">
                        <img src="../images/upload_file/<?= $data['image_url'] ?>" class="rounded w-100" height="350" width="150">
                    </figure>
                </div> 

                <div class="col-sm-5 py-5">
                    <h3 class="text-center pb-2"><?= ucwords($data['category_name']) ?></h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Wine Name</td>
                            <td><?= $data['name'] ?> </td>
                        </tr>
                        <tr>
                            <td>Cateogry Name</td>
                            <td><?= $data['category_name'] ?> </td>
                        </tr>
                    </table>
                        <h3>Description</h3>
                        <p><?= $data['description'] ?></p>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
<!-- end wine search -->

<?php 

require_once '../view/footer.php';

?>

