<?php
   function send_request($API_KEY, $text, $kind, $conversation_identifier, $sender_identifier, $platform, $payload)
    {
      $API_KEY = (string)$API_KEY; 
      $text = (string)$text; 
      $kind = (string)$kind; 
      $conversation_identifier = (string)$conversation_identifier; 

      $data = array("message"=>array("text" => $text, "kind" => $kind));
      //echo ($data);
      if (strlen($conversation_identifier) > 0){
         $data["message"]["conversation_identifier"] = $conversation_identifier;
      }
      if (strlen($sender_identifier) > 0){
         $data["message"]["sender_identifier"] = $sender_identifier;
      }
      if (strlen($platform) > 0){
         $data["message"]["platform"] = $platform;
      }
      if (strlen($payload) > 0){
         $data["message"]["payload"] = $payload;
      }
      $data_string = json_encode($data);
      $ch = curl_init('www.botlytics.co/api/v1/messages?token=' . $API_KEY);                                                                      
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));                                                                                                                   
      $ret = curl_exec($ch);
      return $ret; 
   }
?>
