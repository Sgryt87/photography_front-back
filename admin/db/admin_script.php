<?php
$photos_dir = __DIR__ . "/../../photos/";
function connection()
{
    $db['db_host'] = 'localhost';
    $db['db_user'] = 'root';
    $db['db_pass'] = '';
    $db['db_name'] = 'photography';
    foreach ($db as $key => $value) {
        define(strtoupper($key), $value);
    }
}

function getPhotos()
{

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$connection) {
        die('Database connection failed' . mysqli_error($connection));
    }
    $query = 'SELECT * FROM photos';
    $request = mysqli_query($connection, $query);
    if (!$request) {
        die('Not found' . mysqli_error());
    }
    return $request;
}

function deletePhoto($photo_name)
{
    global $photos_dir;
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$connection) {
        die('Database connection failed' . mysqli_error($connection));
    }
    $query = "DELETE FROM photos WHERE `name` = '$photo_name'";
    $request = mysqli_query($connection, $query);
    if (!$request) {
        die('Not found' . mysqli_error());
    }
    unlink($photos_dir . $photo_name);
    return $request;
}

function getGenres()
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$connection) {
        die('Database connection failed' . mysqli_error($connection));
    }
    $query = 'SELECT * FROM genres';
    $request = mysqli_query($connection, $query);
    if (!$request) {
        die('Not found' . mysqli_error());
    }
    return $request;
}

function addPhoto($name, $genreid)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$connection) {
        die('Database connection failed' . mysqli_error($connection));
    }
    $query = "INSERT INTO photos (name, genreid) VALUES ('$name', $genreid)";
    $request = mysqli_query($connection, $query);
    if (!$request) {
        die('Not found' . mysqli_error());
    }
    return $request;
}

function getGenreById($genreid)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$connection) {
        die('Database connection failed' . mysqli_error($connection));
    }
    $query = "SELECT * FROM genres WHERE id = $genreid";
    $select_genres_id = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($select_genres_id);
    return $row['name'];
}