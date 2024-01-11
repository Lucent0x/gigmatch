<?php
session_start();
require("./conn.php");
$userid = $_SESSION['userid'];

$header = mysqli_real_escape_string($conn, $_POST["header"] ); 
$link = mysqli_real_escape_string($conn, $_POST["link"] ); 
if( isset( $_FILES['thumbnail'])){
   $folder = "./thumbnails/";
   $thumbnail = $_FILES['thumbnail']["name"];
   $type = $_FILES['thumbnail']["type"];
   $tmp = $_FILES['thumbnail']["tmp_name"];

   
  $explode  = explode('.', $thumbnail);
  $extension = end($explode);
  $validExtensions = ['png', 'jpeg', 'jpg'];
  if (in_array( $extension, $validExtensions ) === true){
      $time = time();
      $newthumbnail= $time.$thumbnail;
       $move =  move_uploaded_file( $tmp, $folder.$newthumbnail );
      if($move){
        $stmt = "INSERT INTO contents ( header, thumbnail, link ) VALUES ( '{$header}', '{$newthumbnail}', '{$link}' )";
        $query = mysqli_query($conn, $stmt);
        if($query){
            echo "done";
                // header("location:./profile.php");
        }else{
            echo "$conn->error";
        }
      }
}
}


?>