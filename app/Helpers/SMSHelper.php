<?php

if (!function_exists('sendsms')) {

    /**
     * description
     *
     * @param $to
     * @param $msg
     * @return bool|string
     */
    function sendsms($to, $msg)
    {
        if (is_array($to)) {
            $to = implode(",", $to);
        }
        $regex = '~^[a-zA-Z]+$~';
        $url = config('sms.url');
        $url .= "/http-api.php";
        $url .= "?username=" . config('sms.username');
        $url .= "&password=" . config('sms.password');
        $url .= "&senderid=" . config('sms.senderid');
        $url .= "&route=" . config('sms.route');
        //check if message content is in hindi language
        if (!preg_match($regex, str_replace(' ', '', $msg))) {
            $url .= "&unicode=2";
        }
        $url .= "&number=" . $to;
        //url encode the message content before sending
        $msg = rawurlencode($msg);
        $url .= "&message=" . $msg;
        $res = curl_init();
        curl_setopt($res, CURLOPT_URL, $url);
        curl_setopt($res, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($res);
        $result = str_replace('Message Submitted Successfully<pre>msg-id : ', '', $result);

        return $result;
    }
}
if (!function_exists('check_smsbalance')) {

    /**
     * description
     *
     * @param $to
     * @param $msg
     * @return bool|string
     */
    function check_smsbalance()
    {
        $url = config('sms.url');
        $url .= "/http-credit.php";
        $url .= "?username=" . config('sms.username');
        $url .= "&password=" . config('sms.password');
        $url .= "&route_id=" . config('sms.route');
        $res = curl_init();
        curl_setopt($res, CURLOPT_URL, $url);
        curl_setopt($res, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($res);
        $result = str_replace("Total Balance : ", "", $result);

        return $result;
    }
}
