<?php 
include('connection.php');
require('optionfunction.php');
?>

<!DOCTYPE html>
    <head>
        <title>Product</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
    <?php 
        if(isset($_GET['product_name']))
        {
            $product_name = $_GET['product_name'];
            $product_category = $_GET['product_category'];
            $product_code = $_GET['product_code'];
            $product_entry_date = $_GET['product_entry_date'];
            $sql = "INSERT INTO product (product_name,product_category,product_code,product_entry_date) 
            VALUES('$product_name','$product_category','$product_code','$product_entry_date')";
            if($conn->query($sql)==TRUE)
                    {
                        echo "
                        <div class='alert alert-success alert-dismissible fade show'>
                
                        <div class = 'row'>
                            <div class = 'col-sm-11'>
                            <strong>Inserted successfully!</strong>
                            </div>
                            <div class = 'col-sm-1'>
                            <button type= 'button' class='btn-close' data-bs-dismiss='alert'></button>
                            </div>
                        </div>
                        </div>";
                    }
                    else
                    {
                        echo"Failed!"; 
                    }
            
        }

    ?>

    <?php 
        $sql1 = "SELECT * FROM catagory";
        $query = $conn->query($sql1);
        $data = mysqli_fetch_array($query);
        //echo $id = $data['id']; 
       // echo $catagory_name = $data['category_name']; 
    ?>
    <div class = "container p-3">
    <h3>Add product to store</h3>   
    <form action = "<?php echo $_SERVER['PHP_SELF']?>" method = "GET"> 
    <br>
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Product Name</label>
    <div class="col-sm-10">
    <input type="text" name="product_name" class="form-control col-sm-10 w-25" placeholder="Your product" aria-label="Email" aria-describedby="basic-addon1"/>
    </div>
    </div>
    <br>
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Choose one from here</label>
    <div class="col-sm-10 w-25">
    <select name="product_category" class = "form-select w-75">
        <?php
            data_list('catagory','id','category_name'); 
        ?>
    </select>
    </div>
    </div>
    
    <br>
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Product Code</label>
    <div class="col-sm-10">
    <input type="text" name="product_code" class="form-control col-sm-10 w-25" placeholder="Product code" aria-label="Email" aria-describedby="basic-addon1"/>
    </div>
    </div>
    <br>
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Product Entry Date</label>
    <div class="col-sm-10">
    <input type="date" name="product_entry_date" class="form-control col-sm-10 w-25" placeholder="Product entry date" aria-label="Email" aria-describedby="basic-addon1"/>
    </div>
    </div>
    <input type = "submit" class = "btn btn-success" value ="submit">

</form>

    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>