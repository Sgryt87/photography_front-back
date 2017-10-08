<?php
$connection = mysqli_connect('localhost', 'root', '', 'photography');
if (!$connection) {
    die('Database connection fail' . mysqli_error($connection));
}
$genre = $_GET['name'];
if (!isset($genre)) {
    die("Genre not found");
}
$pageNum = $_GET['page'];
if (!isset($pageNum)) {
    die("Page not found");
}
$totalNumPages = 0;
if (strcasecmp($genre, 'All') == 0) {
    $queryCount = "SELECT COUNT(*) FROM photos INNER JOIN genres ON photos.genreid = genres.id";
    $result = $connection->query($queryCount);
    $row = $result->fetch_row();
    $totalNumPages = floor($row[0] / 9) + 1;
    $limitPhotos = 9;
    $offset = ($pageNum - 1) * 9;
    $query = "SELECT photos.id, photos.name, photos.created FROM photos INNER JOIN genres ON photos.genreid = genres.id ORDER BY photos.created LIMIT $limitPhotos OFFSET $offset";
    $stmt = $connection->prepare($query);
} else {
    $queryCount = "SELECT COUNT(*) FROM photos INNER JOIN genres ON photos.genreid = genres.id WHERE genres.name = '$genre'";
    $result = $connection->query($queryCount);
    $row = $result->fetch_row();
    $totalNumPages = floor($row[0] / 9) + 1;
    $limitPhotos = 9;
    $offset = ($pageNum - 1) * 9;
    $query = "SELECT photos.id, photos.name, photos.created FROM photos INNER JOIN genres ON photos.genreid = genres.id WHERE genres.name = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('s', $genre);
}
$stmt->execute();
$result = $stmt->get_result();
$rows = [];
$stmt->close();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
$response['photos'] = $rows;
$response['totalNumPages'] = $totalNumPages;
echo json_encode($response);



