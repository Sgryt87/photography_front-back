<?php
include "../../db/global_config.php";
include "../db/admin_script.php";

if (isset($_GET['g_id'])) {
    $the_genres_id = escape($_GET['g_id']);

    if (ifPhotoExists($the_genres_id)) {
        echo "<script type='text/javascript'>alert('Some photos are under this genre already, cannot delete')</script>";
    } else {
        deleteGenre($the_genres_id);
    }
    header("Location: index.php");
}
?>