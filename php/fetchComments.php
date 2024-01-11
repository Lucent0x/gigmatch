<?php

session_start();
require("./conn.php");
$postid = $_POST['postid'];
 $res ="";
   $query = mysqli_query($conn, "SELECT * FROM comments WHERE post_id = '{$postid}' ORDER BY id DESC LIMIT 5");
   while( $comments = mysqli_fetch_assoc ($query) ){
    $res .= '<div class="card cmmt"> 
                      <b> user_'.$comments['unique_id'] .' :  </b>
                        <i>  '.$comments['comment'] .' </i>  
                </div>';
   }

                echo $res;
   ?>
                        