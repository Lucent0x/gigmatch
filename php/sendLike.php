<?php
    session_start();
    require("./conn.php");
    $userid = $_SESSION['userid'];
    $postid = mysqli_real_escape_string($conn, $_POST['postid']);
    
    $stmt1 = "SELECT * FROM posts WHERE unique_id = '{$userid}' && postid= '{$postid}' ";
    $query = mysqli_query($conn, $stmt1);

    if( mysqli_num_rows($query) > 0 ){

        $query2 =  mysqli_query($conn, "DELETE FROM posts WHERE unique_id = '{$userid}' && postid= '{$postid}' ");
                if($query2){
                $query3 = mysqli_query($conn, $stmt1);
                    $query4 = mysqli_query($conn, "DELETE FROM reward WHERE unique_id = '{$userid}' && post_id= '{$postid}' && type='like' ");
                    if($query4){
                    echo mysqli_num_rows($query3);
                    }else{
                        echo "$conn->error";
                    }
                }

    }else{
    $query2 = mysqli_query($conn,  "INSERT INTO posts ( postid, engtype, unique_id ) VALUES ( '{$postid}', 'like', '{$userid}')");
            if($query2){
                $stmt3 = "SELECT * FROM posts WHERE unique_id = '{$userid}' && postid= '{$postid}' ";
                $query3 = mysqli_query($conn, $stmt3);
                 
                  $query4 = mysqli_query($conn, "INSERT INTO reward ( unique_id, type, post_id, points )
                                                         VALUES (  '{$userid}',  'like',' {$postid}', 100)");
                     if($query4){
                         echo mysqli_num_rows($query3);
                     }else{
                        echo "$conn->error";
                     }
            }
    }
?>