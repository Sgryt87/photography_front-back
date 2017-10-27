<?php include 'includes/admin_header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    Genres
                </h2>

                <?php
                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = '';
                }

                switch ($source) {
                    case 'add_genre';
                        include 'includes/add_genre.php';
                        break;

                    case 'edit_genre';
                        include 'includes/edit_genre.php';
                        break;

                    default:
                        include 'includes/view_all_genres.php';
                        break;
                }

                ?>
            </div>
            <div class="row">

<!--                add -->

<!--                edit-->
                <div class="col-xs-3">

                </div>


                <div class="col-xs-6">




                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include 'includes/admin_footer.php'; ?>


