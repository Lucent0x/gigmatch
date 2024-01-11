<?php
    session_start();
    require("./conn.php");
    $userid = $_SESSION['userid'];
    $stmt = " SELECT * FROM smartearners WHERE unique_id = '{$userid}' ";
    $query = mysqli_query($conn, $stmt);
    if ( mysqli_num_rows($query) > 0 ){
        $category = "Smart Earner";
    }else{
        $category = "Regular";
    }

    $stmt2 = "SELECT * FROM users WHERE unique_id = '{$userid}' ";
    $query2 = mysqli_query($conn, $stmt2);
    $data = mysqli_fetch_assoc($query2);
    if($data["avatar"] == ""){
        $avatar = "avatar.png";
    }else{
        $avatar = $data["avatar"];
    }
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
    <link rel="stylesheet" href="../css/notification.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/upgrade.css">
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
        <span><a href="./vendors.php" style="color:darkred">Find coupon vendors </a></span>
    </div>
            <div class="bottom">
                <div class="left"> 
                    <div class="avatar">
                        <img src="./avatars/<?php echo $avatar ?>" alt="avatar">
                    </div>
                    <div class="data mt-2 mb-2">
                    <div class="username"> <?php echo $data['username']??'' ?> <div class="tag" style="font-size: small"> <?php echo $category ?></div> </div>
                    </div>
                </div>
                <div class="right box">
                    <form action="">
                    <div class="info-row">
                         <div class="info"> 
                            <input type="text" class="input" name="coupon" placeholder="Enter a valid coupon code."  required>
                    </div>
                     <div class="info">
                            <input type="submit" class="button is-fullwidth dark" value="UPGRADE">
                    </div>
                    </div>
                </form>
                </div>
            </div>
            <script src="../js/upgrade.js"></script>
        </section>
    </main>
    <?php require("footer.php") ?>
</body>

</html>