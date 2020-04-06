<!-- admin navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand pl-4" href="../view/admin_view.php"><h3>Admin</h3></a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav justify-content-center h5">
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="../view/wine_view.php">Add New Wine</a>
                    </li>
                <!-- drop down list -->
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Wine Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../view/redwine_view.php">Red Wine</a>
                            <a class="dropdown-item" href="../view/whitewine_view.php">White Wine</a>
                            <a class="dropdown-item" href="../view/rosewine_view.php">Rose Wine</a>
                            <a class="dropdown-item" href="../view/dessertwine_view.php">Dessert Wine</a>
                            <a class="dropdown-item" href="../view/sparklingwine_view.php">Sparkling Wine</a>
                        </div>
                    </li>
                <!-- end drop down list -->                
                </ul>
            </div>
        <!-- log out button -->   
            <div class="row justify-content-end mx-5">
                <a href="../view/logout.php">
                    <button class="btn btn-outline-secondary text-white" type="submit">Log Out</button>
                </a>
            </div>
        <!-- end log out button -->
    </nav>
<!-- end admin navbar -->
    <?php
?>