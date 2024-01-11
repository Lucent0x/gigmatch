<?php
    require("conn.php");
    $firstName = mysqli_real_escape_string($conn, $_POST['firstname'] ??'');
    $lastName = mysqli_real_escape_string($conn, $_POST['lastname'] ??"");
    $userName = mysqli_real_escape_string($conn, $_POST['lastnameU'] ??"");
    $email= mysqli_real_escape_string($conn, $_POST['email'] ??"");
    $phone = mysqli_real_escape_string($conn, $_POST['phone'] ??"");
    $password1 = mysqli_real_escape_string($conn, $_POST['password1'] ??"");
    $password2 = mysqli_real_escape_string($conn, $_POST['password2'] ??"");
    $couponCode = mysqli_real_escape_string($conn, $_POST['coupon'] ??"");
    $referrerCode = mysqli_real_escape_string($conn, $_POST['referrer'] ??"");

    $sql1 = mysqli_query($conn, "SELECT `email` FROM `users` WHERE  `email` = '$email' ");
        if (mysqli_num_rows($sql1) > 0){
            echo "$email - already has an account please provide another email";
        }else{
        $sql8 = mysqli_query($conn, "SELECT `username` FROM `users` WHERE  `username` = '$userName' ");
        if (mysqli_num_rows($sql8) > 0){
            echo "$userName - has been taken ";
        }else{
            $sql7 = mysqli_query($conn, "SELECT `phone` FROM `users` WHERE  `phone` = '$phone' ");
            if (mysqli_num_rows($sql7) > 0){
            echo "$phone - already has an account please provide another phone number";
        }else{
            if ( "$password1" === "$password2" ){
                $sql2 = mysqli_query($conn, "SELECT validity FROM `coupons` WHERE  `coupon_code` = '$couponCode' ");
                if( mysqli_num_rows($sql2) > 0 ) {
                    $row = mysqli_fetch_assoc($sql2);
                       if ($row['validity'] === "valid"){

                                    $sql5 = mysqli_query($conn, "UPDATE `coupons`  SET validity = 'invalid' WHERE `coupon_code` = '$couponCode' ");
                                    if($sql5){

                                        $random_id = rand(time(), 10000000);
                                        $sql = mysqli_query($conn, "INSERT INTO users ( unique_id, firstname, lastname, username, email, phone, password, referrer, coupon )
                                                     VALUES ( '{$random_id}', '{$firstName}', '{$lastName}', '{$userName}', '{$email}', '{$phone}', '{$password1}', '{$referrerCode}', '{$couponCode}' ) ");
                                            //referral bonus
                                            $referrals = mysqli_query($conn, "INSERT INTO referrers ( unique_id, referral_code, status ) VALUES ( '{$random_id}', '{$referrerCode}', 'active' )");
                                          //indirect ref bonus functionality
                                            $subrefs = mysqli_query($conn, "SELECT referrer FROM users WHERE username = '{$referrerCode}' ");
                                            if(mysqli_num_rows( $subrefs ) > 0 ){
                                            $referrer = mysqli_fetch_assoc($subrefs);
                                            $indirectRef = $referrer['referrer'];
                                            $indirectBonus = mysqli_query($conn, "INSERT INTO indirect_refs ( parent, username, status ) 
                                            VALUES ( '{$indirectRef}', '{$userName}', 'active'  )" );
                                            }
                                           if($sql){
                                                echo "created";
                                            }else{
                                                echo "$conn->error";
                                            }
                                        
                                        }else{
                                        echo "failed $conn->error";
                                    }
                                
                       }else{
                        echo "This coupon code has already been used";
                       } 
                }else{
                    echo "Invalid coupon code";
                }
            }else{
                echo "both password do not match ";
            }
        }
    }
}
?>