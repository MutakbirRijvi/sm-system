<?php 
include("connection.php");
?>

<!DOCTYPE html>
<head>
    <title>Edit Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>    

<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM catagory WHERE id=$id";
        $query1 = $conn->query($sql);
        $data = mysqli_fetch_assoc($query1);
        $id = $data['id'];
        $category_name = $data['category_name'];
        $category_entrydate = $data['category_entrydate'];
        
    }

    if(isset($_GET['category_name']))
    {
    $new_category_name = $_GET['category_name'];
    $new_category_entrydate	 = $_GET['category_entrydate'];
    $new_id = $_GET['id'];
    

    $sql1 = "UPDATE catagory SET category_name = '$new_category_name', category_entrydate = '$new_category_entrydate' WHERE id = $new_id";
    if($conn->query($sql1))
    {
        echo 'Update Successfully!';
        
    }
    else
        echo 'Failed!';

    }



?>

<form action="edit_catagory_list.php" method="GET">
    Add Catagory:<br>
    <input type="text" name = "category_name" value = "<?php echo $category_name?>"><br><br>
    Entry Date:<br>
    <input type="date" name = "category_entrydate" value = "<?php echo $category_entrydate?>">
    <input type="text" name = "id" value = "<?php echo $id?>" hidden><br><br>

    <input type="submit" value= "Update">
</form>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>