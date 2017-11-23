<?php include '../includes/admin_header.php';


?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                        Photos <a href="add.php" class="btn btn-primary">Upload</a>
                    </h2>
                </div>
            </div>
            <!-- /.row -->


            <div class="row">
                <div class="col-xs-4">
                    <form action="index.php" method="post">
                        <select name="select_genre" id="" class="form-control" onchange="this.form.submit()">
                            <option value="">Select Genre</option>
                            <option value="All">All</option>
                            <?php
                            $result = getGenres();
                            while ($row = mysqli_fetch_assoc($result)) {
                                $genres_id = $row['id'];
                                $genres_name = $row['name'];
                                echo "<option value='$genres_id'>$genres_name</option>";
                            }
                            ?>
                        </select>
                    </form>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Genre</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    if (isset($_POST['select_genre'])) {
                        $select_genre = $_POST['select_genre'];
                        switch ($select_genre) {
                            case '1':
                                $query = "SELECT photos.id, photos.name, photos.created FROM photos INNER JOIN genres ON photos.genreid = genres.id WHERE genres.id = '$select_genre' ORDER BY photos.created DESC";
                                $select_street = mysqli_query($connection, $query);
                                if (!$select_street) {
                                    die('Query failed' . mysqli_error($connection));
                                }
                                while ($row = mysqli_fetch_assoc($select_street)) {
                                    $photo_id = $row['id'];
                                    $photo_name = $row['name'];
//                                    $photo_genre = $row['genreid'];
                                    $photo_created = $row['created'];

                                    echo '<tr>';
                                    echo "<td>$photo_id</td>";
                                    echo "<td><img width='100' src='../../photos/$photo_name' title='$photo_name'></td>";
                                    echo "<td>" . getGenreById($select_genre) . "</td>";
                                    echo "<td>$photo_created</td>";
                                    echo "<td><a href='edit.php?p_id={$photo_id}' class='btn btn-primary'>Edit</a></td>";
                                    echo "<td><a href='delete.php?p_id={$photo_id}' class='btn btn-primary'>Delete</a></td>";
                                    echo '</tr>';
                                }

                                break;
                            case '2':
                                $query = "SELECT photos.id, photos.name, photos.created FROM photos INNER JOIN genres ON photos.genreid = genres.id WHERE genres.id = '$select_genre' ORDER BY photos.created DESC";
                                $select_street = mysqli_query($connection, $query);
                                if (!$select_street) {
                                    die('Query failed' . mysqli_error($connection));
                                }
                                while ($row = mysqli_fetch_assoc($select_street)) {
                                    $photo_id = $row['id'];
                                    $photo_name = $row['name'];
//                                    $photo_genre = $row['genreid'];
                                    $photo_created = $row['created'];

                                    echo '<tr>';
                                    echo "<td>$photo_id</td>";
                                    echo "<td><img width='100' src='../../photos/$photo_name' title='$photo_name'></td>";
                                    echo "<td>" . getGenreById($select_genre) . "</td>";
                                    echo "<td>$photo_created</td>";
                                    echo "<td><a href='edit.php?p_id={$photo_id}' class='btn btn-primary'>Edit</a></td>";
                                    echo "<td><a href='delete.php?p_id={$photo_id}' class='btn btn-primary'>Delete</a></td>";
                                    echo '</tr>';
                                }
                                break;

                            case '3':
                                $query = "SELECT photos.id, photos.name, photos.created FROM photos INNER JOIN genres ON photos.genreid = genres.id WHERE genres.id = '$select_genre' ORDER BY photos.created DESC";
                                $select_street = mysqli_query($connection, $query);
                                if (!$select_street) {
                                    die('Query failed' . mysqli_error($connection));
                                }
                                while ($row = mysqli_fetch_assoc($select_street)) {
                                    $photo_id = $row['id'];
                                    $photo_name = $row['name'];
//                                    $photo_genre = $row['genreid'];
                                    $photo_created = $row['created'];

                                    echo '<tr>';
                                    echo "<td>$photo_id</td>";
                                    echo "<td><img width='100' src='../../photos/$photo_name' title='$photo_name'></td>";
                                    echo "<td>" . getGenreById($select_genre) . "</td>";
                                    echo "<td>$photo_created</td>";
                                    echo "<td><a href='edit.php?p_id={$photo_id}' class='btn btn-primary'>Edit</a></td>";
                                    echo "<td><a href='delete.php?p_id={$photo_id}' class='btn btn-primary'>Delete</a></td>";
                                    echo '</tr>';
                                }
                                break;

                            case '4':
                                $query = "SELECT photos.id, photos.name, photos.created FROM photos INNER JOIN genres ON photos.genreid = genres.id WHERE genres.id = '$select_genre' ORDER BY photos.created DESC";
                                $select_street = mysqli_query($connection, $query);
                                if (!$select_street) {
                                    die('Query failed' . mysqli_error($connection));
                                }
                                while ($row = mysqli_fetch_assoc($select_street)) {
                                    $photo_id = $row['id'];
                                    $photo_name = $row['name'];
//                                    $photo_genre = $row['genreid'];
                                    $photo_created = $row['created'];

                                    echo '<tr>';
                                    echo "<td>$photo_id</td>";
                                    echo "<td><img width='100' src='../../photos/$photo_name' title='$photo_name'></td>";
                                    echo "<td>" . getGenreById($select_genre) . "</td>";
                                    echo "<td>$photo_created</td>";
                                    echo "<td><a href='edit.php?p_id={$photo_id}' class='btn btn-primary'>Edit</a></td>";
                                    echo "<td><a href='delete.php?p_id={$photo_id}' class='btn btn-primary'>Delete</a></td>";
                                    echo '</tr>';
                                }
                                break;

                            default:

                                $result = getPhotos();
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $photo_id = $row['id'];
                                    $photo_name = $row['name'];
                                    $photo_genre = $row['genreid'];
                                    $photo_created = $row['created'];

                                    echo '<tr>';
                                    echo "<td>$photo_id</td>";
                                    echo "<td><img width='100' src='../../photos/$photo_name' title='$photo_name'></td>";
                                    echo "<td>" . getGenreById($photo_genre) . "</td>";
                                    echo "<td>$photo_created</td>";
                                    echo "<td><a href='edit.php?p_id={$photo_id}' class='btn btn-primary'>Edit</a></td>";
                                    echo "<td><a href='delete.php?p_id={$photo_id}' class='btn btn-primary'>Delete</a></td>";
                                    echo '</tr>';
                                }
                        }
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include '../includes/admin_footer.php'; ?>