<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

\Sender\Sender::setConfig([
    'uri' => 'http://sender'
]);

\Sender\Sender::setToken('{token}');

$sms = new Sender\Model\Sms();

$sms->setReceivers(['mobile_number']);
$sms->setContent('Hello, Mr. Hunt');

$email = new \Sender\Model\Email();

$email->setReceivers([['name' => 'Ethan Hunt', 'email' => 'ethan_hunt@mail.com']]);
$email->setSubject('Nice to meet you');
$email->setContent('Hello, Mr. Hunt');

$sender = new \Sender\Sender();

echo $sender
        ->setMessages([$sms, $email])
        ->send();




