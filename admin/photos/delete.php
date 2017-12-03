<?php
include "../../db/global_config.php";
include "../db/admin_script.php";

if (isset($_GET['p_id'])) {
    $photo_id = escape($_GET['p_id']);
    deletePhoto($photo_id);
    header("Location: index.php");
}
?>
