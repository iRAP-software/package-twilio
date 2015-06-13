<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/Twilio.php');

$sid = '';
$auth_token = '';
$number = '+441234567890';
$twilio = new \Irap\Twilio\Twilio($sid, $auth_token, $number);

$twilio->send_sms("+441234567890", 'testing body');



