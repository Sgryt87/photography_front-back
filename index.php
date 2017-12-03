<?php include 'includes/header.php'; ?>

<div id="mainCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#mainCarousel" data-slide-to="1"></li>
        <li data-target="#mainCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active" style="background-image: url('photos/DSC_8724.jpg')">
            <div class="carousel-caption d-none d-md-block">
                <h1 id="welcome">Welcome to my website</h1>
            </div>
        </div>
        <div class="item" style="background-image: url('photos/DSC_8919.jpg')"></div>
        <div class="item" style="background-image: url('photos/DSC_8927.jpg')"></div>
    </div>
    <a href="#mainCarousel" class="left carousel-control" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a href="#mainCarousel" class="right carousel-control" role="button" data-slide="next">
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
