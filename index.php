<?php include 'includes/header.php'; ?>

    <!-- Header -->
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6">
            <div class="">
                <h1>Photography</h1>
                <p>my pictures.</p>
            </div>
        </div>
    </div>
    <!-- /Header -->

    <!-- Pagination GENRES -->
    <h2>My Portfolio</h2>
    <div class="row">
        <div id="genres">
            <button class="btnGenre btnHover">All</button>
            <?php
            $result = getGenres();
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<button class='btnGenre'>" . $row['name'] . "</button>";
            }
            ?>
        </div>
    </div>
    <!-- Pagination GENRES -->

    <!-- IMG gallery -->
    <!--    <div class="row">-->
    <!--        <div class="container">-->
    <!--            <div class="row" id="photos"></div>-->
    <!--        </div>-->
    <!--    </div>-->


    <div class="container gallery-container">

        <h1>My pictures</h1>

        <p class="page-description text-center">Some text...</p>

        <div class="tz-gallery">

            <div class="row">
                <!--                php here  -->
                <div class="container">
                    <div class="row" id="photos"></div>
                </div>
                <!--                /php here  -->

                <!-- <div class="col-sm-12 col-md-4">
                    <a class="lightbox" href="../images/bridge.jpg">
                        <img src="../images/bridge.jpg" alt="Bridge">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="../images/park.jpg">
                        <img src="../images/park.jpg" alt="Park">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="../images/tunnel.jpg">
                        <img src="../images/tunnel.jpg" alt="Tunnel">
                    </a>
                </div>
                <div class="col-sm-12 col-md-8">
                    <a class="lightbox" href="../images/traffic.jpg">
                        <img src="../images/traffic.jpg" alt="Traffic">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="../images/coast.jpg">
                        <img src="../images/coast.jpg" alt="Coast">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="../images/rails.jpg">
                        <img src="../images/rails.jpg" alt="Rails">
                    </a>
                </div> -->

            </div>

        </div>

    </div>

    <!-- /IMG gallery -->

    <!-- Pagination -->
    <div class="row">
        <div id="pagination">
            <div id="pagesBtn"></div>
        </div>
    </div>
    <!-- /Pagination -->

    <!-- Footer -->

    <!-- The content of your page would go here. -->
    <div class="row">
        <footer class="footer-distributed">

            <div class="footer-left">

                <h3>SG PIXELS<span>logo here</span></h3>

                <p class="footer-links">
                    <a href="#">Home</a>
                    ·
                    <a href="#">Blog</a>
                    ·
                    <a href="#">Pricing</a>
                    ·
                    <a href="#">About</a>
                    ·
                    <a href="#">Faq</a>
                    ·
                    <a href="#">Contact</a>
                </p>

                <p class="footer-company-name">SG PIXELS &copy; 2017</p>

                <div class="footer-icons">

                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>

                </div>

            </div>

            <div class="footer-right">

                <p>Contact Us</p>

                <form action="#" method="post">

                    <input type="text" name="email" placeholder="Email"/>
                    <textarea name="message" placeholder="Message"></textarea>
                    <button>Send</button>

                </form>

            </div>

        </footer>
    </div>


<?php include 'includes/footer.php'; ?>
