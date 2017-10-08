<?php
$connection = mysqli_connect('localhost', 'root', '', 'photography');
if (!$connection) {
    die('Database connection fail' . mysqli_error());
}
$genre = $_GET['name'];
if (!isset($genre)) {
    die("Not found");
}

if (strcasecmp($genre, 'All') == 0) {
    $query = "SELECT photos.id, photos.name, photos.created FROM photos INNER JOIN genres ON photos.genreid = genres.id";
} else {
    $query = "SELECT photos.id, photos.name, photos.created FROM photos INNER JOIN genres ON photos.genreid = genres.id WHERE genres.name = '$genre'";
}
$request = mysqli_query($connection, $query);
if (!$request) {
    die('Not found' . mysqli_error());
}
$rows = [];
while ($row = mysqli_fetch_assoc($request)) {
    $rows[] = $row;
}
echo json_encode($rows);