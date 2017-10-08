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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/media-query.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/camera-icon.png">

</head>
<body>
<section class="intro">
    <nav>
        <a href="#" id="menu-icon"></a> <!-- Fix the menu. Put X when menu is open.-->
        <ul>
            <li><a href="#about">About Me</a></li>
            <li><a href="#port">Portfolio</a></li>
            <li><a href="#serv">Services</a></li>
            <li><a href="#contact">Contact Me</a></li>
        </ul>
    </nav>
    <div class="inner">
        <div class="content">
            <h1>Photography</h1>
            <p>my pictures.</p>
        </div>
    </div>
</section>
<a name="about">
    <div class="clearfix"></div>

    <div class="clearfix"></div>
    <a name="port"></a>
    <h2>My Portfolio</h2>
    <div id="genres">
        <button class="btnGenre">All</button>
        <?php
        $result = getGenres();
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<button class='btnGenre'>" . $row['name'] . "</button>";
        }
        ?>
    </div>
    <div class="clearfix"></div>
    <div id="photos"></div>
    <div class="clearfix"></div>
    <div id="pagination">
        <button id="nextBtn">Previous</button>
        <div id="pagesBtn"></div>
        <button id="prevBtn">Next</button>
    </div>
    <div class="clearfix"></div>
    <footer>
        <ul class="social">
            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
        </ul>
    </footer>
    <footer class="second">
        <p>&copy; Photography.</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/paginator.js"></script>
</body>
</html>
