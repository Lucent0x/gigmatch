<?php
   session_start();
   require("./conn.php");

   $userid = mysqli_real_escape_string($conn, $_POST['userid']);
   $amount = mysqli_real_escape_string($conn, $_POST['amount']);
   $type = mysqli_real_escape_string($conn, $_POST['typeof']);

    $stmt = "INSERT INTO payments ( amount, unique_id, type ) VALUES ( '{$amount
    }', '{$userid}', '{$type}' )";

    $query = mysqli_query( $conn, $stmt );

    if($query){
        echo "done";
    }else{
        echo $conn->error;
    }


?>