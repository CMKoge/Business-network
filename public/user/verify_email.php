<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 require_once '../../includes/init.php';

 $user = new User();
 if ($user->isLoggedIn()) {
   Redirect::locate('dashboard.php');
 } else {
 if (Input::exists()) {
   if (Token::check(Input::get('token'))) {
     $validate = new Validate();
     $validataion = $validate->check($_POST, array(
       'email' => array('required' => true)
     ));
     if ($validataion->passed()) {
       $email = Input::get('email');
       $confirm_code = $user->generateRandomString(16);

       $user->update('email', "'$email'", array(
         'confirm_code' => $confirm_code
       ));

       $phpmailer = new PHPMailer(true);
       $mail = new Mail($phpmailer);
       $mail->sender_and_reciver('Click This URL to Reset Your Password', $email,'', 'Do not Reply this mail');
       $body = 'Click
       <a href="http://localhost/Business_network/public/user/password_reset.php?email='.$email.'&code='.$confirm_code.'">Here</a> to reset your password
       ';
       $mail->content('Reset Your Password',$body);
       $mail->send();

     } else {
       foreach ($validataion->errors() as $error) {
         echo "<script>alert('$error')</script>";
       }
     }
   }
 }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Verify Email</title>
  </head>
  <body class="container-fluid">
    <div class="row">
      <form class="pwd-recover-form" action="verify_email.php" method="post">
        <div class="form-group"><!--Add Email-->
          <label for="email">Email</label> </br>
          <input type="email" name="email">
        </div><!--/Add Email-->
        <input type="hidden" name="token" value="<?php echo Token::generate()?>">
        <button type="submit" name="btn-send">Send</button>
      </form>
    </div>
  </body>
  <!--Bootstrap-->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <!--JQuery-->
  <script src="../js/jquery-3.2.1.js"></script>
</html>
<?php } ?>
