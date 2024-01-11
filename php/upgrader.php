<?php

    session_start();
    require("./conn.php");
    $userid = $_SESSION['userid'];
    $coupon = mysqli_real_escape_string($conn, $_POST["coupon"]);

    $stmt = "SELECT * FROM coupons WHERE coupon_code = '{$coupon}' ";
    $query = mysqli_query( $conn, $stmt );
    if ( mysqli_num_rows ( $query ) > 0 ){
    $result = mysqli_fetch_assoc( $query );
    $validity = $result["validity"];
    if( $validity === "valid"){
        $stmt2 = "INSERT INTO smartearners ( unique_id, coupon ) VALUES ( '{$userid}', '{$coupon}'  ) ";
        $query2 = mysqli_query($conn, $stmt2);
        if($query2){
            $stmt3 = "UPDATE coupons SET validity = 'invalid' WHERE coupon_code = '{$coupon}' ";
            $query3 = mysqli_query($conn, $stmt3);
            if($query3){
                echo "Smart Earner";
            }else{
                echo "$conn->error";
            }
        }else{
            echo "$conn->error";
        }
    }else{
        echo "This code has already been used";
    }
    }else{
        echo "Invalid Code";
    }
?>