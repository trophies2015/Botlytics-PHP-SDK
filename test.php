<?php
  include 'botlytics.php';
  // exclude any of conversation identifier, sender identifier, payload, platform by replacing them with a ""
  echo send_request("[Your api key here]", "text", "incoming", "conversation identifier", "sender_identifier", "platform", "payload");
?>