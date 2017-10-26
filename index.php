<?php
require_once 'db/script.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Photography</title>
    <link rel="stylesheet" type="text/css" href="css/styleNew.css">
    <link rel="stylesheet" type="text/css" href="css/fluid-gallery.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/camera-icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">SG PIXELS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#portfolio">My Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Navigation -->

    <!-- Header -->
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6">
            <div class="">
                <h1>Photography</h1>
                <p>my pictures.</p>
            </div>
        </div>
    </div>
    <!-- /Header -->

    <!-- Pagination GENRES -->
    <h2>My Portfolio</h2>
    <div class="row">
        <div id="genres">
            <button class="btnGenre btnHover">All</button>
            <?php
            $result = getGenres();
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<button class='btnGenre'>" . $row['name'] . "</button>";
            }
            ?>
        </div>
    </div>
    <!-- Pagination GENRES -->

    <!-- IMG gallery -->
<!--    <div class="row">-->
<!--        <div class="container">-->
<!--            <div class="row" id="photos"></div>-->
<!--        </div>-->
<!--    </div>-->


    <div class="container gallery-container">

        <h1>My pictures</h1>

        <p class="page-description text-center">Some text...</p>

        <div class="tz-gallery">

            <div class="row">
<!--                php here  -->
                                <div class="container">
                                    <div class="row" id="photos"></div>
                                </div>
<!--                /php here  -->

                <!-- <div class="col-sm-12 col-md-4">
                    <a class="lightbox" href="../images/bridge.jpg">
                        <img src="../images/bridge.jpg" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="../images/park.jpg">
                        <img src="../images/park.jpg" alt="Park">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="../images/tunnel.jpg">
                        <img src="../images/tunnel.jpg" alt="Tunnel">
                    </a>
                </div>
                <div class="col-sm-12 col-md-8">
                    <a class="lightbox" href="../images/traffic.jpg">
                        <img src="../images/traffic.jpg" alt="Traffic">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="../images/coast.jpg">
                        <img src="../images/coast.jpg" alt="Coast">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="../images/rails.jpg">
                        <img src="../images/rails.jpg" alt="Rails">
                    </a>
                </div> -->

            </div>

        </div>

    </div>

    <!-- /IMG gallery -->

    <!-- Pagination -->
    <div class="row">
        <div id="pagination">
            <div id="pagesBtn"></div>
        </div>
    </div>
    <!-- /Pagination -->

    <!-- Footer -->

    <!-- The content of your page would go here. -->

    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>SG PIXELS<span>logo here</span></h3>

            <p class="footer-links">
                <a href="#">Home</a>
                ·
                <a href="#">Blog</a>
                ·
                <a href="#">Pricing</a>
                ·
                <a href="#">About</a>
                ·
                <a href="#">Faq</a>
                ·
                <a href="#">Contact</a>
            </p>

            <p class="footer-company-name">SG PIXELS &copy; 2017</p>

            <div class="footer-icons">

                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>

            </div>

        </div>

        <div class="footer-right">

            <p>Contact Us</p>

            <form action="#" method="post">

                <input type="text" name="email" placeholder="Email"/>
                <textarea name="message" placeholder="Message"></textarea>
                <button>Send</button>

            </form>

        </div>

    </footer>
    <!-- <div class="row">
      <footer>
        <ul class="social">
          <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
          <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </footer>
    </div>
    <div class="row">
      <footer class="second">
        <p>&copy; Photography.</p>
      </footer>
    </div> -->
    <!-- /Footer -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<script type="text/javascript" src="js/paginator.js"></script>
</body>

</html>
