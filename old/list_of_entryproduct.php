<?php 
include('connection.php');
$sql2 = "SELECT * FROM product";
$query2 = $conn->query($sql2);

$data_list = array();

while($data1 = mysqli_fetch_array($query2))
{
    $product_id = $data1['product_id'];
    $product_name = $data1['product_name'];

    $data_list[$product_id] = $product_name;
}

?>

<!DOCTYPE html>
<head>
    <title>List of entry product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php 
        $sql = "SELECT * FROM store_product_table";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0) 
        {
            echo "<div class = 'container'>
            <table border = '1' class='table table-success table-striped'><tr><th>Product Name</th><th>Product Quantity</th><th>Product Entry Date</th><th>Update</th></th><th>Delete</th></tr>";
            while($data = mysqli_fetch_assoc($result))
            {
                $store_id  = $data['store_id'];
                $store_name = $data['store_name'];
                $product_quantity = $data['product_quantity'];
                $store_entrydate = $data['store_entrydate'];
                /*$sql1 = "DELETE FROM product WHERE product_id = $product_id";
                if ($conn->query($sql1) === TRUE) {
                    echo "Record deleted successfully";
                  } else {
                    echo "Error deleting record: " . $conn->error;
                  }*/
                echo "<tr><td>$data_list[$store_name]</td><td>$product_quantity</td><td>$store_entrydate</td><td><a href='edit_product.php?store_id=$store_id' class = 'btn btn-primary text-decoration-none text-white'><i class='fa-solid fa-pen-to-square'></i></a></td><td><a onClick = \" javascript: return confirm('Are you sure you want to delete this?')\" href='deletestoreproduct.php?store_id=$store_id' class = 'btn btn-danger text-decoration-none text-white'><i class='fa-solid fa-trash-can'></i></a></td></tr>";
            }
            echo "</table>
            </div>";
        }
        else
        {
            echo "0 Results";
        }
    
        
        mysqli_close($conn);
    ?>
</body>
<script src="https://kit.fontawesome.com/e5e8a880e2.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>