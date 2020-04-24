<?php

require_once '../controller/wine_controller.php';

$show = new WineController();
$sql = $show->getAllWine();

?>
<!-- index page wine product -->
    <div class="container-fluid py-5 bg-light">

    <!-- wine image row -->
        <div class="container">
            <div class="row py-2">      
            <?php 		
                while($data = mysqli_fetch_array($sql))
                {  
            ?>                               
                    <div class="col-sm-4">
                        <figure class="figure">
                            <img src="../images/upload_file/<?= $data['image_url'] ?>" class="rounded w-100"
                                height="350" width="100">
                            <figcaption class="figure-caption text-dark">
                                <h5><?= $data['name'] ?> ( <?= $data['category_name'] ?> )</h5>
                            </figcaption>
                        </figure>
                    </div>                
            <?php
                }
            ?>
            </div>  
        </div>
    <!-- end wine image row -->
    </div>
<!-- index page wine product -->