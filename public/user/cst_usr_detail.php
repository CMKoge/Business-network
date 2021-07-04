<?php
require_once '../../includes/init.php';

$email = Input::get('email');
$code = Input::get('code');
$select = Database::getInstance()->get('user', array('email', '=', $email));
$user = new User();
if($select->count()) {
  foreach ($select->result() as $select) {
    if($code = $select->confirm_code) {
      $user->update('email', "'$email'",array(
        'confirm_code' => 0,
        'confirm' => 1
      ));
    }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="container-fluid">
  </br></br></br>
      <div class="row">
        <div class="col-sm-6"><!--Intro-->
          <p id="user-intro-text">You are almost three.</p>
        </div><!--/Intro-->
        <div class="col-sm-6"><!--SignUp Form-->
          <form class="signup-form" action="cst_usr_detail.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $select->usr_id; ?>">
            <div class="form-group">
              <label for="display_name">Display Name</label><br>
                <input type="text" name="display_name" required>
            </div><!-- End form group -->
            <div class="form-group">
              <label for="first_name">First Name</label><br>
                <input type="text" name="first_name" required>
            </div><!-- End form group -->
            <div class="form-group">
              <label for="last_name">Last Name</label><br>
                <input type="text" name="last_name" required>
            </div><!-- End form group -->
            <div class="form-group">
              <label for="contact_no">Contact No</label><br>
              <input type="tel" name="contact_no" required>
            </div><!-- End form group -->
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
<?php }}
if(Input::exists()) {
  if (Token::check(Input::get('token'))) {
    try {
      $user->create('customer',array(
        'display_name' => Input::get('display_name'),
        'first_name' => Input::get('first_name'),
        'last_name' => Input::get('last_name'),
        'contact_no' => Input::get('contact_no'),
        'usr_id' => Input::get('user_id')
      ));
      Redirect::locate('dashboard.php');
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
}
 ?>
