<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Check for empty fields
    if (empty($name) || empty($email) || empty($message)) {
        echo 'Please fill in all fields.';
    } else {
        $to = 'vedhindia@gmail.com';
        $subject = 'New message from ' . $name;

        // Additional headers
        $headers = "From: $email" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo 'Email sent successfully.';
        } else {
            echo 'Email sending failed.';
            $error = error_get_last();
            if ($error !== null) {
                echo 'Error: ' . $error['message'];
            }
        }
    }
} else {
    echo 'Form submission error.';
}
?>
