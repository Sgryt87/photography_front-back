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
        <button class="btn">All</button>
        <?php
        $result = getGenres();
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<button class='btn'>" . $row['name'] . "</button>";

        }
        ?>
    </div>
    <div class="clearfix"></div>
    <div id="photos">
        <?php
        $dir_path = 'photos/';
        $extensions_array = array('jpg','png', 'jpeg');
        if(is_dir($dir_path)) {
            $files = scandir($dir_path);
            for($i = 0; $i < count($files); $i++) {
                if($files[$i] !='.' && $files[$i] !='..') {
//                    echo "File name -> $files[$i]<br>";
                    $file = pathinfo($files[$i]);
                    $extension = $file['extension'];
//                    echo "File extension -> $extension<br>";
                    if(in_array($extension, $extensions_array)){
                        echo "<img src='$dir_path$files[$i]' class='img'>";
                    }

                }
            }
        }
        ?>
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
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
