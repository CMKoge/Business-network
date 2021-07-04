<?php
require_once '../../includes/init.php';
$user = new User();
if ($user->isLoggedIn()):
  if ($user->permission('rate')):
    $biz_id = Input::get('biz_id');
    $rank = Input::get('rank');
    if($biz_id !='' && $rank !=''):
    $rate = new Rate();
    $rate->is_rating_exists($biz_id, display_user_details('3'), $rank);
    $db = $rate->get_avg_rating();
    foreach ($db->result() as $db):
?>
    <div class="rating"><?php echo round($db->rating); ?>/5</div>
    <?php endforeach; ?>
    <?php else: throw new \Exception("Error Processing Request", 1); ?>
    <?php endif; ?>
  <?php endif; ?>
<?php else: Redirect::locate('../public/user/login.php'); ?>
<?php endif; ?>
