<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize and get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate fields
    if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)){
        // Admin email where the form will be sent
        $to = 'admin@example.com'; // Replace with your admin email
        $subjectMail = 'New Contact Form Submission: ' . $subject;

        // Message
        $body = "Name: $name\n";
        $body .= "Email: $email\n\n";
        $body .= "Message: \n$message";

        // Headers
        $headers = "From: $email";

        // Send the email
        if(mail($to, $subjectMail, $body, $headers)){
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "invalid";
    }
}
?>
