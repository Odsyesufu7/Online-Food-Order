<?php
 require_once "Mail.php";
 include('Mail/mime.php');
 $from = "Tony Curtis <tonycurtis10@gmail.com>";
 $to = "Oluwaseyi Yesufu <oyesufu7@gmail.com>";
 $subject = "Hi !";
 $body = "Hi,\n\nHow are you?";
 
 $text = 'Text version of email';// text and html versions of email.
 $html = '<html><body>HTML version of email. <strong>This should be bold</strong></body>        </html>';
 $file = 'E:\Skychef\syesufu2000@yahoo.com\PHP5 mail().pptx';
 
 $host = "smtp.gmail.com";
 $username = "tonycurtis10@gmail.com";
 $password = "coolsurfer890";
 
 $headers = array ('From' => $from, 'Content-type'=> 'applications',
   'To' => $to,
   'Subject' => $subject);
   
 $mime = new Mail_mime();
 $mime->setTXTBody($text);
 $mime->setHTMLBody($html); 
 $mime->addAttachment($file,'applications/octet-stream');
 $body = "PFA \nRegards \nOluwaseyi Yesufu";
 $headers = $mime->headers($headers);
 echo $headers["Content-type"];
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
 ?>