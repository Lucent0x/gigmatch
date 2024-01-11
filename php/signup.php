<?php
require("conn.php");
    $ref = $_GET['ref']??"";
    global $conn;
    $referrer = mysqli_real_escape_string($conn, $ref)

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
    <link rel="stylesheet" href="../css/form.css">
</head>

<body>
    <main>
        <section class="sect" id="top">
            <div class="nav">
                <div class="left">
                    <div class="logo">
                        <img src="../utils/IMG_0212.JPG" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="sect" id="mid">
            <div class="container">
            <div class="msg"></div>
                <form action=""  autocomplete="off">
                    <div class="form-data">
                        <input type="text" name="firstname" class="input" id="" placeholder="First name" required>
                    </div>
                    <div class="form-data">
                        <input type="text" name="lastname" class="input" id="" placeholder="Last name" required>
                    </div>
                    <div class="form-data">
                        <input type="text" name="lastnameU" class="input" id="" placeholder="User name" required>
                    </div>
                    <div class="form-data">
                        <input type="email"  type="email" name="email" class="input" id="" placeholder="email" required>
                    </div>
                    <div class="form-data">
                        <input type="tel" name="phone" class="input" id="" placeholder="phone number" required>
                    </div>
                    <div class="form-data">
                        <input type="password" name="password1" class="input" id="" placeholder="enter password" required> 
                        <button class="eye"><i class="fa-solid fa-eye-slash"></i></button>
                    </div>
                    <div class="form-data">
                        <input type="password" name="password2" class="input" id="" placeholder="re-enter password" required> 
                        <button class="eye"><i class="fa-solid fa-eye"></i></button>
                    </div>
                    <div class="form-data">
                        <input type="text" name="coupon" class="input" id="" placeholder="coupon code" required>
                    </div>
                    <div class="form-data">
                        <input type="text" name="referrer" class="input" id="" value="<?php echo $referrer ?>" readonly>
                    </div>
                    <div class="form-data">
                        <input type="submit" name="submit" class="button dark is-fullwidth" id="" value="SIGN UP">
                    </div>
                    <div class="container">
                    <i class="fa-solid fa-circle-info"></i>  already have an account sign in <a href="./signin.php">here.</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
     <?php require("footer.php"); ?>
    <script src="../js/signup.js"></script>
</body>
</html>