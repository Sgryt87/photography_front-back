<?php
include 'includes/header.php';
include "recaptcha/recaptchalib.php";
?>

<?php
$name = '';
$subject = '';
$email = '';
$message = '';

$nameError = '';
$subjectError = '';
$emailError = '';
$messageError = '';
$success = '';
$captchaErr = '';

if (isset($_POST['send'])) {

    function clean_input($data)
    {
        global $connection;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = mysqli_real_escape_string($connection, $data);
        return $data;
    }

    if (empty($_POST["name"])) {
        $nameError = "Name is required";
    } else {
        $name = clean_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameError = "Only letters and white space allowed";
        }
    }


    if (empty($_POST["email"])) {
        $emailError = "Email is required";
    } else {
        $email = clean_input($_POST["email"]);
    }

    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
        $emailError = "Invalid Email";
    }

    if (empty($_POST["subject"])) {
        $subjectError = "Purpose is required";
    } else {
        $subject = clean_input($_POST["subject"]);
    }

    if (empty($_POST["message"])) {
        $messageError = "Message is required";
    } else {
        $message = clean_input($_POST["message"]);
    }

    //captcha


    if (isset($_POST['g-recaptcha-response'])) {
        $captcha = $_POST['g-recaptcha-response'];

        $secretKey = "6LeaUjwUAAAAAAhKOQhiV7Z2Mx_d3q5qwZKWnWQa";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha . "&remoteip=" . $ip);

        $responseKeys = json_decode($response, true);
        if (intval($responseKeys["success"]) == 1) {

            //get email from DB
            $admin_email = 'sergiigrytsaienko@gmail.com';
            $headers = "From: $email" . "\r\n" .
                "Reply-To: $email" . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            $result = mail($admin_email, $subject, $message, $headers);

            //    header('Location: contact.php');
            if ($result) {
                $success = 'Email was sent successfully';
            } else {
                echo "
        <script>
        
        
        alert('Something is wrong');
        
        
        </script>";
            }
        }
    } else {
        $captchaErr = "Please check the the captcha form.";
    }
}

?>
    <div id="contactform" class="contact-section text-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="container-fluid" method="post" action="contact.php">
                    <h2>Contact Me</h2>
                    <div class="form-group">
                        <label for="name"><b>Name</b></label>
                        <input type="text" class="form-control" placeholder="Name"
                               name="name">
                        <span class="error"><?php echo $nameError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="subject"><b>Subject</b></label>
                        <input type="text" class="form-control" placeholder="Subject"
                               name="subject">
                        <span class="error"><?php echo $subjectError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input type="email" class="form-control"
                               placeholder="Email" name="email">
                        <span class="error"><?php echo $emailError; ?></span>
                    </div>
                    <div class="form-group ">
                        <label for="message"><b>Your Message</b></label>
                        <textarea class="form-control" placeholder="Description" name="message"></textarea>
                        <span class="error"><?php echo $messageError; ?></span>
                    </div>
                    <div class="g-recaptcha col-md-8 col-md-offset-4" data-sitekey="6LeaUjwUAAAAAOK5U9tMUce_b0y90luo8uWOf0U_"></div>
                    <?php if ($captchaErr != '') {
                        ?>
                        <div class="alert alert-danger"><?php echo $captchaErr; ?></div>
                        <?php
                    } ?>
                    <button type="submit" class="btn btn-default sendButton" name="send"><b>Send Message</b>
                    </button>
                    <?php if ($success != '') {
                        ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php
                    } ?>
                </form>
            </div>
        </div>
    </div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php include 'includes/footer.php'; ?>



