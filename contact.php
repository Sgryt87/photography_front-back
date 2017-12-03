<?php include 'includes/header.php';

function died($error)
{
    echo "We are very sorry, but there were error(s) found with the form you submitted.";
    echo "These errors appear below.<br><br>";
    echo $error . "<br><br>";
    echo "Please go back and fix these errors.<br><br>";
    die();
}

function clean_input($data)
{
    global $connection;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($connection, $data);
    return $data;
}


if (isset($_POST['send'])) {

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $string_exp = "/^[A-Za-z0-9 .'-]+$/";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    $error = '';

    if (!preg_match($string_exp, $name)) {
        $error .= "The First Name you entered does not appear to be valid.<br>";
    }
    if (!preg_match($string_exp, $subject)) {
        $error .= "The Subject you entered do not appear to be valid.<br>";
    }
    if (!preg_match($email_exp, $email)) {
        $error .= "The Email you entered do not appear to be valid.<br>";
    }
    if (!preg_match($string_exp, $message)) {
        $error .= "The Comments you entered do not appear to be valid.<br>";
    }
    if (strlen($error) > 0) {
        died($error);
    }

    $name = clean_input($name);
    $subject = clean_input($subject);
    $email = clean_input($email);
    $message = clean_input($message);


//get email from DB
    $admin_email = 'sergiigrytsaienko@gmail.com';
    $headers = "From: $email" . "\r\n" .
        "Reply-To: $email" . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $result = mail($admin_email, $subject, $message, $headers);
    var_dump($result);
    if (!$result) {
        echo "<script>alert('Wrong')</script>";
    } else {
        echo "<h1>SENT</h1>";
    }
}

?>

    <section id="contact" class="content-section text-center">
        <div class="contact-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal" method="post">
                        <h2>Contact Me</h2>
                        <div class="form-group">
                            <label for="exampleInputName2"><b>Name</b></label>
                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Name"
                                   name="name">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2"><b>Subject</b></label>
                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Subject"
                                   name="subject">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2"><b>Email</b></label>
                            <input type="email" class="form-control" id="exampleInputEmail2"
                                   placeholder="Email" name="email">
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputText"><b>Your Message</b></label>
                            <textarea class="form-control" placeholder="Description" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default sendButton" name="send"><b>Send Message</b>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php include 'includes/footer.php'; ?>