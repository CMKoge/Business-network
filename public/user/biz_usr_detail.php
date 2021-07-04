<?php
 require_once '../../includes/init.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="container-fluid">
  </br></br>
      <div class="row">
        <div class="col-sm-6"><!--Intro-->
            <img src="" class="user-intro-image" alt="user_intro_image_1">
            <img src="" class="user-intro-image" alt="user_intro_image_2">
            <img src="" class="user-intro-image" alt="user_intro_image_2">
          <p id="user-intro-text">Visit, travel, find suitable places for traverl, and tell others about it.</p>
        </div><!--/Intro-->
        <div class="col-sm-6"><!--Intro-->
          <form class="signup-form" action="biz_usr_detail.php" method="post">
            <div class="form-group biz-form-group"><!--Add Business Name-->
              <label for="biz-name">Business Name</label> </br>
              <input type="text" name="biz-name" autocomplete="off">
            </div><!--/Add Business Name-->
            <div class="form-group biz-form-group"><!--Add Address 1-->
              <label for="biz-add-1">Business Address Line 1</label> </br>
              <input type="text" name="biz-adrs-1" autocomplete="off">
            </div><!--/Add Address 1-->
            <div class="form-group biz-form-group"><!--Add Address 2-->
              <label for="biz-add-2">Business Address Line 2</label> </br>
              <input type="text" name="biz-adrs-2" autocomplete="off">
            </div><!--/Add Address 2-->
            <div class="form-group biz-form-group"><!--Add Address 3-->
              <label for="biz-add-3">Business Address Line 3</label> </br>
              <input type="text" name="biz-adrs-3" autocomplete="off">
            </div><!--/Add Address 3-->
            <div class="form-group"><!--Add Address District-->
              <label for="biz-disc">Business District:</label>
              <select class="form-control" name="biz-disc">
                <option>Kandy</option>
                <option>Ampara</option>
                <option>Anuradhapura</option>
                <option>Badulla</option>
                <option>Batticaloa</option>
                <option>Colombo</option>
                <option>Galle</option>
                <option>Gampaha</option>
                <option>Hambantota</option>
                <option>Jaffna</option>
                <option>Kalutara</option>
                <option>Kegalle</option>
                <option>Kilinochchi</option>
                <option>Kurunegala</option>
                <option>Mannar</option>
                <option>Matale</option>
                <option>Matara</option>
                <option>Monaragala</option>
                <option>Mullaitivu</option>
                <option>Nuwara Eliya</option>
                <option>Polonnaruwa</option>
                <option>Puttalam</option>
                <option>Ratnapura</option>
                <option>Trincomalee</option>
                <option>Vavuniya</option>
              </select>
            </div><!--/Add Address District-->
            <div class="form-group biz-form-group"><!--Add Contact No-->
              <label for="biz-tel">Business Contact No</label> </br>
              <input type="tel" name="biz-tel" autocomplete="off">
            </div><!--/Add Contact No-->
            <div class="form-group">
              <label for="first_name">Owner First Name</label><br>
                <input type="text" name="first_name" required>
            </div><!-- End form group -->
            <div class="form-group">
              <label for="last_name">Owner Last Name</label><br>
                <input type="text" name="last_name" required>
            </div><!-- End form group -->
            <div class="form-group biz-form-group"><!--Add Address 1-->
              <label for="own-add-1">Owner Address Line 1</label> </br>
              <input type="text" name="own-adrs-1" autocomplete="off">
            </div><!--/Add Address 1-->
            <div class="form-group biz-form-group"><!--Add Address 2-->
              <label for="own-add-2">Business Address Line 2</label> </br>
              <input type="text" name="own-adrs-2" autocomplete="off">
            </div><!--/Add Address 2-->
            <div class="form-group biz-form-group"><!--Add Address 3-->
              <label for="own-add-3">Owner Address Line 3</label> </br>
              <input type="text" name="own-adrs-3" autocomplete="off">
            </div><!--/Add Address 3-->
            <div class="form-group"><!--Add Address District-->
              <label for="own-disc">Owner District:</label>
              <select class="form-control" name="own-disc">
                <option>Kandy</option>
                <option>Ampara</option>
                <option>Anuradhapura</option>
                <option>Badulla</option>
                <option>Batticaloa</option>
                <option>Colombo</option>
                <option>Galle</option>
                <option>Gampaha</option>
                <option>Hambantota</option>
                <option>Jaffna</option>
                <option>Kalutara</option>
                <option>Kegalle</option>
                <option>Kilinochchi</option>
                <option>Kurunegala</option>
                <option>Mannar</option>
                <option>Matale</option>
                <option>Matara</option>
                <option>Monaragala</option>
                <option>Mullaitivu</option>
                <option>Nuwara Eliya</option>
                <option>Polonnaruwa</option>
                <option>Puttalam</option>
                <option>Ratnapura</option>
                <option>Trincomalee</option>
                <option>Vavuniya</option>
              </select>
            </div><!--/Add Address District-->
            <div class="form-group biz-form-group"><!--Add Contact No-->
              <label for="own-tel">Owner Contact No</label> </br>
              <input type="tel" name="own-tel" autocomplete="off">
            </div><!--/Add Contact No-->
            <br>
            <div class="form-group biz-form-group"><!--If Registerd-->
              <label class="checkbox-inline"><input type="checkbox"cname="reg-biz" id="chk-reg-biz">Check This if Your Business is Registerd</label>
            </div><!--/If Registerd-->
            <div id="reg-div"><!--Registerd Business-->
              <div class="form-group biz-form-group"><!--Add Business Name-->
                <label for="reg-no">Registerd No</label> </br>
                <input type="text" name="reg-no" autocomplete="off">
              </div><!--/Add Business Name-->
              <div class="form-group biz-form-group"><!--Add Address 1-->
                <label for="reg-add-1">Registerd Address Line 1</label> </br>
                <input type="text" name="reg-adrs-1" autocomplete="off">
              </div><!--/Add Address 1-->
              <div class="form-group biz-form-group"><!--Add Address 2-->
                <label for="reg-add-2">Registerd Address Line 2</label> </br>
                <input type="text" name="reg-adrs-2" autocomplete="off">
              </div><!--/Add Address 2-->
              <div class="form-group biz-form-group"><!--Add Address 3-->
                <label for="reg-add-3">Registerd Address Line 3</label> </br>
                <input type="text" name="reg-adrs-3" autocomplete="off">
              </div><!--/Add Address 3-->
              <div class="form-group"><!--Add Address District-->
                <label for="reg-disc">Registerd District:</label>
                <select class="form-control" name="reg-disc">
                  <option>Kandy</option>
                  <option>Ampara</option>
                  <option>Anuradhapura</option>
                  <option>Badulla</option>
                  <option>Batticaloa</option>
                  <option>Colombo</option>
                  <option>Galle</option>
                  <option>Gampaha</option>
                  <option>Hambantota</option>
                  <option>Jaffna</option>
                  <option>Kalutara</option>
                  <option>Kegalle</option>
                  <option>Kilinochchi</option>
                  <option>Kurunegala</option>
                  <option>Mannar</option>
                  <option>Matale</option>
                  <option>Matara</option>
                  <option>Monaragala</option>
                  <option>Mullaitivu</option>
                  <option>Nuwara Eliya</option>
                  <option>Polonnaruwa</option>
                  <option>Puttalam</option>
                  <option>Ratnapura</option>
                  <option>Trincomalee</option>
                  <option>Vavuniya</option>
                </select>
              </div><!--/Add Address District-->
            </div><!--/Registerd Business-->
            <br>
            <input type="hidden" name="token" value="<?php echo Token::generate();?>">
            <button type="submit" name="btn-signup" class="btn-scs">Submit</button>
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
