<?php
/*
 *  CONFIGURE EVERYTHING HERE
 */
require_once './vendor/autoload.php';

 
 function mailTo($user_email, $user_name){
  // Create the Transport
  $transport = (new Swift_SmtpTransport('smtp.ukr.net', '2525',   'ssl'))
      ->setUsername('profphp@ukr.net')
      ->setPassword('2171197402qt')
  ;
  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);

 // Create a message
  ob_start();
  require './letter.php';
  $body = ob_get_clean();

  // $message_client = (new Swift_Message("Вы совершили заказ №{$order_id} на сайте " . App::$app->getProperty('shop_name')))
  //     ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
  //     ->setTo($user_email)
  //     ->setBody($body, 'text/html');

  $message = (new Swift_Message("Уважаемый $user_name"))
      ->setFrom(['profphp@ukr.net' => 'Романец Сергей' ])
      ->setTo("$user_email")
      ->setBody($body, 'text/html')
  ;

  // Send the message
  $result = $mailer->send($message);
  // $result = $mailer->send($message_admin);
  // unset($_SESSION['cart']);
  // unset($_SESSION['cart.qty']);
  // unset($_SESSION['cart.sum']);
  // unset($_SESSION['cart.currency']);
  // $_SESSION['success'] = 'Спасибо за Ваш заказ. В ближайшее время с Вами свяжется менеджер для согласования заказа';
}

mailTo($_GET['email'], $_GET['name']);






































// an email address that will be in the From field of the email.
// $from = 'Demo contact form <demo@domain.com>';

// an email address that will receive the email with the output of the form
// $sendTo = 'Demo contact form <bikas9971@gmail.com>';

// subject of the email
// $subject = 'New message from contact form';

// form field names and their translations.
// array variable name => Text to appear in the email
// $fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message'); 

// message that will be displayed when everything is OK :)
// $okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';

// If something goes wrong, we will display this message.
// $errorMessage = 'There was an error while submitting the form. Please try again later';

/*
 *  LET'S DO THE SENDING
 */

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);









// error_reporting(E_ALL & ~E_NOTICE);

// try
// {

//     if(count($_POST) == 0) throw new \Exception('Form is empty');
            
//     $emailText = "You have a new message from your contact form\n=============================\n";

//     foreach ($_POST as $key => $value) {
//         // If the field exists in the $fields array, include it in the email 
//         if (isset($fields[$key])) {
//             $emailText .= "$fields[$key]: $value\n";
//         }
//     }

//     // All the neccessary headers for the email.
//     $headers = array('Content-Type: text/plain; charset="UTF-8";',
//         'From: ' . $from,
//         'Reply-To: ' . $from,
//         'Return-Path: ' . $from,
//     );
    
//     // Send email
//     mail($sendTo, $subject, $emailText, implode("\n", $headers));

//     $responseArray = array('type' => 'success', 'message' => $okMessage);
// }
// catch (\Exception $e)
// {
//     $responseArray = array('type' => 'danger', 'message' => $errorMessage);
// }


// // if requested by AJAX request return JSON response
// if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
//     $encoded = json_encode($responseArray);

//     header('Content-Type: application/json');

//     echo $encoded;
// }
// // else just display the message
// else {
//     echo $responseArray['message'];
// }
