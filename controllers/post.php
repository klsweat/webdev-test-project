<?php
require('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    function validateData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /* Form Fields
    -------------------------------------------------- */
    $name = validateData($_POST["name"]);
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = validateData($_POST['message']);


    $sql = "INSERT INTO subscriptions (name, email)VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        //echo 'success';
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }

    /* EMAIL
    -------------------------------------------------- */
    $email_to = "";
    $email_subject = "SCAD test project sign up";

    $headers  = 'MIME-Version: 1.0' . "\r\n"
        .'Content-type: text/html; charset=utf-8' . "\r\n"
        .'From: ' . $email . "\r\n";

    if(mail($email_to, $email_subject, $message, $headers)) {
        $msg = "<p>Thank you for contacting us, $name. You will get a reply within 24 hours.</p>";
    } else {
        $msg = '<p>We are sorry but the email did not go through.</p>';
    }
    
    echo $msg;
}     

