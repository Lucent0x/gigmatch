<?php
session_start();
require("./conn.php");


$stmt = "SELECT * FROM vendors";
$query = mysqli_query($conn, $stmt);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> GigMatch </title>
    <link rel="shortcut icon" href="../utils/IMG_0212.JPG" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/notification.css">
     <link rel="stylesheet" href="../css/vendors.css">
</head>

<body>
    <main>
        <section class="sect" id="top">
            <div class="nav">
                <div class="left">
                    <div class="logo">
                       <a href="./home.php"><img src="../utils/IMG_0212.JPG" alt=""></a> 
                    </div>
                </div>
                
            </div>
        </section>
        <section class="sect" id="mid">
            <div class="header">
               <span>Coupon Vendors </span> 
            </div>
            <?php 
              while( $result = mysqli_fetch_assoc($query)){
            ?>
            <a href="<?php echo $result["link"] ?>" target="_blank" rel="noopener noreferrer">
            <div class="card">
                <div class="icon"> <img src="../utils/vendors.jpg" alt="address from"> </div>
                <div class="msg"> <b> <?php echo $result["name"] ?></b> <br> <?php echo $result["phone"] ?> </div>
            </div>
         </a>
         <?php
             }
            ?>
        </section>
    </main>
    <?php require("footer.php") ?>
</body>

</html>