<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.html");
    exit;
}

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$subject = trim($_POST["subject"] ?? "");
$message = trim($_POST["message"] ?? "");

if ($name === "" || $email === "" || $subject === "" || $message === "") {
    header("Location: contact.html?status=empty");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: contact.html?status=invalid-email");
    exit;
}

$to = "info@hopemedical.org"; // Change this to your real receiving email.
$safe_name = htmlspecialchars($name, ENT_QUOTES, "UTF-8");
$safe_email = htmlspecialchars($email, ENT_QUOTES, "UTF-8");

$email_subject = "Website Contact: " . $subject;
$email_body = "You have received a new message from your website contact form.\n\n";
$email_body .= "Name: " . $safe_name . "\n";
$email_body .= "Email: " . $safe_email . "\n";
$email_body .= "Subject: " . $subject . "\n\n";
$email_body .= "Message:\n" . $message . "\n";

$headers = "From: " . $safe_email . "\r\n";
$headers .= "Reply-To: " . $safe_email . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

$is_sent = mail($to, $email_subject, $email_body, $headers);

if ($is_sent) {
    header("Location: thank-you.html");
    exit;
}

header("Location: contact.html?status=error");
exit;
?>
