<?php
session_start();
require("./conn.php");
$query = mysqli_query($conn, "SELECT * FROM contents");
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
    <link rel="stylesheet" href="../css/posts.css">
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
               <span>News And Sponsored Posts </span> 
            </div>
            <div class="container">
                <div class="box">
                     <?php
                         while ($post = mysqli_fetch_assoc($query) ) {

                     ?>
                    <div class="box crd " id="<?php echo $post["id"] ?>">
                        <div class="taged">
                            <span><b><?php echo $post["timestamp"] ?></b></span>
                        </div>
                        <div class="img">
                            <img src="./thumbnails/<?php echo $post['thumbnail'] ?>" alt="">
                        </div>
                        <div class="taged"> <span class="tag"> Sponsored post. </span></div>
                        <div class="title">
                            <?php echo $post["header"] ?>
                        </div>
                          <?php
                                 $posts = $post['id'];

                                $query2 = mysqli_query($conn, "SELECT * FROM posts WHERE postid = '{$posts}' ");
                                 $likes = mysqli_num_rows($query2);
                                 if ( $likes < 1 ){
                                    $likes = "";
                                 } else if ( $likes === 1 ){
                                    $likes = "1 like";
                                 }else {
                                    $likes = $likes." likes";
                                 }

                                 $query3 = mysqli_query( $conn, "SELECT * FROM comments WHERE post_id = '{$posts}' ");
                                 $comments = mysqli_num_rows($query3);
                                 if ( $comments < 1 ){
                                    $comments = "";
                                 } else if ( $comments == 1 ){
                                    $comments = "1 comment";
                                 }else{
                                    $comments = $comments." comments";
                                 }
                                ?> 
                        <div class="records">
                            <div class="record">
                                <div class="">  <span class="post<?php echo $post['id']; ?>"><?php echo $likes; ?></span></div>
                                <div class="comment<?php echo $post['id']; ?> commentsCount"> <?php echo $comments;?></div>
                            </div>
                        <div class="comments cmt card cmt<?php echo $post['id']; ?>">
                            <?php
                             $query4 = mysqli_query($conn, "SELECT * FROM comments WHERE post_id = '{$posts}' ");
                             while ( $comments = mysqli_fetch_assoc($query4)){
                              ?>
                            <div class="card cmmt"> 
                                    <b><?php echo "user_".$comments['unique_id']??''; ?> :  </b>
                                    <i> <?php echo $comments['comment']??''; ?></i>  
                           </div>
                            <?php
                                
                             }
                            ?>
                        </div>
                        </div>

                        <div class="interact">
                            <div class="like" onclick="sendLike(<?php echo $post['id']; ?>)"><i class="fa-solid fa-thumbs-up"></i></div>
                            <?php
                             $id = "id".$post['id']; 
                             ?>
                            <div class="comment" onclick="hid('<?php echo $id; ?>')"> <i class="fa-solid fa-message"></i> </div>
                       
                            <div class="links">
                               <a href="https://www.facebook.com/share.php?u=gigmatch.com/posts.php?id=<?php echo $id; ?>" target="_blank" rel="noopener noreferrer"> 
                               <i class="fa-brands fa-square-facebook"></i>
                            </a>
                               <a href="https://www.instagram.com/?url=https://gigmatch.com/posts.php?id=<?php echo $id; ?>" target="_blank" rel="noopener noreferrer">
                              <i class="fa-brands fa-square-instagram"></i>
                            </a>
                               <a href="https://https://telegram.me/share/url?url=gigmatch.com/posts.php?id=<?php echo $id; ?>&text=Visit gigmatch" target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-telegram"></i>  
                            </a>
                               <a  href="https://api.whatsapp.com/send?text=gigmatch.com/posts.php?id=<?php echo $id; ?>" data-action="share/whatsapp/share" target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-square-whatsapp"></i>
                            </a>
                            </div>
                        </div>
                        <div class="commenting" id="<?php echo $id ?>">
                            <form action="" class="form<?php echo $post['id'];?>" autocomplete="off">
                                <input type="text"name="comment" class="input input<?php echo $post['id']; ?>" required placeholder="write your comments">
                                <input type="hidden" name="postid" value="<?php echo $post['id']; ?>">
                                <button class="button is-info is-light">
                                <i class="fa-solid fa-paper-plane"></i>
                               </button>
                            </form>
                        </div>
                        </div>
                <?php 
                    }
                ?>
            </div>
            </div>
        </section>
    </main>
    <script src="../js/posts.js"></script>
    <?php require("footer.php") ?>
</body>

</html>