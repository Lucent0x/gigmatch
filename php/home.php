<?php
session_start();
$userid = $_SESSION['userid'];
require ("./conn.php");

      $username = $_SESSION['username'];
      $stmt = "SELECT * FROM referrers WHERE referral_code = '{$username}'  ";
      $query = mysqli_query($conn, $stmt );
      $refferals = mysqli_num_rows($query);
    
        $stmt1 = "SELECT * FROM users WHERE unique_id = '{$userid}' ";
        $query = mysqli_query( $conn, $stmt1 );
        $result = mysqli_fetch_assoc($query);
         $avatar = $result['avatar'];

         if ($avatar == "" ){
            $src = "avatar.png";
         }else{
            $src = $avatar;
         }

         $stmt2 = "SELECT * FROM referrers WHERE referral_code = '{$username}' && status = 'active' ";
         $query2 = mysqli_query($conn, $stmt2);
         $total = mysqli_num_rows($query2);
         if ( $total > 0 ){
             $affilateBonus = "NGN ".$total * 1500;
         }else{
            $affilateBonus = "NGN 0";
         }

         $stmt3 = "SELECT * FROM indirect_refs WHERE parent = '{$username}' && status = 'active' ";
         $query3 = mysqli_query($conn, $stmt3);
         $total = mysqli_num_rows($query3);
         if ( $total > 0 ){
             $inderectRefBonus = "NGN ".$total * 500;
         }else{
            $indirectRefBonus = "NGN 0";
         }

         $stmt4 = mysqli_query( $conn,  "SELECT SUM( points ) FROM reward WHERE unique_id = '{$userid}' ");
         while ( $result = mysqli_fetch_assoc($stmt4) ){
         $points = $result ['SUM( points )'];
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
                <div class="right">
                    <div class="menu"> <div> <i class="fa-solid fa-bars"></i> </div></div>
                    <ul>
                        <li> <a href="#"> <i class="fa-solid fa-user-clock"></i> <span id="active"> Dashboard </span></a></li>
                        <li><a href="./notifications.php"> <i class="fa-regular fa-bell"></i>  Notification </a></li>
                        <li><a href="./profile.php"> <i class="fa-regular fa-user"></i> Profile </a></li>
                        <li><a href="#spin"> <i class="fa-solid fa-gift"></i> Spin a wheel </a></li>
                        <li class="parent" value="0"><a href="#"> <i class="fa-solid fa-dollar-sign"></i> Payments </a>
                            <ul >
                                <li> <a href="./upgrade.php"> Upgrade </a></li>
                            </ul>
                        </li>
                        <li><a href="./records.php"> <i class="fa-solid fa-chart-line"></i> Earning History </a></li>
                        <li><a href="./skills.php"> <i class="fa-solid fa-medal"></i> Skill </a></li>
                        <li class="parent" value="1"><a href="#"> <i class="fa-solid fa-bullhorn"></i> Adverts </a>
                            <ul >
                                <li> <a href="advertise.php"> Advertise </a></li>
                                <li> <a href="./posts.php"> Sponsored posts</a>  </li>
                            </ul>
                        </li>
                        <li><a href="./logout.php">  Logout <i class="fa-solid fa-right-from-bracket"></i> </a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="sect" id="mid">
            <div id="profile">
                <div class="tag"> Profile</div> 
                <div class="referral"> <?php echo $refferals ?> Referal </div>
                <div class="pdata">
                    <div class="email"><?php echo $username ?></div>
                    <div class="icon"><img src="./avatars/<?php echo $src; ?>" /> </div>
                </div>
            </div>
            <div id="payments">
                <div class="box  box1 mt-4">
                <div class="tag mb-3">
                    Payments
                </div>
                    <div class="card card1 mt-2">
                        <div class="balance">
                            <small class="tag"> Afillate Bonus </small>
                            
                          <h1>  <?php echo $affilateBonus ?> </h1>
                        </div> 
                        <div class="balance">
                            <small class="tag"> Task Bonus </small>
                          <h1>  <?php echo $points; ?> GPT </h1>
                        </div> 
                        <div class="balance ">
                            <small class="tag"> Indirect Ref Bal </small>
                          <h1>  <?php echo $inderectRefBonus; ?> </h1>
                        </div>
                        <!-- <div class="btn">
                            <button class="button dark"> <a href="./withdrawal.php">  Withdraw Balance </a></button>
                        </div> -->
                    </div>         
                </div>
                <div class="box box2">
                                        <div class="tag mb-3"> Earning History</div>
                    <div class="card card2">
                                    <div class="table">
                                        <table>
                                            <thead>
                                                <th> Amount </th>
                                                <th> Status </th>
                                                <th>  Type </th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                        $stmt2 = "SELECT * FROM payments WHERE unique_id = '{$userid}' ORDER BY id DESC LIMIT 2";
                                                        $query2 = mysqli_query( $conn, $stmt2 );
                                                            $payments = '<tr>
                                                                                    <td> </td>
                                                                                    <td>  </td>
                                                                                    <td>  </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> </td>
                                                                                    <td>  </td>
                                                                                    <td>  </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> </td>
                                                                                    <td>  </td>
                                                                                    <td>  </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> </td>
                                                                                    <td>  </td>
                                                                                    <td>  </td>
                                                                                </tr>';
                                                        if(mysqli_num_rows($query2) > 0 ){
                                                        while( $payment = mysqli_fetch_assoc($query2)){
                                                            $payments = '  <tr>
                                                                                    <td> NGN '. $payment["amount"] .'</td>
                                                                                    <td>  Paid </td>
                                                                                    <td>  '. $payment["type"] .' </td>
                                                                                </tr>';
                                                                             echo $payments; 
                                                        }
                                                        } else{
                                                             echo $payments;
                                                        }
                                                    ?> 
                                            </tbody>
                                        </table>
                                    </div>
                    </div>
              </div>
            </div>
            <div id="spin">
                <div class="tag"> Spin a wheel </div>
                <div class="box">
                <div class="container">
                    <div class="spinBtn"> SPIN </div>
                    <div class="wheel">
                    <div class="numberr" style="--i:1; --clr:goldenrod;"> <span>1</span> </div>
                    <div class="numberr" style="--i:2; --clr:darkred;"><span> 2</span></div>
                    <div class="numberr" style="--i:3; --clr: goldenrod;"> <span> 3</span></div>
                    <div class="numberr" style="--i:4; --clr:darkred;"> <span> 4</span></div>
                    <div class="numberr" style="--i:5; --clr: goldenrod;"> <span> 5</span></div>
                    <div class="numberr" style="--i:6; --clr:darkred;"> <span> 6 </span> </div>
                    <div class="numberr" style="--i:7; --clr: goldenrod;"> <span> 7 </span></div>
                    <div class="numberr" style="--i:8; --clr: darkred; "> <span> 8 </span></div>
                </div>
                </div>
            </div>
            <script>
                let wheel = document.querySelector(".wheel");
                let button = document.querySelector(".spinBtn");
                let randomness = Math.ceil( Math.random() * 3600 );

                button.onclick = ( ) => {
                    wheel.style.transform = `rotate( ${randomness}deg)`;
                    randomness += Math.ceil(Math.random() * 3600);
                }

                //for menu

                let parents = document.querySelectorAll(".parent");
                let ul = document.querySelectorAll(".parent ul");
                
                    parents.forEach( ( parent) => {
                        parent.onmouseenter= ( ) =>{
                            key = parent.value;
                            ul[key].style.display="flex";
                            console.log(parents)
                        }
                        parent.onmouseleave = () => {
                            key = parent.value;
                            ul[key].style.display = "none";
                            console.log(parents)
                        }
                    })
                 
             </script>
             <script src="../js/menu.js"></script>
            </div>
        </section>
    </main>
    <?php require("footer.php") ?>
</body>

</html>