<?php 
include('connection.php');
require('optionfunction.php');
     
?>

<!DOCTYPE html>
    <head>
        <title>Spend Product</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
    <?php 
        if(isset($_GET['spend_name']))
        {
            $spend_name = $_GET['spend_name'];
            $spend_quantity = $_GET['spend_quantity'];
            $spend_entrydate = $_GET['spend_entrydate'];
            $sql = "INSERT INTO spendproduct (spend_name,spend_quantity,spend_entrydate) 
            VALUES('$spend_name','$spend_quantity','$spend_entrydate')";
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
    <label for="inputEmail" class="col-sm-2 col-form-label">Spend product name</label>
    <br>
    <div class="col-sm-10 w-25">
    <select name="spend_name" class = "form-select w-50">
        <?php 
            data_list('product','product_id','product_name'); 
        ?>
    </select>
    </div>
    </div>
    
    <br>
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Spend Product quantity</label>
    <div class="col-sm-10">
    <input type="number" name="spend_quantity" class="form-control col-sm-10 w-25" placeholder="Spend quantity" aria-label="Email" aria-describedby="basic-addon1"/>
    </div>
    </div>
    <br>
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Spend Product entry date</label>
    <div class="col-sm-10">
    <input type="date" name="spend_entrydate" class="form-control col-sm-10 w-25" placeholder="Spend Product entry date" aria-label="Email" aria-describedby="basic-addon1"/>
    </div>
    </div>
    <input type = "submit" class = "btn btn-success" value ="submit">

</form>

    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>