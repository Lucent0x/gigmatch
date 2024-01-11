<?php
session_start();
require("./conn.php");
$userid = $_SESSION['userid'];

$stmt = "SELECT * FROM users WHERE unique_id = '{$userid}' ";
$query = mysqli_query( $conn, $stmt );
$result = mysqli_fetch_assoc($query);


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
                <ul>
                    <li id="preview"><div> Preview </div><div class="button is-small is-primary is-light primary-btn"><i class="fa-solid fa-check"></i></div> </li>
                    <li id="update"> <div>Edit</div>   <sapn class="button is-small is-info is-light light-btn"><i class="fa-solid fa-pen-to-square"></i></sapn></li>
                </ul>
            </div>
        <form action="#">
            <div class="bottom">
                <div class="left"> 
                    <div class="avatar" >
                        <?php
                        $avatar;
                        if( $result['avatar'] === ""){
                            $avatar = "avatar.png";
                        }else{
                            $avatar = $result['avatar'];
                        }
                        ?>
                        <label for="avatar" ><img src="./avatars/<?php echo $avatar; ?>" alt="avatar" style="cursor:pointer;" ></label>
                        <input id="avatar" type="file" style="display:none;" name="avatar">
                    </div>
                    <p class="username"> <?php echo $result['username']??''; ?> </p>
                </div>
                <div class="right box">
                    <div class="info-row">
                         <div class="info">
                            <label for="firstname"> First Name </label>
                            <input type="text" name="firstname" class="input writeable" value="<?php echo $result['firstname']??''; ?>" readonly>
                    </div>
                     <div class="info">
                            <label for="lastname"> Last Name </label>
                            <input type="text" name="lastname" class="input writeable" value="<?php echo $result['lastname']??''; ?>" readonly>
                    </div>
                    </div>
                <div class="info-row">
                    <div class="info">
                        <label for="email"> Email </label>
                        <input type="text" name="email" class="input writeable"  value="<?php echo $result['email']??''; ?>" readonly>
                    </div>
                    <div class="info">
                        <label for="phone"> Phone </label>
                        <input type="text" name="phone" class="input writeable" value="<?php echo $result['phone']??''; ?>" readonly>
                    </div>
                </div>
                    <div class="info-row">
                        <div class="info">
                            <label for="userid"> User ID </label>
                            <input type="text" name="userid" class="input" value="<?php echo $result['unique_id']??''; ?>" readonly>
                        </div>
                        <div class="info">
                            <label for="rercode"> Referral code </label>
                            <input type="text" name="refcode" class="input" value="<?php echo $result['username']??''; ?>" readonly>
                        </div>
                    </div>
                        <div class="info-row">
                            <div class="info">
                                <label for="password"> Password </label>
                                <input type="text" name="password" class="input writeable" value="<?php echo $result['password']??''; ?>" readonly>
                            </div>
                            <div class="info">
                                <label for="coupon"> Coupon </label>
                                <input type="text" name="coupon" class="input" value="<?php echo $result['coupon'] ??''; ?>" readonly>
                            </div>
                        </div>
                            <div class="info-row">
                                <div class="info">
                                    <label for="bankname"> Bank Name </label>
                                    <input type="text" name="bankname" class="input writeable" value="<?php echo $result['bank']??''; ?>" readonly="false">
                                </div>
                                <div class="info">
                                    <label for="acctnumber"> Account Number </label>
                                    <input type="text" name="acctnumber" class="input writeable" value="<?php echo $result['account']??''; ?>" readonly>
                                </div>
                            </div>
                </div>
            </div>
         </form>
            <script src="../js/profile.js"></script>
        </section>
    </main>
    <?php require("footer.php") ?>
</body>

</html>