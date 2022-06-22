<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
   <?php

$to = 'suchijha1998@gmail.com';
$subject = 'Password Reset';

 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '."\r\n".
    'Reply-To: '."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<div>click here for reset your password &nbsp;<a href="http://localhost:3000/root/reset.php">click </a></div>';

$message .= '</body></html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}
?>
      
   </body>
</html>