<!DOCTYPE html>
<?php
require_once '../includes/init.php';
$user = new User();
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="suggestion">
      <?php
      $sgs = Database::getInstance()->query("SELECT * FROM `suggestion`");
      if($sgs->count()):
        foreach ($sgs->result() as $sgs):
       ?>
       <div class="content" id="content_<?php echo $sgs->sgs_id?>">
         <?php echo $sgs->content; ?>
       </div>
       <div class="">
         <?php
         $like = Database::getInstance()->query("SELECT COUNT(`contribute`) AS `one` FROM `suggestion_contribute` WHERE `contribute` = 1 AND `sgs_id` = $sgs->sgs_id");
         if($like->count()) {
           foreach ($like->result() as $like) {
             echo 'Likes: '.$like->one;
           }
         }
         $dislike = Database::getInstance()->query("SELECT COUNT(`contribute`) AS `zero` FROM `suggestion_contribute` WHERE `contribute` = 0 AND `sgs_id` = $sgs->sgs_id");
         if($dislike->count()) {
           foreach ($dislike->result() as $dislike) {
             echo ' Dislike: '.$dislike->zero;
           }
         }
          ?>
          <br>
         <?php $value = array('like' ,'dislike'); ?>
         <?php foreach ($value as $value): ?>
           <a href="#" class="contribute" id="con_<?php echo $sgs->sgs_id?>" sgsid="<?php echo $sgs->sgs_id?>" userid="<?php echo $sgs->usr_id ?>" value="<?php echo $value ?>"><?php echo $value ?></a>
         <?php endforeach; ?>
       </div>
       <?php if ($user->permission('pin')): ?>
       <div>
         <a href="#" class="sgs_pin" id="pin_<?php echo $sgs->sgs_id?>" sgsid="<?php echo $sgs->sgs_id?>" bizid="<?php echo $sgs->biz_id?>" userid="<?php echo $sgs->usr_id ?>">Pin</a>
       <?php endif; ?>
       </div>
       <div id="del_<?php echo $sgs->sgs_id?>">
         <a href="#" class="sgs_del" id="<?php echo $sgs->sgs_id?>">Delete</a>
       </div>
       <hr>
     <?php endforeach; ?>
       <?php endif; ?>
    </div>
    <?php
      $db = Database::getInstance()->query("SELECT * FROM `business`");
      if($db->count()):
        foreach ($db->result() as $db):
     ?>
     <div class="business">
      <div class=""><?php echo $db->business_name; ?></div>

      <form method="post" id="suggestform_<?php echo $db->biz_id; ?>">
       <input type="text" name="suggestion" id="suggestion_<?php echo $db->biz_id; ?>">
       <input type="hidden" name="biz_id" value="<?php echo $db->biz_id; ?>">
       <input type="hidden" name="pass" id="pass_<?php echo $db->biz_id; ?>" value="pass">
       <button type="button" name="send" class="sgs_btn submit" bizid="<?php echo $db->biz_id; ?>" userid="<?php echo $db->usr_id ?>"> Upload</button>
      </form>
  </div>
<?php endforeach; ?>
  <?php endif; ?>
  </body>
  <script type="text/javascript" src="../public/js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../public/js/functions.js"></script>
</html>
