<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/vendor/phpmailer/phpmailer/src/Exception.php';
require dirname(__DIR__) . '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require dirname(__DIR__) . '/vendor/phpmailer/phpmailer/src/SMTP.php';


class email
{
    private $mail;

    function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
        $this->mail->isSMTP();
        $this->mail->Host = SMTPSERVER;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = EMAIL_USERNAME;
        $this->mail->Password = EMAIL_PASSWORD;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port = SMTPSERVER_PORT;
        $this->mail->CharSet = 'UTF-8';
    }

    public function send($email_address, $full_name, $subject, $body)
    {
        $this->mail->setFrom(EMAIL_USERNAME, 'بی بست');
        $this->mail->addAddress($email_address, $full_name);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
//        $this->mail->addEmbeddedImage(DIR_ROOT . 'public/images/public-images/logo/mindbox.svg', 'logo', 'mindbox.svg');
        return $this->method_send();
    }

    private function method_send()
    {
        $send = $this->mail->send();
        return $send ? true : false;
    }
}