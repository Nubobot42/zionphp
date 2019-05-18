<?php 
namespace zion\utils;

class GoogleUtils {
    public static function isRecaptchaValid($secretKey,$captcha){
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $secretKey, 'response' => $captcha);
        
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        var_dump($response);exit();
        $responseKeys = json_decode($response,true);
        
        if($responseKeys["success"]) {
            return true;
        } else {
            return false;
        }
    }
}
?>