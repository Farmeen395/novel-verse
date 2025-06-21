<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form input
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $novel = htmlspecialchars(strip_tags(trim($_POST["novel_name"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Email configuration
    $to = "farmeentariq246@gmail.com";
    $subject = "New Novel Request from $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email body
    $body = "You have received a new novel request:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Requested Novel: $novel\n";
    $body .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you! Your request has been sent.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
