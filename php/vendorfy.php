<?php

    session_start();
    require("./conn.php");
    $userid = $_SESSION['userid'];
    $vendor = mysqli_real_escape_string($conn, $_POST["name"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $link = mysqli_real_escape_string($conn, $_POST["link"]);

    $stmt = "INSERT INTO vendors ( name, phone, link ) VALUES ( '{$vendor}', '{$phone}', '{$link}' )";
    $query = mysqli_query($conn, $stmt);

    if ($query){
        echo "done";
    }else{
        echo "$conn->error";
    }
    ?>