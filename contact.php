<?php include 'includes/header.php'; ?>

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
    
        if (empty($_POST["name"])){
        $nameError = "Name is required";
    }
    else
     {
        $name = clean_input($_POST["name"]); 
        if (!preg_match("/^[a-zA-Z ]*$/",$name))
        {
        $nameError = "Only letters and white space allowed";
        }
    } 
    

    if (empty($_POST["email"]))
    {
        $emailError = "Email is required";
    }
    else
     {
        $email = clean_input($_POST["email"]);
    } 
    
    if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
        {
            $success = "Message sent successfully.";
        } 
        else 
        {
            $success = "Invalid Email";
        }

    if (empty($_POST["subject"]))
    {
        $subjectError = "Purpose is required";
    } 
    else
    {
        $subject = clean_input($_POST["purpose"]);
    }

    if (empty($_POST["message"]))
    {
        $messageError = "Message is required";
    }
    else
     {
        $message = clean_input($_POST["message"]);
    }
    
    



//get email from DB
    $admin_email = 'sergiigrytsaienko@gmail.com';
    $headers = "From: $email" . "\r\n" .
        "Reply-To: $email" . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $result = mail($admin_email, $subject, $message, $headers);
//    header('Location: contact.php');
    if (!$result) {
        echo "
        <script>
        
        
        alert('Something is wrong');
        
        
        </script>";
    }
}

?>
    <section id="contact" class="content-section text-center">
        <div class="contact-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal" method="post" action="contact.php">
                        <h2>Contact Me</h2>
                        <div class="form-group">
                            <label for="exampleInputName2"><b>Name</b></label>
                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Name"
                                   name="name">
                            <span class="error"><?php echo $nameError;?></span>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2"><b>Subject</b></label>
                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Subject"
                                   name="subject">
                            <span class="error"><?php echo $subjectError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2"><b>Email</b></label>
                            <input type="email" class="form-control" id="exampleInputEmail2"
                                   placeholder="Email" name="email">
                            <span class="error"><?php echo $emailError;?></span>
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputText"><b>Your Message</b></label>
                            <textarea class="form-control" placeholder="Description" name="message"></textarea>
                            <span class="error"><?php echo $messageError;?></span>
                        </div>
                        <button type="submit" class="btn btn-default sendButton" name="send"><b>Send Message</b>
                        </button>
                            <span class="success"><?php echo "<br>" . $success;?></span>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php include 'includes/footer.php'; ?>



