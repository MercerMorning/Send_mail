<?php

require_once 'vendor/autoload.php';

try {

// Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl'))
        ->setUsername('justblog@mail.ru')
        ->setPassword('blogerblog123')
    ;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message('Wonderful Subject'))
        ->setFrom(['justblog@mail.ru' => 'hugopochta@gmail.com'])
        ->setTo(['hugopochta@gmail.com'])
        ->setBody('Here is the message itself')
        ->attach(Swift_Attachment::fromPath('Безымянный.png'))
    ;

// Send the message
    $result = $mailer->send($message);
    var_dump(['res' => $result]);
} catch (Exception $e) {
    var_dump($e->getMessage());
    echo '<pre>' . print_r($e->getTrace(), 1);
}