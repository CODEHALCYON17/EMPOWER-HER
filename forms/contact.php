<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set recipient email address
    $to = "g4gregorykurien@gmail.com"; // Replace with your email address

    // Set email headers
    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Compose the email message
    $email_message = "Subject: $subject\n\n";
    $email_message .= "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message";

    // Send email
    $success = mail($to, $subject, $email_message, $headers);

    if ($success) {
        // If the email is sent successfully
        echo "success";
    } else {
        // If there's an error in sending the email
        echo "error";
    }
} else {
    // If the form is not submitted via POST method
    echo "Invalid request";
}
?>
