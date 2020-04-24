<?php

require_once 'header.php';
require_once 'navbar.php';
require_once '../controller/wine_controller.php';

$winecontroller = new WineController();
$total = $winecontroller->WineCount();
$result = $total['Total'];
$per_page = 3;
$num_of_page = ceil($result / $per_page);

if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else{
    $page = 1;
}

$offset = (($page - 1) * $per_page);
$sql = $winecontroller->getWinesByPage($per_page,$offset);

if($page != $num_of_page)
{
    $next_page = $page + 1;
}
else{
    $next_page = -1;
}
if($page != 1)
{
    $pre_page = $page - 1;
}
else{
    $pre_page = -1;
}
var_dump($next_page);
var_dump($pre_page);
?>

<!-- wines -->
    <div class="container-fluid bg-light">
        <h1 class="text-center py-3">Wines</h1>

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

        <!-- pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?= ($pre_page == -1)? "disabled":'' ?>">
                    <a class="page-link" href="?page=<?= $pre_page ?>">Previous</a>
                </li>
                <?php
                    for($i = 1;$i <= $num_of_page;$i++)
                    {
                ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                <?php
                    }
                ?>
                <li class="page-item <?= ($next_page == -1)? "disabled":'' ?>">
                    <a class="page-link" href="?page=<?= $next_page ?>">Next</a>
                </li>
            </ul>
        </nav>
        <!-- end pagination -->

    </div>
<!-- end wines -->

<?php
require_once 'footer.php';
?>
