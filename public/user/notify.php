<?php
require_once '../../includes/init.php';
$user = new User();
if ($user->isLoggedIn()) {
  $notification = new Notification();
  $live_user = display_user_details('1');
  $reciver = Input::get('reciver');
  $type = Input::get('type');
  $action = Input::get('action');
  // Send Notifications
  if ($action == 'send') {
    try {
      $notification->create(array(
        'type' => $type,
        'reciver' => $reciver,
        'sender' => $live_user,
        'date_time' => date('Y-m-d H:i:s')
      ));
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
  // Revcvie Notifications
  $view = Input::get('view');
  if ($action == 'recive') {
      // Change 4 to live user
      if ($view != '') {
        try {
          $update = $notification->clear_viewd_notification($live_user);
        } catch (Exception $ex) {
          die($ex->getMessage());
        }
      } else {
        $notification->display($live_user);
      }
  }
} else {
  Redirect::locate('../public/user/login.php');
}
 ?>
