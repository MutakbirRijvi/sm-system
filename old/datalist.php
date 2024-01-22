<?php
function data_list1($table,$colomn1,$colomn2)
{
    include('connection.php');

    $sql2 = "SELECT * FROM $table";
    $query2 = $conn->query($sql2);
    
    $data_list = array();
    
    while($data1 = mysqli_fetch_array($query2))
    {
        $data_id = $data1[$colomn1];
        $data_name = $data1[$colomn2];
    
        $data_list[$data_id] = $data_name;
    }
    

}
    
?>