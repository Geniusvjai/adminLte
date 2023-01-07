<?php
if(empty($_POST['web_name']) || empty($_POST['web_subject']) || empty($_POST['web_message']) || !filter_var($_POST['web_email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['web_name']));
$email = strip_tags(htmlspecialchars($_POST['web_email']));
$m_subject = strip_tags(htmlspecialchars($_POST['web_subject']));
$message = strip_tags(htmlspecialchars($_POST['web_message']));

$to = "noreply@example.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
