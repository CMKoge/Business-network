<?php
require_once '../../includes/init.php';
$user = new User();
if ($user->isLoggedIn()) {
  $tracking_id = Input::get('tracking_id');
  $track = new Track();
  $track->is_record_available(display_user_details('1'),$tracking_id);
} else {
  echo "Please Login to Track This Business";
}
 ?>
