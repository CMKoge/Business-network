<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 require_once '../../includes/init.php';
 $user = new User();
 if ($user->isLoggedIn()) {
   Redirect::locate('dashboard.php');
 } else {
 // Validate Submit Button Text Fields
 if (Input::exists()) {
   if(Token::check(Input::get('token'))) {
     $validate = new Validate();
     $validation = $validate->check($_POST, array(
       'email' => array(
         'required' => true,
         'unique' => 'user'
       ),
       'password' => array(
         'required' => true,
         'min' => 6
       ),
       'repassword' => array(
         'required' => true,
         'matches' => 'password'
       ),
     ));
     // Validate Submit Button
     if ($validation->passed()) {
       $user = new User();
       $salt = Hash::salt(32);
       $confirm_code = $user->generateRandomString(16);
       $email = Input::get('email');

       try {

         $phpmailer = new PHPMailer(true);
         $mail = new Mail($phpmailer);
         $mail->sender_and_reciver('Click This URL to Confirm Your Email', $email,'', 'Do not Reply this mail');
         $body = 'Click
         <a href="http://localhost/Business_network/public/user/cst_usr_detail.php?email='.$email.'&code='.$confirm_code.'">Here</a> to confirm your email
         ';
         $mail->content('Confirm Your Email Address',$body);
         $mail->send();

         $user->create('user',array(
           'email' => $email,
           'password' => Hash::make(Input::get('password'), $salt),
           'salt' => $salt,
           'date' => date('Y-m-d H:i:s'),
           'category' => 1,
           'confirm_code' => $confirm_code
         ));

       } catch (Exception $ex) {
         die($ex->getMessage());
       }
     } else {
       foreach ($validation->errors() as $error) {
         echo $error." </br>";
     }
   }
 }

 }
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body class="container-fluid">
     <div class="row"><!--Top Navigation Bar-->
       <?php include_layout_template('top_navbar_user.php'); ?>
     </div><!--/Top Navigation Bar-->
   </br></br></br>
       <div class="row">
         <div class="col-sm-6"><!--Intro-->
             <img src="" class="user-intro-image" alt="user_intro_image_1">
             <img src="" class="user-intro-image" alt="user_intro_image_2">
             <img src="" class="user-intro-image" alt="user_intro_image_2">
           <p id="user-intro-text">Visit, travel, find suitable places for traverl, and tell others about it.</p>
         </div><!--/Intro-->
         <div class="col-sm-6"><!--SignUp Form-->
           <form class="signup-form" action="" method="post">
             <div class="form-group"><!--Add Email-->
               <label for="email">Email</label> </br>
               <input type="email" name="email" autocomplete="off">
             </div><!--/Add Email-->
             <div class="form-group"><!--Add Password-->
               <label for="password">Password</label></br>
               <input type="password" name="password">
             </div><!--/Add Password-->
             <div class="form-group"><!--Repeat Password-->
               <label for="repassword">Retype Password</label></br>
               <input type="password" name="repassword">
             </div><!--/Repeat Password-->
             <div class="form-group"><!--Accetp Agreement-->
            <input type="checkbox"  name="agree" class="check-accept"> &nbsp By clicking this you agree to our <a href="#">Terms & Privacy</a>.
             </div><!--/Accetp Agreement-->
             <div class="form-group">
               <input type="hidden" name="token" value="<?php echo Token::generate();?>">
               <button type="submit" name="btn-signup" class="btn-scs btn-signup" disabled>Sign Up</button>
             </div>
           </form>
         </div><!--/SignUp Form-->
       </div>
   </body>
   <!--Bootstrap-->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!--JQuery-->
<script src="../js/jquery-3.2.1.js"></script>
<script src="../js/functions.js"></script>
 </html>
 <?php } ?>
