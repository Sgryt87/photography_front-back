<?php include 'includes/header.php'; ?>

<?php
if (isset($_POST['send'])) {
    $name = trim($_POST['name']);
    $subject = trim($_POST['subject']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    //get email from DB
    $admin_email = 'sergiigrytsaienko@gmail.com';
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    $result = mail($admin_email, $subject, $message, $headers);

    if (!$result) {
        echo "<script>alert('Wrong')</script>";
    }

}

?>

    <section id="contact" class="content-section text-center">
        <div class="contact-section">
            <h2>Contact Us</h2>
            <p>Feel free to shout us by feeling the contact form or visiting our social network sites like
                Fackebook,Whatsapp,Twitter.</p>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label for="exampleInputName2">Name</label>
                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe"
                                   name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2">Subject</label>
                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Subject"
                                   name="subject">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail2"
                                   placeholder="jane.doe@example.com" name="email">
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputText">Your Message</label>
                            <textarea class="form-control" placeholder="Description" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default" name="send">Send Message</button>
                    </form>

                    <hr>
                    <h3>Our Social Sites</h3>
                    <ul class="list-inline banner-social-buttons">
                        <li><a href="#" class="btn btn-default btn-lg"><i class="fa fa-twitter"> <span
                                            class="network-name">Twitter</span></i></a></li>
                        <li><a href="#" class="btn btn-default btn-lg"><i class="fa fa-facebook"> <span
                                            class="network-name">Facebook</span></i></a></li>
                        <li><a href="#" class="btn btn-default btn-lg"><i class="fa fa-youtube-play"> <span
                                            class="network-name">Youtube</span></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php include 'includes/footer.php'; ?>