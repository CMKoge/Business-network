<?php
require_once '../../includes/init.php';
$del = Input::get('del');
if($del) {
  $image = new Image();
  $image->delete($del);
  // TODO: Redirect to Image
}
$del_rew = Input::get('del_rew');
if($del_rew) {
  $review = new Review();
  $review->delete($del_rew);
  // TODO: Redirect to Review
}
 ?>
