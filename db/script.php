<?php
function getGenres()
{
    global $connection;
    $query = 'SELECT * FROM genres';
    $request = mysqli_query($connection, $query);
    if (!$request) {
        die('Not found' . mysqli_error());
    }
    return $request;
}

