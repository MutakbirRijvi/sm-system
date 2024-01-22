<?php

function data_list($table,$colomn1,$colomn2)
{
        include('connection.php');
        $sql = "SELECT * FROM $table";
        $query = $conn->query($sql); 

        while($data = mysqli_fetch_array($query)){
            $data_id = $data[$colomn1];
            $data_name = $data[$colomn2];
            echo "<option value = '$data_id'>$data_name</option>";
            }
}

?>