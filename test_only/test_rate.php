<!DOCTYPE html>
<?php
 require_once '../includes/init.php';
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $rate = new Rate();
      $db = $rate->get_avg_rating();
    ?>
     <div class="about_us">
       <?php foreach($db->result() as $db): ?>
         <p><?php echo $db->biz_id; ?></p>
         <div class="rating" id="<?php echo $db->biz_id; ?>"><span id="rank_<?php echo $db->biz_id; ?>"><?php echo round($db->rating); ?></span>/5</div>
         <div class="rate" id="<?php echo $db->biz_id; ?>">
           <?php foreach(range(1, 5) as $rank): ?>
             <a href="" class="rank" rank="<?php echo $rank; ?>" bizid="<?php echo $db->biz_id; ?>" userid="<?php
              $biz = Database::getInstance()->get('business', array('biz_id', '=', $db->biz_id));
              if ($biz->count()) {
                foreach($biz->result() as $biz){
                  echo $biz->usr_id;
                }
              }
             ?>"><?php echo $rank; ?></a>
         <?php endforeach; ?>
         </div>
     <?php endforeach; ?>
     </div>
  </body>
  <script type="text/javascript" src="../public/js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../public/js/functions.js"></script>
</html>
