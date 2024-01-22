<?php 
    include("connection.php");
    /*session_start();
    $firstname = $_SESSION['firstname'];
    $firstname = $_SESSION['lastname'];

    if(!empty($firstname) && !empty($lastname))
    {
        header('location:index.php');
    }*/
?>

<!DOCTYPE html lang = "en">
    <head>
        <title>SMS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
    <div class = "container bg-light">
        <div class = "row p-3 border-bottom border-success"> 
        <div class = "col-sm-9">
            <h1><a href="#" class = "text-success text-decoration-none">Store Management System</a></h1>
        </div>
        <div class = "col-sm-3">
            <p><a href="logout.php" class = "text-white text-decoration-none btn btn-danger">Logout</a></p>
        </div>
        </div>
        
        <div class = "">
            <div class = "row">
                <div class = "col-sm-3 bg-light p-0 m-0">
                    <h4 class = "bg-success text-white px-2 py-1">Catagory</h4>
                    <ul class = "list-group">
                        <li class = "list-group-item"><a href="add_category.php" class = "text-dark text-decoration-none">Add Catagory</a></li>
                        <li class = "list-group-item"><a href="list_of_catagory.php" class = "text-dark text-decoration-none">Catagory List</a></li>
                    </ul>
                    <h4 class = "bg-success text-white px-2 py-1">Product</h4>
                    <ul class = "list-group">
                        <li class = "list-group-item"><a href="add_product.php" class = "text-dark text-decoration-none">Add Product</a></li>
                        <li class = "list-group-item"><a href="list_of_product.php" class = "text-dark text-decoration-none">Product List</a></li>
                    </ul>
                    <h4 class = "bg-success text-white px-2 py-1">Store Product</h4>
                    <ul class = "list-group">
                        <li class = "list-group-item"><a href="storeproduct.php" class = "text-dark text-decoration-none">Add Store Product</a></li>
                        <li class = "list-group-item"><a href="list_of_entryproduct.php" class = "text-dark text-decoration-none">Store Product List</a></li>
                    </ul>
                    <h4 class = "bg-success text-white px-2 py-1">Spend Product</h4>
                    <ul class = "list-group">
                        <li class = "list-group-item"><a href="spendproduct.php" class = "text-dark text-decoration-none">Add Spend Product</a></li>
                        <li class = "list-group-item"><a href="list_of_spendproduct.php" class = "text-dark text-decoration-none">Spend Product List</a></li>
                    </ul>
                    <a href="report.php" class = "text-dark text-decoration-none"><h4 class = "bg-success text-white px-2 py-1">Report</h4></a>
                    
                </div>
                <div class = col-sm-9>
                        <div class="row p-4">
                            <div class = "col-sm-3">
                            <a href="add_category.php"><i class="fa-solid fa-folder-plus fa-5x text-success"></i></a>
                            <p>Add Catagory</p>
                            </div>
                            <div class = "col-sm-3">
                            <a href="list_of_catagory.php"><i class="fa-solid fa-folder-open fa-5x text-success"></i></a>
                            <p>Catagory List</p>
                            </div>
                            <div class = "col-sm-3">
                            <a href="add_product.php"><i class="fa-solid fa-circle-plus fa-5x text-success"></i></a>
                            <p>Add Product</p>
                            </div>
                            <div class = "col-sm-3">
                            <a href="list_of_product.php"><i class="fa-brands fa-product-hunt fa-5x text-success"></i></a>
                            <p>Product List</p>
                            </div>
                            
                            
                        </div>
                        <hr>

                        <div class = "row p-4">

                            <div class = "col-sm-3">
                            <a href="storeproduct.php"><i class="fa-solid fa-cart-plus text-success fa-5x"></i></a>
                            <p>Add Store Product</p>
                            </div>
                            <div class = "col-sm-3">
                            <a href="list_of_entryproduct.php"><i class="fa-solid fa-store fa-5x text-success"></i></a>
                            <p>Store Product List</p>
                            </div>
                            <div class = "col-sm-3">
                            <a href="spendproduct.php"><i class="fa-solid fa-hand-holding-hand fa-5x text-success"></i></i></a>
                            <p>Add Spend Product</p>
                            </div>
                            <div class = "col-sm-3">
                            <a href="list_of_spendproduct.php"><i class="fa-solid fa-bars-staggered fa-5x text-success"></i></i></a>
                            <p>Spend Product List</p>
                            </div>

                        </div>
                        <hr>
                        <div class = "row p-4">

                            <div class = "col-sm-3">
                            <a href="report.php"><i class="fa-solid fa-chart-column fa-5x text-success"></i></a>
                            <p>Report</p>
                            </div>
                            

                        </div>

                        <hr>
                        <div class = "row p-4">
                            <div class = "col-sm-3">
                            <a href="signin.php"><i class = "fa-solid fa-user-plus text-success fa-5x"></i></a>
                            <p>Add User</p>
                            </div>
                            <div class = "col-sm-3">
                            <a href="userlist.php"><i class = "fa-solid fa-users text-success fa-5x"></i></a>
                            <p>Users</p>
                            </div>

                        </div>
                </div>
            </div>
        </div>
        
        <div class = "border-top border-success">
            <p class = "text-center p-2">@copyright</p>
        </div>
    
    
    </div>

</body>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://kit.fontawesome.com/e5e8a880e2.js" crossorigin="anonymous"></script>

</html>