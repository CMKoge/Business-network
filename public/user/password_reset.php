<?php
 require_once '../../includes/init.php';

 // Validate Submit Button Text Fields
 $email = Input::get('email');
 $code = Input::get('code');
 $user = new User();
 $select = Database::getInstance()->get('user', array('email', '=', $email));
 if($select->count()) {
   foreach ($select->result() as $select) {
     if($code = $select->confirm_code) {
       $user->update('email', "'$email'",array(
         'confirm_code' => 0
       ));
     }
   }
 }
 if (Input::exists()) {
   if(Token::check(Input::get('token'))) {
     $validate = new Validate();
     $validation = $validate->check($_POST, array(
       'password' => array(
         'min' => 6
       ),
       'repassword' => array(
         'matches' => 'password'
       ),
     ));
     // Validate Submit Button
     if ($validation->passed()) {
       try {
         $salt = Hash::salt(32);
         $user->update('email', "'$email'",array(
           'password' => Hash::make(Input::get('password'), $salt),
           'salt' => $salt
           ));
         Redirect::locate('dashboard.php');
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
       <div class="row">
         <div class="col-sm-6"><!--SignUp Form-->
           <form class="pwd-recover-form" action="" method="post">
             <div class="form-group"><!--Add Password-->
               <label for="password">Password</label> </br>
               <input type="password" name="password" required>
             </div><!--/Add Password-->
             <div class="form-group"><!--Repeat Password-->
               <label for="repassword">Retype Password</label></br>
               <input type="password" name="repassword" required>
             </div><!--/Repeat Password-->
             <div class="form-group"><!--Accetp Agreement-->
            <input type="checkbox"  name="agree"> &nbsp By clicking this you ensure forget your password.
             </div><!--/Accetp Agreement-->
             <div class="form-group">
               <input type="hidden" name="token" value="<?php echo Token::generate();?>">
               <button type="submit" name="btn-signup" class="btn-scs">Submit</button>
             </div>
           </form>
         </div><!--/SignUp Form-->
       </div>
   </body>
   <!--Bootstrap-->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!--JQuery-->
<script src="../js/jquery-3.2.1.js"></script>
 </html>
<?php

 ?>
