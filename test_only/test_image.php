<!DOCTYPE html>
<?php
 require_once '../includes/init.php';
 $image = new Image();
 if (Input::exists()) {
   if(Token::check(Input::get('token'))) {
       try {
          $image->attach_file('image[]');
       } catch (Exception $ex) {
         echo $ex;
       }
   }
 }
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="test_image.php" method="post" enctype="multipart/form-data">
      <input type="file" name="image[]" multiple>
      <input type="hidden" name="token" value="<?php echo Token::generate();?>">
      <button type="submit" name="Upload">Upload</button>
      <a href="../public/user/delete.php?del=1">Delete</a>
    </form>
  </body>
</html>
