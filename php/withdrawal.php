<?php
session_start();
require ("./conn.php");
$userid = $_SESSION['userid'];
$stmt = "SELECT * FROM notification WHERE unique_id = '{$userid}' ";
$query = mysqli_query( $conn, $stmt );

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
    <link rel="stylesheet" href="../css/withdrawal.css">
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
                <div class="right">
                </div>
            </div>
        </section>
        <section class="sect" id="mid">
            <div class="header">
               <span>Withdrawal</span> 
            </div>
            <div class="form">
                <form action="">
                    <div class="msg"></div>
                    <div class="payload">
                        <input type="text" name="userid" class="input" placeholder=" User id " required>
                    </div>
                    <div class="payload is-fullwidth select is-warning">
                        <select  name="typeof" id="" required>
                            <option value=""> Select Payment Type </option>
                            <option value="Afillate Bonus "> Afillate Bonus </option>
                            <option value="Gig Points"> Gig Points </option>
                            <option value="Indirect Referral"> Indirect Referral</option>
                        </select>
                    </div>
                    <div class="payload">
                        <input type="text" name="amount"  class="input" placeholder=" Payment Amount " required >
                    </div>
                    <div class="payload">
                        <input type="submit" class=" button light is-fullwidth" value="SUBMIT">
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script src="../js/withdrawal.js"></script>
    <?php require("footer.php") ?>
</body>

</html>