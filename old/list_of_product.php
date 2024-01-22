<?php 
include('connection.php');
$sql2 = "SELECT * FROM catagory";
$query2 = $conn->query($sql2);

$data_list = array();

while($data1 = mysqli_fetch_array($query2))
{
    $id = $data1['id'];
    $category_name = $data1['category_name'];

    $data_list[$id] = $category_name;
}

?>

<!DOCTYPE html>
<head>
    <title>List of product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php 
        $sql1 = "SELECT * FROM product";
        $query1 = $conn->query($sql1);
        $num_row = mysqli_num_rows($query1);
        $divided = $num_row/5 + 1;
        if(!isset($_GET['pageno']))
        {
            header('location:list_of_product.php?pageno=1');
        }
        

        if(isset($_GET['pageno']))
        {
            $getpageno = $_GET['pageno'];
            $offset = ($getpageno - 1) * 5;
            $getpageno_increment = $getpageno + 1;
            $getpageno_decrement = $getpageno - 1;
        
        $sql = "SELECT * FROM product LIMIT 5 OFFSET $offset";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0) 
        {
            echo "<div class = 'container'>
            <table border = '1' class='table table-success table-striped'><tr><th>Product Name</th><th>Product Category</th><th>Product Code</th><th>Product Entry Date</th><th>Update</th></th><th>Delete</th></tr>";
            while($data = mysqli_fetch_assoc($result))
            {
                $product_id = $data['product_id'];
                $product_name = $data['product_name'];
                $product_category = $data['product_category'];
                $product_code = $data['product_code'];
                $product_entry_date = $data['product_entry_date'];
                /*$sql1 = "DELETE FROM product WHERE product_id = $product_id";
                if ($conn->query($sql1) === TRUE) {
                    echo "Record deleted successfully";
                  } else {
                    echo "Error deleting record: " . $conn->error;
                  }*/
                echo "<tr><td>$product_name</td>
                <td>$data_list[$product_category]</td>
                <td>$product_code</td>
                <td>$product_entry_date</td>
                <td><a href='edit_product.php?product_id=$product_id' class = 'btn btn-primary text-decoration-none text-white'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a onClick = \" javascript: return confirm('Are you sure you want to delete this?')\" href='deleteproduct.php?product_id=$product_id' class = 'btn btn-danger text-decoration-none text-white'><i class='fa-solid fa-trash-can'></i></a></td></tr>";
                 
            }
            
            echo "</table> 
            </div>";
            echo "<div class = 'container'>";
            if($getpageno_decrement == 0)
                {
                    echo "<span class = 'bg-dark text-white p-3 m-2'><</span>";
                }
                else
                {
                    echo "<span class = 'bg-success p-3 m-2'><a class = 'text-white text-decoration-none' href='list_of_product.php?pageno=$getpageno_decrement'><</a></span>";
                }
            for($x=1;$x<$divided;$x++)
            {
                if($x==$getpageno)
                {
                    echo "<span class = 'bg-dark text-white p-3 m-2'>$x</span>";
                }
                else
                {
                    echo "<span class = 'bg-success  p-3 m-2'><a class = 'text-white text-decoration-none' href='list_of_product.php?pageno=$x'>$x</a></span>";
                }
                
            }
            if($getpageno_increment > $divided)
            {
                echo "<span class = 'bg-dark text-white p-3 m-2'>></span>";
            }   
            else
            {
                echo "<span class = 'bg-success  p-3 m-2'><a class = 'text-white text-decoration-none' href='list_of_product.php?pageno=$getpageno_increment'>></a></span>";
            } 
            
            
            echo "</div>";
                  
        }
        }
        else
        {
            echo "0";
        }
    
        
        mysqli_close($conn);
    ?>
</body>
<script src="https://kit.fontawesome.com/e5e8a880e2.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>