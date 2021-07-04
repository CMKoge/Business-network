<?php
 require_once '../../includes/init.php';

 $user = new User();
 if ($user->isLoggedIn()) {
   Redirect::locate('dashboard.php');
 } else {
 if (Input::exists()) {
   if (Token::check(Input::get('token'))) {
     $validate = new Validate();
     $validataion = $validate->check($_POST, array(
       'email' => array('required' => true),
       'password' => array('required' => true)
     ));
     if ($validataion->passed()) {
       $remember = (Input::get('remember') == 'on') ? true : false;
       $login = $user->login(Input::get('email'), Input::get('password'), $remember);

       if ($login) {
         Redirect::locate('dashboard.php');
       } else {
         echo "<script>alert('Failed')</script>";
       }
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
    <title>Login</title>
  </head>
  <body class="container-fluid">
    <div class="row"><!--Top Navigation Bar-->
      <?php include_layout_template('top_navbar_user.php'); ?>
    </div><!--/Top Navigation Bar-->
  </br></br>
    <div class="row"><!--Login Form-->
      <form class="login-form" action="" method="post">
        <div class="form-group"><!--Add Email-->
          <label for="email">Email</label> </br>
          <input type="email" name="email" value="<?php echo escape_value(Input::get('email'));?>" >
        </div><!--/Add Email-->
        <div class="form-group"><!--Add Password-->
          <label for="password">Password</label> </br>
          <input type="password" name="password">
        </div><!--/Add Password-->
        <div class="form-group">
          <input type="hidden" name="token" value="<?php echo Token::generate();?>">
          <button type="submit" name="btn-signup" class="btn-scs">LogIn</button>
        </div>
        <div class="form-group"><!--Accetp Agreement-->
          <label for="remember">
       <input type="checkbox"  name="remember" checked>&nbsp Remember Me
        </label>
        </div><!--/Accetp Agreement-->
        <p>
          <a href="verify_email.php">Forgotten your password?</a>
        </p>
      </form>
    </div><!--/Login Form-->
    <div class="row"><!--Register-->
      <h6 class ="seprate-bar"><span>not a member, register free as</span></h6>
      <div class="account-type-box">
      <p><a href="cst_usr_reg.php">Personal User</a></p>
      <font>Or</font>
      <p><a href="biz_usr_reg.php">Business User</a></p>
    </div>
  </div><!--/Register-->
  </body>
<!--Bootstrap-->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!--JQuery-->
<script src="../js/jquery-3.2.1.js"></script>
</html>
<?php } ?>
