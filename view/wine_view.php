<?php

require_once '../view/header.php';
require_once '../view/admin_navbar.php';
require_once '../controller/category_controller.php';
require_once '../controller/user_controller.php';

session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location:../view/index.php");
}
$userid = $_SESSION['user_id'];

$cateid = new CategoryController();
$categoryID = $cateid->select("");

$createdby = new UserController();
$cby = $createdby->select("");

$updatedby = new UserController();
$uby = $updatedby->select("");

?>
<div class="container-fluid bg-dark text-white py-2">
<!-- Wine View Form -->    
    <div class="container">
        <form action="../controller/wine_controller.php" id="myForm" onsubmit="return validateForm()" enctype="multipart/form-data" method="post">

        <!-- wine name -->   
            <div class="form-group row">
                <label for="wname" class="col-sm-2 col-control-label">Wine Name</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="wname" placeholder="Enter Wine Name">
                </div>
            </div>
        <!-- end wine name -->

        <!-- category id -->
            <div class="form-group row">
                <label for="categoryid" class="col-sm-2 col-control-label">Category ID</label>
                <div class="col-sm-3">
                    <select name="categoryid" id="categoryid" class="form-control">
                    <?php 
                        while($cateid = mysqli_fetch_array($categoryID))
                        {
                    ?>
                            <option value="<?= $cateid['category_id'] ?>"> <?= $cateid['category_name'] ?> </option>
                    <?php 
                        }
                    ?>
                    </select>
                </div>
            </div>
        <!-- end category id -->

        <!-- description -->
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-control-label">Description</label>
                <div class="col-sm-3">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
                </div>
            </div>
        <!-- end description -->

        <!-- image url -->
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-control-label">Wine Image</label>
                <div class="col-sm-3">
                    <input type="file" class="form-group" name="image" id="image" accept="image/png,image/gif,image/jpeg,image/jpg">
                </div>
            </div>
        <!-- end image url -->

        <!-- created by and updated by -->
            <input type="hidden" name="createdby" value="<?= $userid ?>">
            <input type="hidden" name="updatedby" value="<?= $userid ?>">
        <!-- end created by and updated by -->

        <!-- save button -->
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-3">
                    <button class="btn btn-outline-secondary text-white ml-5 mr-2 px-3" type="submit" name="add">Add</button>
                    <button class="btn btn-outline-secondary text-white" type="reset" name="cancel">Cancel</button>
                </div>
            </div>
        <!-- end save button -->
        
        </form>

    <!-- field check -->
        <script type="text/javascript">
            function validateForm()
            {
                var str = "";
                var ans = true;
                var name = document.forms["myForm"]["wname"].value;
                var desc = document.forms["myForm"]["description"].value;

                if(name == null || name == "")
                {
                    str += "Wine name must be filled.";
                    ans = false;
                }
                if(desc == null || desc == "")
                {
                    str += "Description must be filled.";
                    ans = false;
                }
                if(ans == false)
                {
                    alert(str);
                    return false;
                }
            }
        </script>
    <!-- end field check -->

    </div>
    
<!-- End Wine View Form -->
</div>
<?php
    require_once 'footer.php';
?>