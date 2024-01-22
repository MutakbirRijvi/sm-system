<?php 
include("connection.php");
?>

<!DOCTYPE html>
<head>
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>    

<?php

    if(isset($_GET['category_name'])){
        $catagory_name = $_GET['category_name'];
        $catagory_entrydate = $_GET['category_entrydate'];
        $sql = "INSERT INTO catagory(category_name,category_entrydate) VALUES('$catagory_name','$catagory_entrydate')";  

        if(mysqli_query($conn,$sql))
        {
            echo "
            <div class='alert alert-success alert-dismissible fade show'>
                
                        <div class = 'row'>
                            <div class = 'col-sm-11'>
                            <strong>Data inserted!</strong>
                            </div>
                            <div class = 'col-sm-1'>
                            <button type= 'button' class='btn-close' data-bs-dismiss='alert'></button>
                            </div>
                        </div>
                        </div>";
        }
    }




?>

<div class = "container p-3">
<h3>Add category for product</h3>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
    <br>
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Add Catagory</label>
    <div class="col-sm-10">
    <input type="text" name="category_name" class="form-control col-sm-10 w-25" placeholder="Category name" aria-label="Email" aria-describedby="basic-addon1" size="20" />
    </div>
    </div>
    <br>
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Entry Date</label>
    <div class="col-sm-10">
    <input type="date" name="category_entrydate" class="form-control col-sm-10 w-25" placeholder="Date" aria-label="Email" aria-describedby="basic-addon1" size="20" />
    </div>
    </div>
    <br>
    <input type = "submit" class = "btn btn-success" value ="submit">
</form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>