<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Email configuration
    $to = "info@dranjalisayurveda.com";
    $cc = "anjalidevidr@gmail.com,dranjalisayurveda@gmail.com";
    $Bcc = "edb@illforddigital.com";
    $subject = "DAAC - Enquiry from Ad page - Form 2";
    $message = "Name: " . $_POST["name"] . "\n";
    $message .= "Email: " . $_POST["email"] . "\n";
    $message .= "Phone Number: " . $_POST["number"] . "\n";
    $message .= "Subject: " . $_POST["subject"] . "\n";
    $message .= "Message: " . $_POST["message"];

    // Additional headers
    $headers = "From: " . $_POST["email"] . "\r\n";
    $headers .= "Cc: $cc\r\n";
    $headers .= "Bcc: $Bcc\r\n";
    $headers .= "Reply-To: " . $_POST["email"] . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Sending email
    if (mail($to, $subject, $message, $headers)) {
        // Redirect to thank you page
        header("Location: ad-thankyou.html");
        exit();
    } else {
        echo "Failed to send enquiry. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
