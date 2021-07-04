<?php
require_once '../../includes/init.php';
$rew_id = Input::get('rew_id');
$biz_id = Input::get('biz_id');
if($biz_id):
  $review = new Review();
  $db =$review->display_more($biz_id, $rew_id);
  if($db->count()):
    foreach ($db->result() as $db):?>
   <div class="list_item"><?php echo $db->content; ?></div>
   <?php endforeach; ?>
  <div class="show_more_main" id="show_more_main<?php echo $db->rew_id; ?>">
    <a href="#" id="<?php echo $display->rew_id; ?>" bizid="<?php echo $db->biz_id ?>" class="show_more" title="Load more posts">Show more</a>
  </div>
<?php endif;?>
<?php endif;?>
