<?php
session_start();
require("conn.php");
$userid = $_SESSION['userid'];

$firstName = mysqli_real_escape_string($conn, $_POST["firstname"] ); 
$lastName = mysqli_real_escape_string($conn, $_POST["lastname"] ); 
$email = mysqli_real_escape_string($conn, $_POST["email"] ); 
$password = mysqli_real_escape_string($conn, $_POST["password"] ); 
$phone = mysqli_real_escape_string($conn, $_POST["phone"] ); 
$account = mysqli_real_escape_string($conn, $_POST["acctnumber"] ); 
$bankname = mysqli_real_escape_string($conn, $_POST["bankname"] ); 

if( isset( $_FILES['avatar'])){
   $folder = "./avatars/";
   $avatar = $_FILES['avatar']["name"];
   $type = $_FILES['avatar']["type"];
   $tmp = $_FILES['avatar']["tmp_name"];

   
  $explode  = explode('.', $avatar);
  $extension = end($explode);
  $validExtensions = ['png', 'jpeg', 'jpg'];
  if (in_array( $extension, $validExtensions ) === true){
      $time = time();
      $newAvatar= $time.$avatar;
       $move =  move_uploaded_file( $tmp, $folder.$newAvatar );
      if($move){
        $sql = mysqli_query( $conn, "UPDATE users SET avatar ='{$newAvatar}' WHERE unique_id = '{$userid}' ");
        if($sql){
            echo "done";
                header("location:./profile.php");
        }else{
            echo "$conn->error";
        }
      }
}
}

$stmt = "UPDATE users SET firstname='{$firstName}', lastname ='{$lastName}', email ='{$email}',
    password ='{$password}', phone ='{$phone}', account= '{$account}', bank = '{$bankname}' WHERE unique_id = '{$userid}' ";
 $query = mysqli_query( $conn, $stmt ); 
 
//  if($query){
//     echo "saved";
//  }else{
//     echo "$conn->error";
//  }

?>