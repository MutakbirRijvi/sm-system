<?php 
    include('connection.php');
?>
    
    <!DOCTYPE html>
        <head>
            <title>Edit Product</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        </head>
    <body>
        <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM product WHERE product_id=$id";
                    $query = $conn->query($sql);
                    $data = mysqli_fetch_assoc($query);
                    $product_id = $data['product_id'];
                    $product_name = $data['product_name'];
                    $product_category = $data['product_category'];
                    $product_code = $data['product_code'];
                    $product_entry_date = $data['product_entry_date'];
                }
                if(isset($_GET['product_name']))
                {
                    $new_product_name = $_GET['product_name'];
                    $new_product_category = $_GET['product_category'];
                    $new_product_code = $_GET['product_code'];
                    $new_product_entry_date	 = $_GET['product_entry_date'];
                    $new_product_id = $_GET['product_id'];
    

                    $sql2 = "UPDATE product SET product_name = '$new_product_name',
                    product_category = '$new_product_category', 
                    product_code = '$new_product_code',
                    product_entry_date = '$new_product_entry_date'
                    WHERE product_id = $new_product_id";
                    if($conn->query($sql2))
                    {
                         echo 'Update Successfully!';
                    }
                    else
                        echo 'Failed!';

                    }

    
        ?>
    
        <?php 
            $sql1 = "SELECT * FROM catagory";
            $query = $conn->query($sql1); 
        ?>
    <form action = "<?php echo $_SERVER['PHP_SELF']?>" method = "GET"> 
        Product Name:<br>
        <input type = "text" name ="product_name" value = "<?php echo $product_name?>"><br><br>
        Category Name:<br>
        <select name="product_category">
            <?php 
    
                while($data = mysqli_fetch_array($query)){
                $id = $data['id'];
                $catagory_name = $data['category_name'];
                echo "<option name = '$id'>$catagory_name</option>";
                }
            ?>
        </select><br><br>
        Product Code:<br>
        <input type = "text" name ="product_code" value = "<?php echo $product_code?>"><br><br>
        Product Entry Date:<br>
        <input type = "date" name ="product_entry_date" value = "<?php echo $product_entry_date?>"><br><br>
        <input type = "text" name ="product_id" value = "<?php echo $product_id?>" hidden>
        <input type = "submit" value ="Update">
    
    </form>
    </body>
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </html>