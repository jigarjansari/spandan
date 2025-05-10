<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name    = htmlspecialchars(trim($_GET["name"]));
    $email   = filter_var($_GET["email"], FILTER_SANITIZE_EMAIL);
    $phone   = htmlspecialchars(trim($_GET["phone"]));
    $date    = htmlspecialchars(trim($_GET["date"]));
    $message = htmlspecialchars(trim($_GET["message"]));

    $to      = "jigarjansari1@gmail.com"; // ✅ Your email
    $subject = "New Appointment Request";

    $body = "
        <strong>Name:</strong> $name<br>
        <strong>Email:</strong> $email<br>
        <strong>Phone:</strong> $phone<br>
        <strong>Date:</strong> $date<br>
        <strong>Message:</strong><br>$message
    ";

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: $name <$email>\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Appointment request sent successfully!";
    } else {
        echo "Failed to send email. Please try again.";
    }
}
?>
