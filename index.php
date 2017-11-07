<?php include 'includes/header.php'; ?>

<!--NAVBAR  -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/sg.png" width="100px" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAVBAR  -->

<!-- IMG SLIDER -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="img/mountains.png" alt="">
            <div class="carousel-caption">
                <h1>Get To Know Bootstrap</h1>
                <br>
                <button type="button" class="btn btn-default">Get Started</button>
            </div>
        </div>
        <!-- end active items -->
        <div class="item"><img src="img/snow.png" alt=""></div>
        <div class="item"><img src="img/red.png" alt=""></div>
    </div>
    <!-- Start Slider Controls -->
    <a href="#myCarousel" class="left carousel-control" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a href="#myCarousel" class="right carousel-control" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br>
<br>

<div class="container">
    <div class="row">
        <div id="genres" class="col-lg-4 col-lg-offset-4">
            <!-- /Pagination GENRES -->
            <button class="genreBtn btnHover">All</button>
            <?php
            $result = getGenres();
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<button class='genreBtn'>" . $row['name'] . "</button>";
            }
            ?>
        </div>
    </div>
</div>

<br>
<br>
<section>
    <div class="container">

        <!-- /Pagination GENRES -->

        <!--  IMG GALLERY      -->
        <div class="row" id="photos">

        </div>
        <!-- / IMG GALLERY -->
        <br>
        <br>


    </div>
</section>
<!--Pagination-->
<nav class="container-fluid">
    <div class="row">
        <div id="pagesBtn" class="col-lg-4 col-lg-offset-4"></div>
    </div>
</nav>

<!-- /Pagination -->


<?php include 'includes/footer.php'; ?>
