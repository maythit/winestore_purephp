<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.min.css"/>
    <script type="text/javascript" src="../includes/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand pl-4" href="../view/index.php"><h1>Wine</h1></a>
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav justify-content-center h5">
                <li class="nav-item active">
                    <a class="nav-link text-light" href="../view/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../view/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../view/wines.php">Wines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../view/contact.php">Contact</a>
                </li>
                </ul>
            </div>
        <!-- Search box and login -->
            <form class="form-inline justify-content-end">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-secondary text-white my-2 my-sm-0" type="submit">Search</button>            
            </form>
            <button class="btn btn-outline-secondary text-white my-2 my-sm-0 ml-1" type="submit" data-toggle="modal" data-target="#login">Log In</button>
        <!-- end search box and login -->
        
        <!-- Model -->
            <div class="modal fade" id="login" role="dialog">
                <div class="modal-dialog modal-md">    
                    <!-- Modal content-->
                    <div class="modal-content bg-light">
                        <div class="modal-header">
                            <h3 class="text-center">Log In</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="../controller/login_controller.php" method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email"' class="form-control" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                </div>                                
                                <button type="submit" class="btn btn-secondary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </form>
                        </div>
                    </div>
                    <!-- end Model Content -->
                </div>
            </div>
        <!-- end Model -->

    </nav>
<!-- end navigation bar -->