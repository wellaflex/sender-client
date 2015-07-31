<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

\Sender\Sender::setConfig([
    'uri' => 'http://sender'
]);

\Sender\Sender::setToken('{token}');


/**
 * SMS message composer
 */
$sms = new Sender\Model\Sms();

$sms->setReceivers([
    '{thomas-anderson-mts}',
    '{thomas-anderson-life}'
]);
$sms->setContent('Скажите мистер Андерсон чем же Ваша миссия? может быть Вы откроете?');


/**
 * Email message composer
 */
$email = new \Sender\Model\Email();

$email->setReceivers([
    ['name' => 'Tomas Anderson Gmail', 'email' => 'tanderson@matrix.com'],
    ['name' => 'Tomas Anderson Rambler', 'email' => 'tanderson@rambler.ru'],
]);

$email->setSubject('Эволюция, эволюция!');
$email->setContent('Все животные планеты Земля инстинктивно живут, находя равновесие с окружающей средой. Но человек не таков. Попадая на какие-то участки, вы размножаетесь и размножаетесь, пока все природные ресурсы не будут исчерпаны. И тогда eдинственный путь для вашего дальнейшего выживания – экспансия на новые территории. Существует другой организм, действующий подобным образом. Вирус. Человечество – это болезнь, раковая опухоль планеты. А мы – лекарство.');


/**
 * Sending both messages
 */
$sender = new \Sender\Sender();

echo $sender
        ->setMessages([$sms, $email])
        ->send();




