<?php

  function send_mailgun($email,$subject,$content){

  $config = array();

	$config['api_key_pub'] = "api_key_pub";
  $config['api_key_secreet'] = "api_key_secreet";

  $config['api_url'] = "https://api.mailjet.com/v3/send";

  $message = array();

  $message['from'] = "your domain <noreplay@your-domain.com>";

  $message['to'] =$email;

  //$message['h:Reply-To'] = "&lt;info@domain.com&gt;";

  $message['subject'] =$subject;

  $message['html'] =$content;

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $config['api_url']);

  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

  curl_setopt($ch, CURLOPT_USERPWD, "".$config['api_key_pub'].":".$config['api_key_secreet']."");

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

  curl_setopt($ch, CURLOPT_POST, true);

  curl_setopt($ch, CURLOPT_POSTFIELDS,$message);

  $result = curl_exec($ch);

  curl_close($ch);

  return $result;

}

?>
