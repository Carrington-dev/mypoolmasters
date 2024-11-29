<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
include '../includes/details.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$email = $_POST['email'];

try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.sparkpostmail.com';               // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'SMTP_Injection';                       // SMTP username (fixed value for SparkPost)
    $mail->Password   = 'febde2f51f6e9ea454f67766425b8cd313a4d763';               // SparkPost API key
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('support@mail.vroomhive.co.za', $company);       // Set sender's email and name
    $mail->addAddress($email, $email); // Add a recipient
    $mail->addAddress($adminmail, $adminmail); // Add a recipient
    $mail->addReplyTo($replytomail, $company);    // Add reply-to address

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Subscription Confirmed! ' . $company;
    $mail->Body    = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Confirmation</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        }
        .email-container {
        max-width: 600px;
        margin: 20px auto;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
        }
        .header {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        text-align: center;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        }
        .header h1 {
        margin: 0;
        }
        .content {
        padding: 20px;
        text-align: center;
        }
        .content h2 {
        color: #333;
        }
        .content p {
        color: #666;
        font-size: 16px;
        line-height: 1.6;
        }
        .button {
        display: inline-block;
        padding: 10px 20px;
        color: white;
        background-color: #4CAF50;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        }
        .footer {
        text-align: center;
        color: #999;
        font-size: 14px;
        margin-top: 20px;
        }
    </style>
    </head>
    <body>
    <div class="email-container">
        <div class="header">
        <h1>Subscription Confirmed!</h1>
        </div>
        <div class="content">
        <h2>Thank you for subscribing!</h2>
        <p>You\'ve successfully subscribed to our newsletter. We promise to send only the most relevant updates, straight to your inbox.</p>
        <a href="#" class="button">Explore Now</a>
        </div>
        <div class="footer">
        <p>If you didn’t subscribe, please <a href="#">unsubscribe</a> or contact us.</p>
        
        ' . $copyright . '
        </div>
    </div>
    </body>
    </html>';
    $mail->AltBody = 'You\'ve successfully subscribed to our newsletter. We promise to send only the most relevant updates, straight to your inbox.';

    // Send the email
    $mail->send();
    // echo 'Your message has been sent. Thank you!';
    // echo '<div class="sent-message">Your message has been sent. Thank you!</div>';
    echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Form Submission</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
        </head>
        <body>
           
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
      <script>
          
                  Swal.fire({
                      title: "Subscribed!",
                      text: "You have successfully subscribed to our newsletters!.",
                      icon: "success",
                      timer: 3000,
                      showConfirmButton: false
                  });
                  setTimeout(() => {  
                    window.location.href = "../index.php";
                }, 3000);
              
      </script>
        </body>
        </html>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Form Submission</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
        </head>
        <body>
            
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
      <script>
          
                  Swal.fire({
                      title: "Not Subscribed!",
                      text: "Email address already taken, please use a different one!.",
                      icon: "error",
                      timer: 3000,
                      showConfirmButton: false
                  });
                   setTimeout(() => {  
                    window.location.href = "../index.php";
                }, 3000);
              
      </script>
        </body>
        </html>';
}