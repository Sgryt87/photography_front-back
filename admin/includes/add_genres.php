<?php

if (isset($_POST['create_genre'])) {

    $post_genre = $_POST['title'];


    $query = "INSERT INTO genres(
              `name`) 
              VALUES (
            '{$post_genre}')";
    $create_genre_query = mysqli_query($connection, $query);
    if (!$create_genre_query) {
        die('Query Failed' . mysqli_error($connection));
    }

}
?>

<!--<div class="col-xs-3">-->
    <form action="" method="post">
        <div class="form-group">
            <label for="name_add">Add Genre</label>
            <input type="text" class="form-control" name="name_add">
            <?php
            if (isset($_POST['name_add'])) {
                $post_name_add = $_POST['name_add'];

                $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                if (!$connection) {
                    die('Database connection failed' . mysqli_error($connection));
                }
                $query = "SELECT * FROM genres";
                $select_genres = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($select_genres);

                echo

            }
            ?>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_genre" value="Add Genre">
        </div>

    </form>
<!--</div>-->
