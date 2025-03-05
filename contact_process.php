<?php

$to = "saibhuran272002@gmail.com";
$from = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : 'No Subject';
$number = isset($_REQUEST['number']) ? $_REQUEST['number'] : '';
$cmessage = isset($_REQUEST['message']) ? $_REQUEST['message'] : '';

// Validate email
if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}

// Headers
$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: " . $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Subject
$email_subject = "You have a message from Therayu Website";

// Email Body
$logo = 'img/logo.png';
$link = '#';

$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Contact Mail</title></head><body>";
$body .= "<table style='width: 100%;'>";
$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
$body .= "</td></tr></thead><tbody><tr>";
$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
$body .= "</tr>";
$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
$body .= "</tbody></table>";
$body .= "</body></html>";

// Send Mail and Debug
if (mail($to, $email_subject, $body, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}

?>
