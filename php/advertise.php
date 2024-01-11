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
    <link rel="stylesheet" href="../css/ads.css">
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
               <span>Upload your advert </span> 
            </div>
            <div class="box main-box" id="box">
                <div class="box" id="parent">
                    <form action="">
                    <div class="inp">
                        <input type="text" name="header" class="input" id="title" placeholder= "Add an header" required />
                    </div>
                    <div class="inp">
                        <input type="url" name="link" class="input" placeholder= " link or endpoint" required>
                    </div>
                    <div class="inp">
                        <label for="thumbnail" id="label" class="button is-fullwidth"> Select your Ad Thumbnail or Flyer. </label>
                        <input id="thumbnail" name="thumbnail" id="file" type="file" class="input" required>
                    </div>
                    <div class="inp">
                        <button class="button light is-fullwidth"> Upload </button>
                    </div>
                    </form>
                  </div>
                    <div class="card crd p-4">
                    <div class="taged">
                        <span><b> Year-Month-Day</b></span>
                    </div>
                    <div class="img">
                        <img src="../utils/notifier.jpeg" alt="">
                    </div>
                    <div class="taged"> <span class="tag"> Sponsored post. </span></div>
                    <div class="title" id="p-title">
                       This is what your advert will look like.
                    </div>
                    <div class="links">
                        <i class="fa-brands fa-square-facebook"></i>
                        <i class="fa-brands fa-square-whatsapp"></i>
                        <i class="fa-brands fa-square-instagram"></i>
                        <i class="fa-brands fa-telegram"></i>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require("footer.php") ?>
</body>
<script src="../js/ads.js"></script>
</html>