<?php 
include('connection.php');
require('optionfunction.php');

    $sql3 = "SELECT * FROM product";
    $query3 = $conn->query($sql3);
    
    $data_list = array();
    
    while($data3 = mysqli_fetch_array($query3))
    {
        $product_id = $data3['product_id'];
        $product_name = $data3['product_name'];
    
        $data_list[$product_id] = $product_name;
    }
?>

<!DOCTYPE html>
    <head>
        <title>Report</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
    <?php 
        

    ?>
    
<div class = "container p-3">
    <h3>Generate Report</h3>   
    <form action = "<?php echo $_SERVER['PHP_SELF']?>" method = "GET"> 
        <br>
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Product Name</label>
    
    <select type="text" class="form-select w-25" name="product_name">
    <?php 
        $sql = "SELECT * FROM product";
        $query = $conn->query($sql);
        while($data = mysqli_fetch_assoc($query)){
            $product_id = $data['product_id'];
            $product_name = $data['product_name'];
        
        ?>

        <option value="<?php echo $product_id?>"><?php echo $product_name?></option>
        
    <?php } ?>
    </select>

    </div>
    
    <input type = "submit" class = "btn btn-success" value ="Generate Report">

    <?php 
    if(isset($_GET['product_name']))
    {
        $product_name =$_GET['product_name'];

        $sql1 = "SELECT * FROM store_product_table WHERE store_name = $product_name";
        $query1 = $conn->query($sql1);
        while($data1 = mysqli_fetch_assoc($query1)){
            $store_name = $data1['store_name'];
            $product_quantity = $data1['product_quantity'];
            $store_entrydate = $data1['store_entrydate'];
    
            echo "<br><h1>$data_list[$store_name]</h1>";
            echo "<table border = '1' class='table table-success table-striped'><tr><th>Product Entry Date</th><th>Product Quantity</th></tr>";
            echo "<tr><td>$store_entrydate</td><td>$product_quantity</td></tr>";
            echo "</table>";
        }
    }
    ?>
    
    

</form>

</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>