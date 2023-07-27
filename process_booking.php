<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST["submit"])) {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $event = $_POST["event"];
    $date = $_POST["date"];
    $location = $_POST["location"];
    $message = $_POST["message"];

    // Create a new instance of PHPMailer
    $mail = new PHPMailer(true);

    // Set up SMTP configuration if needed
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'mxolisiprince87@gmail.com'; // Your SMTP username
    $mail->Password = 'fyoaxagjstetwthv'; // Your SMTP password
    $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl' based on your SMTP server configuration
    $mail->Port = 587; // Use the appropriate port for your SMTP server

    try {
        // Set the "From" address and the sender's name
        $mail->setFrom($email, $name);

        // Replace 'bookings@example.com' with the actual email address where you want to receive the booking requests
        $to = 'mxolisiprince87@gmail.com';
        $subject = "Booking Request for $event on $date";
        $email_message = "Name: $name\nEmail: $email\nPhone: $phone\nEvent: $event\nDate: $date\nLocation: $location\nMessage: $message";

        // Set the recipient
        $mail->addAddress($to);

        // Set email body
        $mail->isHTML(false); // Set to true if you want to send an HTML-formatted email
        $mail->Subject = $subject;
        $mail->Body = $email_message;

        // Send the email
        $mail->send();

        // Show a success message
        echo "<p>Thank you for your booking request. We will get back to you soon!</p>";
    } catch (Exception $e) {
        // If any error occurs during sending the email, display the error message
        echo "Error: {$e->getMessage()}";
    }
}
?>
