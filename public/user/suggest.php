<?php
require_once '../../includes/init.php';
$user = new User();
if ($user->isLoggedIn()) {
  $suggestion = new Suggestion();
  $biz_id = Input::get('biz_id');
  $pass = Input::get('pass');
  $content = Input::get('suggestion');
  if($pass = 'pass'){
    $token = Token::generate();
    if (Token::check($token)) {
      if ($content !='' && $biz_id !='') {
        try {
          $suggestion->create(array(
            'content' => $content,
            'biz_id' => $biz_id,
            'usr_id' => display_user_details('1'),
            'date_time' => date('Y-m-d H:i:s')
          ));
        } catch (Exception $ex) {
          echo $ex;
        }
      }
    }
  }

  $action = Input::get('action');
  $sgs_id = Input::get('sgs_id');

  $del = Input::get('del');
  if ($action == 'delete') {
    $suggestion->delete($del);
  }
  $biz_id = Input::get('biz_id');
  if ($action == 'pin') {
    $suggestion->pin($sgs_id, $biz_id);
  }
  $value = Input::get('value');
  echo $value;
  if ($action == 'con') {
    if ($value == 'like') {
      try {
        $suggestion->contribute($sgs_id,display_user_details('1'),array(
          'contribute' => 1,
          'sgs_id' => $sgs_id,
          'usr_id' => display_user_details('1'),
          'date_time' => date('Y-m-d H:i:s')
        ));
      } catch (Exception $ex) {
        echo $ex;
      }
    }

    if ($value == 'dislike') {
      try {
        $suggestion->contribute($sgs_id,display_user_details('1'),array(
          'contribute' => 0,
          'sgs_id' => $sgs_id,
          'usr_id' => display_user_details('1'),
          'date_time' => date('Y-m-d H:i:s')
        ));
      } catch (Exception $ex) {
        echo $ex;
      }
    }
  }
} else {
  Redirect::locate('../public/user/login.php');
}
 ?>
