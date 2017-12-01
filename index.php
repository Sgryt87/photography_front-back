<?php include 'includes/header.php'; ?>

<!-- IMG SLIDER -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="photos/DSC_8724.jpg" alt="">
            <div class="carousel-caption">
                <h1 id="welcome">Welcome to my website</h1>
            </div>
        </div>
        <!-- end active items -->
        <div class="item"><img src="photos/DSC_8919.jpg" alt=""></div>
        <div class="item"><img src="photos/DSC_8927.jpg" alt=""></div>
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

<div class="container-fluid">
    <div class="row">
        <div id="genres" class="col text-center">
            <!-- /Pagination GENRES -->
            <?php
            $result = getGenres();
            echo "<button class=\"genreBtn\">All</button>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<button class='genreBtn'>" . $row['name'] . "</button>";
            }
            ?>
        </div>
    </div>
</div>

<section>
    <div class="container-fluid">
        <!-- /Pagination GENRES -->
        <!--  IMG GALLERY      -->
        <div class="row" id="photos">
        </div>
        <!-- / IMG GALLERY -->
    </div>
</section>
<!--Pagination-->
<nav class="container-fluid">
    <div class="row">
        <div id="pagesBtn" class="col text-center"></div>
    </div>
</nav>

<!-- /Pagination -->


<?php include 'includes/footer.php'; ?>
