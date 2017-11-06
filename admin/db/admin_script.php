<?php
$photos_dir = __DIR__ . "/../../photos/";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
    die('Database connection failed' . mysqli_error($connection));
}


function addPhoto($name, $genreid)
{
    global $connection;
    $query = "INSERT INTO photos (name, genreid) VALUES ('$name', $genreid)";
    $request = mysqli_query($connection, $query);
    if (!$request) {
        die('Not found' . mysqli_error());
    }
    return $request;
}

function getPhotos()
{
    global $connection;
    $query = 'SELECT * FROM photos';
    $request = mysqli_query($connection, $query);
    if (!$request) {
        die('Not found' . mysqli_error());
    }
    return $request;
}

function getPhotosCount()
{
    global $connection;
    $query = 'SELECT * FROM photos';
    $request = mysqli_query($connection, $query);
    if (!$request) {
        die('Not found' . mysqli_error());
    }
    $count = mysqli_num_rows($request);
    return $count;
}

function getPhotoById($photoid)
{
    global $connection;
    $query = "SELECT * FROM photos WHERE id = $photoid";
    $select_photo_id = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($select_photo_id);
    return $row;
}

function deletePhoto($photoid)
{
    global $photos_dir;
    global $connection;
    $query_get = "SELECT `name` FROM photos WHERE id = $photoid";
    $request_get = mysqli_query($connection, $query_get);
    if (!$request_get) {
        die('Not found' . mysqli_error());
    }
    $query = "DELETE FROM photos WHERE id = $photoid";
    $request = mysqli_query($connection, $query);
    if (!$request) {
        die('Not found' . mysqli_error());
    }
    $row = mysqli_fetch_assoc($request_get);
    $photo_name = $row['name'];
    unlink($photos_dir . $photo_name);
}

function ifPhotoExists($genreid)
{
    global $connection;
    $query = "SELECT * FROM photos WHERE genreid = $genreid";
    $request = mysqli_query($connection, $query);
    if (!$request) {
        die('Not found' . mysqli_error());
    }
    $row = mysqli_fetch_assoc($request);
    if (empty($row)) {
        return false;
    } else {
        return true;
    }
}

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

function getGenresCount()
{
    global $connection;
    $query = 'SELECT * FROM genres';
    $request = mysqli_query($connection, $query);
    if (!$request) {
        die('Not found' . mysqli_error());
    }
    $count = mysqli_num_rows($request);
    return $count;
}


function getGenreById($genreid)
{
    global $connection;
    $query = "SELECT * FROM genres WHERE id = $genreid";
    $select_genres_id = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($select_genres_id);
    return $row['name'];
}

function updateGenre($genreid, $name)
{
    global $connection;
    $query = "UPDATE genres SET `name` ='{$name}' WHERE id = {$genreid}";
    $update_genre_query = mysqli_query($connection, $query);
    return $update_genre_query;
}

function addGenre($name)
{
    global $connection;
    $query = "INSERT INTO genres (`name`) VALUES ('$name')";
    $add_genre_query = mysqli_query($connection, $query);
    return $add_genre_query;
}

function deleteGenre($genreid)
{
    global $connection;
    $query = "DELETE FROM genres WHERE id = $genreid";
    $delete_genre_query = mysqli_query($connection, $query);
    return $delete_genre_query;
}

function getAdmin()
{
    global $connection;
    $query = "SELECT * FROM admin";
    $admin_email_query = mysqli_query($connection, $query);
    return $admin_email_query;
}

function saltGenerator($num)
{
    $result = "";
    $chars = "79h799g7g7g8we6cwege8c8813gf3c32787v484bv748b2vbshvdkshkvs";
    $charArray = str_split($chars);
    for($i = 0; $i < $num; $i++) {
        $randPass = array_rand($charArray);
        $result .= "" . $charArray[$randPass];
    }
    return $result;
}

function updateAdmin($id, $login, $email, $password)
{
    global $connection;
    $query = "UPDATE admin SET login ='{$login}', email = '{$email}', `hash` = '{$password}' WHERE id = $id";
    $update_admin_query = mysqli_query($connection, $query);
    return $update_admin_query;
}