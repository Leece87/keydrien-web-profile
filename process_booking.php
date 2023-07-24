<?php
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $event = $_POST['event'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $message = $_POST['message'];

    // Email details
    $to = 'mxolisiprince87@gmail.com'; // Replace with your desired email address
    $subject = 'New Event Booking';
    $headers = "From: $name <$email>";

    // Email content
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Event: $event\n";
    $email_body .= "Date: $date\n";
    $email_body .= "Location: $location\n";
    $email_body .= "Message:\n$message";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        // Email sent successfully, redirect back to the form page
        header("Location: index.html?status=success");
        exit(); // Add this to stop script execution after redirection
    } else {
        // Failed to send email, redirect back to the form page with an error status
        header("Location: index.html?status=error");
        exit(); // Add this to stop script execution after redirection
    }
} else {
    // If the form is not submitted, redirect back to the form page
    header("Location: index.html");
    exit(); // Add this to stop script execution after redirection
}
?>
