<?php include 'includes/admin_header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    Genres
                </h2>
            </div>
            <div class="row">
                <div class="col-xs-3">
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
                                $query = "SELECT * FROM genres WHERE id = id";
                                $select_genres_id = mysqli_query($connection, $query);
                                $row = mysqli_fetch_assoc($select_genres_id);

                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>

                    </form>
                </div>
                <div class="col-xs-3">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name_edit">Edit Genre</label>
                            <input type="text" class="form-control" name="name_edit">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>

                    </form>
                </div>


                <div class="col-xs-6">
                    <table class="table table-bordered table-hover">


                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Genre</th>
                        </tr>
                        </thead>
                        <tbody name="genre">

                        <?php

                        $result = getGenres();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $genres_id = $row['id'];
                            $genres_name = $row['name'];

                            echo "<tr>";
                            echo "<td>{$genres_id}</td>";
                            echo "<td>{$genres_name}</td>";
                            echo "<td><a href='genres.php?edit={$genres_id}'>Edit</a></td>";
                            echo "<td><a href='genres.php?delete={$genres_name}'>Delete</a></td>";
                            echo "</tr>";
                        }

                        ?>


                        </tbody>
                    </table>

                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include 'includes/admin_footer.php'; ?>


