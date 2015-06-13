<?php

namespace iRAP\Twilio;

/*
 * This class represents a library for interfacing with the Twilio service located at:
 * https://www.twilio.com/
 * It actually wraps around the Services_Twilio provided by the SDK, in order to simplify things.
 * The service provides a lot more capabilities than allowed here, but I only need to be able to
 * send text messages for now so there is only one wrapper aoround the Services_Twilio class.
 */

class Twilio
{
    private $m_twilio_client;
    private $m_number;

    public function __construct($sid, $auth_token, $number)
    {
        $this->m_number = $number;
        $this->m_twilio_client = new \Services_Twilio($sid, $auth_token);
    }


    /**
     * Sends a text message to a telephone.
     * @param $to - the telephone number that you wish to send the message to. Works with or 
     *              without the country code, e.g. 0788xxxxxx0 or +44788xxxxxx0
     * @param $body - the body of the message. E.g. 'ALERT - your server is on fire!'
     * @return void - throws an exception if something goes wrong. (evn on the twilio side)
     */
    public function send_sms($to, $body)
    {
        // Your Account Sid and Auth Token from twilio.com/user/account
        $from = $this->m_number;
        $this->m_twilio_client->account->messages->sendMessage($from, $to, $body);
    }
}

