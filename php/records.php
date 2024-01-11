<?php
    session_start();
    require ("./conn.php");
    $userid = $_SESSION['userid'];
    $stmt = "SELECT * FROM payments WHERE unique_id = '{$userid}' ORDER BY id DESC ";
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
</head>
        <style>
            @media (max-width: 700px) {
                .box2 {
                width: 100%;
                padding: 5px;
                }
                
            }
        </style>
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
               <span>Earning History </span> 
            </div>
            <div class="box box2 " style="max-height: max-content ">
                    <div class="card card2" style="min-width: 100%">
                                    <div class="table" style="min-width: 100%">
                                        <table>
                                            <thead>
                                                <th> Amount </th>
                                                <th> Status </th>
                                                <th>  Type </th>
                                            </thead>
                                            <tbody>
                                                <?php 
        if ( mysqli_num_rows($query) > 0 ){
       while( $records = mysqli_fetch_assoc($query) ){

        $data = "
                        <tr>
                                                    <td> NGN ". $records['amount'] ." </td>
                                                    <td>  Paid </td>
                                                    <td>  ". $records['type'] ." </td>
                                                </tr>
                           ";                     

                           echo $data;
    }
}else{
        $data = "                        <tr>
                                                    <td> </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td> </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td> </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                                ";
                           echo $data;                     
    }
    ?>
                                            </tbody>
                                        </table>
                                    </div>
                    </div>
              </div>
        </section>
    </main>
    <?php require("footer.php") ?>
</body>

</html>