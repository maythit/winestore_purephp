<?php

require_once 'header.php';
require_once 'navbar.php';
require_once '../controller/wine_controller.php';

$show = new WineController();
$sql = $show->getAllWine();
$total = $show->WineCount();
$result = $total['Total'];
$per_page = 10;
$num_of_page = ceil($result / $per_page);
$offset = (($num_of_page - 1) * $per_page);
$next_page = $num_of_page + 1;
$pre_page = $num_of_page - 1;

?>

<!-- wines -->
    <div class="container-fluid bg-light">
        <h1 class="text-center py-5">Wines</h1>

        <!-- pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
        <!-- end pagination -->
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
