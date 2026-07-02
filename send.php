<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $company = strip_tags(trim($_POST["company"]));
    $message = strip_tags(trim($_POST["message"]));

    $to = "stanislav.rmr@gmail.com";
    $subject = "New Project Inquiry from $name";
    
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Company: $company\n\n";
    $body .= "Message:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: index.html?status=success");
    } else {
        header("Location: index.html?status=error");
    }
}
?>