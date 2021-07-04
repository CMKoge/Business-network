<!DOCTYPE html>
<?php
 require_once '../includes/init.php';
 $user = new User();
 $track = new Track();
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $db = Database::getInstance()->query("SELECT * FROM `business`");
      if($db->count()):
        foreach ($db->result() as $db):
     ?>
     <div class="business">
       <div class="">
         <?php echo $db->business_name;?>
       </div>
       <a href="#" id="<?php echo $db->biz_id; ?>" userid="<?php echo $db->usr_id ?>" class="track_btn">Track</a>

     </div>
     <?php endforeach; ?>
   <?php endif;?>
  </body>
  <script type="text/javascript" src="../public/js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../public/js/functions.js"></script>
</html>
