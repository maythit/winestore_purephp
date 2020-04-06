<?php

require_once 'header.php';
require_once 'navbar.php';
require_once '../controller/wine_controller.php';

$show = new WineController();
$sql = $show->showwine();

?>

<!-- wines -->
    <div class="container-fluid bg-light">
        <h1 class="text-center py-5">Wines</h1>

        <!-- wine image view -->
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
                                    <?= $data['name'] ?>&nbsp;
                                    <a href="../view/wine_detail_view.php?detailID=<?= $data['id'] ?>">
                                    <i class="fas fa-info-circle"></i>Detail</a></h5>
                                </figcaption>
                            </figure>
                        </div>                
                <?php
                    }
                ?>
                </div>  
            </div>
        <!-- end wine image view -->

    </div>
<!-- end wines -->

<?php
require_once 'footer.php';
?>
