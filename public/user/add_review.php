<?php
require_once '../../includes/init.php';
$user = new User();
if ($user->isLoggedIn()) {
  if ($user->permission('review')) {
    $review = new Review();
    $biz_id = Input::get('biz_id');
    $pass = Input::get('pass');
    $content = Input::get('review');
    if ($pass = 'pass') {
      $token = Token::generate();
      if (Token::check($token)) {
        if ($content !='' && $biz_id !='') {
          try {
             $review->create(array(
               'content'=> $content,
               'date_time' => date('Y-m-d H:i:s'),
               'biz_id' => $biz_id,
               'cst_id' => display_user_details('3')
             ));
          } catch (Exception $ex) {
            echo $ex;
          }
        }
      }
      echo $content;
    }
  }
} else {
  echo "Please Login to Review This Business";
}
 ?>
