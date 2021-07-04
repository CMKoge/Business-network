<?php
require_once 'includes/init.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body class="container-fluid">
    <div class="row"><!--Top Navigation Bar-->
      <?php include_layout_template('top_navbar_public.php'); ?>
    </div><!--/Top Navigation Bar-->
    <div class="row"><!--Content-->
      <div class="col-sm-2"><!--Side Navigation Bar-->
        <?php include_layout_template('side_navbar_public.php'); ?>
      </div><!--/Side Navigation Bar-->
      <div class="col-sm-7"><!--Wall-->
        <br><br><br><br>
            <div class="poster"><!--Poster-->
              <div class="header-area">
                <div class="prof-img">
                </div>
                <div class="biz-name">
                  <img src="public/image/image.jpg" alt="">
                  <header><h3>Business Name</h3></header>
                </div>
                <div class="track">
                  <button type="button" name="button" class="btn-track">Track</button>
                </div>
              </div>
              <hr>
              <div class="content">
                <img src="public/image/image.jpg" alt="" >
              </div>
              <hr>
              <div class="action-area">
                <button type="button" name="rate" data-toggle="modal" data-target="#star" title="Rate">
                  /5<i class="fa fa-star"></i>
                </button>
                <button type="button" name="review" data-toggle="modal" data-target="#review" title="Review">
                  <i class="fa fa-comment"></i>
                </button>
                <button type="button" name="suggestion" data-toggle="modal" data-target="#suggestion" title="Suggestion">
                  <i class="fa fa-lightbulb-o"></i>
                </button>
                <button type="button" name="share" data-toggle="modal" data-target="#share" title="Share">
                  <i class="fa fa-share-square-o"></i>
                </button>
              </div>
              <?php include_layout_template('rate_modal.php'); ?>
              <?php include_layout_template('review_modal.php'); ?>
              <?php include_layout_template('suggestion_modal.php'); ?>
              <?php include_layout_template('share_modal.php'); ?>

              <?php include_layout_template('edit_review_modal.php'); ?>
            </div><!--/Poster-->
      </div><!--/Wall-->
      <div class="col-sm-3"><!--Ads-->
      </div><!--/Ads-->
    </div><!--/Content-->
  </body>
  <!--JQuery-->
  <script src="public/js/jquery-3.2.1.js"></script>
</html>
