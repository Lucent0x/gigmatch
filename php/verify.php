<?php
    session_start();
    require("conn.php");

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
      //
    $stmt = "SELECT * FROM users WHERE email = '$email' && password = '$password' ";
     $query = mysqli_query($conn, $stmt);
     if( mysqli_num_rows ($query) > 0 ){
      $result = mysqli_fetch_assoc($query);
      $userid = $result['unique_id'];
      $_SESSION['userid'] = $userid;
      $_SESSION['username'] = $result['username'];
      //
        $stmt = "SELECT * FROM reward WHERE  unique_id = '{$userid}' ORDER BY id desc LIMIT 2";
        $query2 = mysqli_query( $conn, $stmt );
            $result2 = mysqli_fetch_assoc($query2); 
              $points = $result2['points']??"";
              $lastSession = $result2['session'];
              $time = time();
              //check if it's the users first time login.
              if ($lastSession == ""){
               $stmt3 = "INSERT INTO reward ( unique_id, type, session, points ) VALUES ( '{$userid}', 'daily login bonus', '{$time}', 10 ) ";
               $query3 = mysqli_query($conn, $stmt3);
              }else{
               
               $interval = $lastSession + 86400;
               $currentSession = time();
               if (  $currentSession > $interval ){
                  //Update table
                  $newPoints = $points + 10;
                  $stmt4 = " UPDATE reward SET points = '{$newPoints}', session = '{$time}' WHERE unique_id = '{$userid}' && type = 'daily login bonus' ";
                  $query4 = mysqli_query( $conn, $stmt4 );
                  if( $query4 ){
                     $stmt5 = "INSERT INTO notification ( unique_id, message ) VALUES ( '{$userid}', 'daily login bonus received' ) ";
                     $query5 = mysqli_query( $conn, $stmt5 );
                     if( $query5 ){
                      echo "correct";    
                     } 
                  }
                   
               }
               else{
                  echo "correct";
               }
              }
        
      //   date_diff()
     }else {
        echo "incorrect email or password";
     }
?>