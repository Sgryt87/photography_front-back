<?php
$connection = mysqli_connect('localhost', 'root', '', 'photography');
if (!$connection) {
    die('Database connection fail' . mysqli_error($connection));
}
$genre = $_GET['name'] ?? 'All';
//if (!isset($genre)) {
//    die("Genre not found");
//}
$pageNum = $_GET['page'] ?? 1;
//if (!isset($pageNum)) {
//    die("Page not found");
//}
$totalNumPages = 0;
$limitPhotos = 3;
$offset = ($pageNum - 1) * $limitPhotos;
if (strcasecmp($genre, 'All') == 0) {
    $queryCount = "SELECT COUNT(*) FROM photos INNER JOIN genres ON photos.genreid = genres.id";
    $result = $connection->query($queryCount);
    $row = $result->fetch_row();
    $totalNumPages = ceil($row[0] / $limitPhotos);
    $query = "SELECT photos.id, photos.name, photos.created FROM photos INNER JOIN genres ON photos.genreid = genres.id ORDER BY photos.created LIMIT $limitPhotos OFFSET $offset";
    $stmt = $connection->prepare($query);
} else {
    $queryCount = "SELECT COUNT(*) FROM photos INNER JOIN genres ON photos.genreid = genres.id WHERE genres.name = '$genre'";
    $result = $connection->query($queryCount);
    $row = $result->fetch_row();
    $totalNumPages = ceil($row[0] / $limitPhotos);
    $query = "SELECT photos.id, photos.name, photos.created FROM photos INNER JOIN genres ON photos.genreid = genres.id WHERE genres.name = ? ORDER BY photos.created LIMIT $limitPhotos OFFSET $offset";
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



