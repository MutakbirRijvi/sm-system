<?php 
include('connection.php');
require('optionfunction.php');
     
?>

<!DOCTYPE html>
    <head>
        <title>Store Product</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
    <?php 
        if(isset($_GET['store_name']))
        {
            $store_name = $_GET['store_name'];
            $product_quantity = $_GET['product_quantity'];
            $store_entrydate = $_GET['store_entrydate'];
            $sql = "INSERT INTO store_product_table (store_name,product_quantity,store_entrydate) 
            VALUES('$store_name','$product_quantity','$store_entrydate')";
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
        
    ?>
    <div class = "container p-3">
    <h3>Add store product</h3>
    <form action = "<?php echo $_SERVER['PHP_SELF']?>" method = "GET"> 
    <br>
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Your product</label>
    <br>
    <div class="col-sm-10 w-25">
    <select name="store_name" class = "form-select w-50">
        <?php 
            data_list('product','product_id','product_name'); 
        ?>
    </select>
    </div>
    </div>
    
    <br>
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Product quantity</label>
    <div class="col-sm-10">
    <input type="number" name="product_quantity" class="form-control col-sm-10 w-25" placeholder="Product quantity" aria-label="Email" aria-describedby="basic-addon1"/>
    </div>
    </div>
    <br>
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Store entry date</label>
    <div class="col-sm-10">
    <input type="date" name="store_entrydate" class="form-control col-sm-10 w-25" placeholder="Product entry date" aria-label="Email" aria-describedby="basic-addon1"/>
    </div>
    </div>
    <input type = "submit" class = "btn btn-success" value ="submit">

</form>

    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>