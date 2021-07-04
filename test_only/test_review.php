<?php
require_once '../includes/init.php';
$user = new User();
$review = new Review();
 ?>
<!DOCTYPE html>
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
      <br>
      <br>
      <div class="business">
       <div class=""><?php echo $db->business_name; ?></div>
       <div class="postList" id="postList_<?php echo $db->biz_id; ?>">
       <?php
       $display = $review->display($db->biz_id);
       if($display->count()):
           foreach ($display->result() as $display):
       ?>
       <div class="list_item"><?php echo $display->content; ?></div>
       <?php endforeach; ?>
       <div class="show_more_main" id="show_more_main_<?php echo $display->rew_id; ?>">
        <a href="#" class="show_more" rewid="<?php echo $display->rew_id; ?>" bizid="<?php echo $db->biz_id ?>"  id="show_more_<?php echo $display->rew_id; ?>" title="Load more posts">Show more</a>
       </div>
       <?php endif; ?>
   </div>
       <form method="post" id="reviewform_<?php echo $db->biz_id; ?>">
        <input type="text" name="review" id="review_<?php echo $db->biz_id; ?>">
        <input type="hidden" name="biz_id" value="<?php echo $db->biz_id; ?>">
        <input type="hidden" name="pass" id="pass_<?php echo $db->biz_id; ?>" value="pass">
        <button type="button" name="send" class="rew_btn" bizid="<?php echo $db->biz_id; ?>" userid="<?php echo $db->usr_id ?>"> Upload</button>
       </form>
   </div>
   <?php endforeach; ?>
   <?php endif; ?>
   <a href="test_notification.php" target="_blank" class="notify" >Notify</a>
  </body>
  <script type="text/javascript" src="../public/js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../public/js/functions.js"></script>
</html>
