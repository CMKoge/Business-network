<?php
 require_once '../../includes/init.php';

 $user = new User();
 $validate = new Validate();
 if ($user->isLoggedIn()) {
   if(Input::exists()) {
     if (Token::check(Input::get('token'))) {
       $validation = $validate->check($_POST, array(
         'display_name' => array(
           'required' => true,
           'min' => 3,
           'max' => 25,
           'unique' => 'user'
         )
       ));

       if ($validation->passed()) {
         try {
           $user->update(array(
             'display_name' => Input::get('display_name')
           ));
         } catch (Exception $ex) {
           die($ex->getMessage());
         }

       } else {
         foreach ($validation->errors() as $error) {
           echo $error, "</br>";
         }
       }
     }// End Change Display Name
      if (Token::check(Input::get('token_pwd'))) {
        $validation = $validate->check($_POST, array(
          'current_password' => array(
            'required' => true,
            'min' => 6
          ),
          'new_password' => array(
            'required' => true,
            'min' => 6
          ),
          're_new_password' => array(
            'required' => true,
            'matches' => 'new_password'
          ),
        ));
        if ($validation->passed()) {
          try {
            if (Hash::make(Input::get('current_password'), $user->data()->salt) != $user->data()->password) {
              echo "<script>alert('Your Current Password is Wrong')</script>";
            } else {
              $salt = Hash::salt(32);
              $user->update(array(
                'password' => Hash::make(Input::get('new_password'), $salt),
                'salt' => $salt
              ));
              Redirect::locate('account_setting.php');
            }
          } catch (Exception $ex) {
            die($ex->getMessage());
          }

        } else {
          foreach ($validation->errors() as $error) {
            echo $error, "</br>";
        }
      }// End Change Password
    }
  }
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Dashbord</title>
   </head>
   <body class="container-fluid">
     <div class="row"><!--Top Navigation Bar-->
       <?php include_layout_template('top_navbar_user.php'); ?>
     </div><!--/Top Navigation Bar-->
     <div class="row"><!--Content-->
       <div class="col-sm-2"><!--Side Navigation Bar-->
         <?php include_layout_template('side_navbar_user.php'); ?>
       </div><!--/Side Navigation Bar-->
       <div class="col-sm-7"><!--Wall-->
         <div class="row"><!--Change Display Name-->
           <div class="col-xs-12">
             <div class="custom-dropdown">
               <button type="button" class="btn-dropdown" data-toggle="collapse" data-target="#display-name">change display name <i class="fa fa-toggle-down"></i></button>
             <div id="display-name" class="collapse">
               <form class="update-form" action="" method="post">
                 <div class="form-group"><!--Add Display Name-->
                   <label for="display_name">Display Name</label> </br>
                   <input type="text" name="display_name" value="<?php echo escape_value($user->data()->display_name)?>">
                 </div><!--/Add Display Name-->
                 <div class="form-group">
                   <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                   <button type="submit" name="btn-update" class="btn-scs">Update</button>
                 </div>
               </form>
             </div>
             </div>
        </div>
      </div><!--/Change Display Name-->
      <div class="row"><!--Change Password-->
          <div class="col-xs-12">
            <div class="custom-dropdown second-dropdown">
            <button type="button" class="btn-dropdown" data-toggle="collapse" data-target="#password">change password <i class="fa fa-toggle-down"></i></button>
          <div id="password" class="collapse">
            <form class="update-form" action="" method="post">
              <div class="form-group"><!--Add Password-->
                 <label for="current_password">Current Password</label> </br>
                 <input type="password" name="current_password">
               </div><!--/Add Password-->
              <div class="form-group"><!--Add Password-->
                 <label for="new_password">New Password</label> </br>
                 <input type="password" name="new_password">
               </div><!--/Add Password-->
               <div class="form-group"><!--Repeat Password-->
                 <label for="re_new_password">Retype New Password</label></br>
                 <input type="password" name="re_new_password">
               </div><!--/Repeat Password-->
               <div class="form-group">
                 <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                 <button type="submit" name="btn-update" class="btn-scs">Update</button>
               </div>
            </form>
          </div>
      </div>
      </div>
       </div><!--Change Password-->
       </div><!--/Wall-->
       <div class="col-sm-3"><!--Ads-->
       </div><!--/Ads-->
     </div><!--/Content-->
     <!--Bootstrap-->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <!--JQuery-->
  <script src="../js/jquery-3.2.1.js"></script>

   </body>
 </html>
 <?php
} else {
   Redirect::locate('login.php');
}
?>
