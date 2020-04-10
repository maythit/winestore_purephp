<?php

require_once '../view/header.php';
require_once '../view/admin_navbar.php';
require_once '../controller/wine_controller.php';

session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location:../view/index.php");
}

?>

<script type="text/javascript" class="init">
$(document).ready( function () {
    $('#example').DataTable();
} );

</script>
<!-- datatables -->
    <div class="container bg-light py-3">
        <table id="example" class="display text-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Wine Name</th>
                    <th>Category</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $wine = new WineController();
                    $sql = $wine->selectJoin("");
                    $i = 1;
                    while($data = mysqli_fetch_array($sql))
                    {
                ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $data['name'] ?></td>
                            <td><?= $data['category_name'] ?></td>
                            <td>
                                <a href="../view/wine_update_view.php?updateid=<?= $data['id'] ?>" >Update</a>
                            </td>
                            <td>
                                <a href="../controller/wine_controller.php?deleteid=<?= $data['id'] ?>" >Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                ?>                
            </tbody>
        </table>
    </div>
<!-- end datatables -->

<?php

require_once 'footer.php';

?>