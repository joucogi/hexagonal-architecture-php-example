<?php

namespace App\Infrastructure\Adapters;

use App\Domain\Entities\Message;
use App\Domain\Interfaces\Output;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class EmailOutput implements Output
{
    private $to;
    private $subject;

    public function __construct($to, $subject)
    {
        $this->to      = $to;
        $this->subject = $subject;
    }

    public function print(Message $video): void
    {
        $body = sprintf('<strong>%s.-</strong> %s', $video->getId(), $video->getTitle());

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                                                            // Send using SMTP
            $mail->Host       =
                getenv('SMTP_HOST');                                                                    // Set the SMTP server to send through
            $mail->SMTPAuth   =
                true;                                                                                   // Enable SMTP authentication
            $mail->Username   =
                getenv('SMTP_USERNAME');                                                                // SMTP username
            $mail->Password   =
                getenv('SMTP_PASSWORD');                                                                // SMTP password
            $mail->SMTPSecure =
                PHPMailer::ENCRYPTION_STARTTLS;                                                         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       =
                587;                                                                                    // TCP port to connect to

            //Recipients
            $mail->setFrom(getenv('SMTP_USERNAME'), 'Mailer');
            $mail->addAddress($this->to);                         // Name is optional

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $this->subject;
            $mail->Body    = $body;

            $mail->send();

            echo 'Message has been sent';

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    }
}