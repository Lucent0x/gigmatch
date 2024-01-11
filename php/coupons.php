<?php

    require("conn.php");

    $coupon_id = 0;
    function coupons_factory ( ) {
        //generate a coupon
        $coupon = rand(time(), 500000);
        global $conn;
        global $coupon_id;
        //save new coupon id to database
        $stmt = "INSERT INTO coupons ( _id, coupon_code, validity ) VALUES ( '{$coupon_id}', '{$coupon}', 'valid' )";
        $query = mysqli_query( $conn, $stmt);
        //checking for error messages
        if ( ! $query ) {
            echo "$conn->error";
        }else {
            "Coupon created and saved";
        }
    }
    while ( $coupon_id < 10) {
                $coupon_id++;
             coupons_factory();
    }
?>