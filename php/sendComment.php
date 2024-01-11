<?php
session_start();
require("./conn.php");
    $userid = $_SESSION['userid'];
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $postid =mysqli_real_escape_string($conn,  $_POST['postid'] );

    $query1 = mysqli_query($conn, "SELECT * FROM comments WHERE  unique_id = '{$userid}' && post_id = '{$postid}' ");
    
    $query2 = mysqli_query($conn, " SELECT * FROM comments WHERE post_id ='{$postid}' ");
    $comments = mysqli_num_rows($query2);
    if ( mysqli_num_rows ($query1) <= 2 ){
    $data ='';
    $stmt = "INSERT INTO comments ( unique_id, post_id, comment ) VALUES ( '{$userid}', '{$postid}', '{$comment}' )";
    $query3 = mysqli_query($conn, $stmt);

    if ( $query3 ){
    $query2 = mysqli_query($conn, " SELECT * FROM comments WHERE post_id ='{$postid}' ");
    $comments = mysqli_num_rows($query2);
         $query4 = mysqli_query($conn, "INSERT INTO reward ( unique_id, type, post_id, points )
                                                              VALUES (  '{$userid}',  'comment',' {$postid}', 100)");
                     if($query4){
                        echo $comments;
                     }else{
                        echo "$conn->error";
                     }
    }else{
        echo "Error: $conn->error";
    }
    }else{
        echo $comments;
    }
?>