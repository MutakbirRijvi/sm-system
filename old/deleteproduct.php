<?php
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<head>
    <title>List of catagory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<html>

<?php
if(isset($_GET['product_id']))
                {
                    $product_id = $_GET['product_id'];
                    $sql1 = "DELETE FROM product WHERE product_id = $product_id";
                    $delete = mysqli_query($conn,$sql1);
                    if($delete)
                {
                    $_SESSION['message'] = "
                    <div class = 'row alert alert-success alert-dismissible fade show'>
                    <div class = 'col-sm-11'><p>Delete Successfully!</p></div>
                    
                    <div class='col-sm-1'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    </div>
                    </div>

                    ";
                    header('location:list_of_product.php');
                }
                }

                
?>
