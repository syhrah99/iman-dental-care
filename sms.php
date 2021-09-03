<?php
require_once 'vendor/autoload.php';
$messagebird = new MessageBird\Client('pfbeAR3D8BwMQcxg9fsk6FOKT');
$message = new MessageBird\Objects\Message;
$message->originator = '+60135840508';
$message->recipients = [ '+60135840508' ];
$message->body = 'Hi! Syahirah Cantik';
$response = $messagebird->messages->create($message);
print_r(json_encode($response));