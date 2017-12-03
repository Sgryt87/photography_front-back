<?php include "../includes/admin_header.php"; ?>

<?php


if (isset($_POST['add_genres'])) {

    addGenre(escape($_POST['genre_name']));

    header('Location: index.php');
}


?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post">

                    <div class="form-group">
                        <label for="genre_name">Genre Name</label>
                        <input value="" type="text" class="form-control" name="genre_name">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="add_genres" value="Add Genre">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include "../includes/admin_footer.php"; ?>

