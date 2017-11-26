<?php include '../includes/admin_header.php'; ?>
<?php
if (isset($_POST['add_btn']) && $_FILES['image']['name'] != '') {
    $post_photo = $_FILES['image']['name'];
    $post_photo_temp = $_FILES['image']['tmp_name'];
    $post_genre_id = $_POST['genre'];
    if(!file_exists(__DIR__ . "../../../photos/$post_photo")) {
        move_uploaded_file($post_photo_temp, __DIR__ . "../../../photos/$post_photo");
        addPhoto($post_photo, $post_genre_id);
        header("Location: index.php");
    }
    else {
        echo "<script type='text/javascript'>alert('This file already exists');</script>";
    }
}

?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                        Add Photos
                    </h2>

                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="image">Add Photo</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="form-group">
                        <labxel for="genre">Genre</labxel>
                        <select name="genre" id="">
                            <?php
                            $result = getGenres();
                            while ($row = mysqli_fetch_assoc($result)) {
                                $genres_id = $row['id'];
                                $genres_name = $row['name'];

                                echo "<option value='$genres_id'>{$genres_name}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="add_btn" value="Upload">
                    </div>
                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php include '../includes/admin_footer.php'; ?>