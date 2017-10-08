<?php
function getGenres()
{

    $connection = mysqli_connect('localhost', 'root', '', 'photography');
    if (!$connection) {
        die('Database connection fail' . mysqli_error());
    }
    $query = 'SELECT * FROM genres';
    $request = mysqli_query($connection, $query);
    if (!$request) {
        die('Not found' . mysqli_error());
    }
    return $request;
}