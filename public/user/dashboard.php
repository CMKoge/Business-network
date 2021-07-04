<?php
 require_once '../../includes/init.php';

 $user = new User();
 if ($user->isLoggedIn()) {
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Dashbord</title>
   </head>
   <body class="container-fluid">
     <div class="row"><!--Top Navigation Bar-->
       <?php include_layout_template('top_navbar_user.php'); ?>
     </div><!--/Top Navigation Bar-->
     <div class="row"><!--Content-->
       <div class="col-sm-2"><!--Side Navigation Bar-->
         <?php include_layout_template('side_navbar_user.php'); ?>
       </div><!--/Side Navigation Bar-->
       <div class="col-sm-8"><!--Wall-->
         <br><br>
             <!--Profile Header-->
        <div class="profile-header">
          <figure class="profile-banner">
            <img src="" alt="Profile bannr" />
          </figure>
          <figure class="profile-picture"
                  style="background-image: url('../image/profile_pic_avatar.png')">
          </figure>

          <div class="row profile-data">
            <div class="col-sm-7 profile-data-left">
              <h1 contenteditable="true">This is a Very Long User Name</h1>

              <!--Business User Profile Only-->
              <a href="#" title="Facebook"><i class="fa fa-facebook-square"></i></a>
              <a href="#" title="Twitter"><i class="fa fa-twitter-square"></i></a>
              <a href="#" title="G+"><i class="fa fa-google-plus-square"></i></a>
              <a href="#" title="Web"><i class="fa fa-globe"></i></a>
              <!--/Business User Profile Only-->

            </div>
            <!--Business User Profile Only-->
            <div class="col-sm-5 profile-data-right">
              <h4 contenteditable="true" >
                <p>Address Line 1</p>
                <p>Address Line 2</p>
                <p>Address Line 3</p>
                <p>Address Line District</p>
              </h4>
              <h4><span contenteditable="true">Contact Number</span>
            </div>
            <!--/Business User Profile Only-->
          </div>

          <div class="profile-stats">
            <!--
            <ul>
              <li><a data-toggle="tab" href="#mytrack">0 <span>Tracks</span></a></li>
              <li><a data-toggle="tab" href="#myrate">0 <span>Rates</span></a></li>
              <li><a data-toggle="tab" href="#myreview">0 <span>Reviews</span></a></li>
              <li><a data-toggle="tab" href="#mysuggestion">0 <span>Suggestions</span></a></li>
            </ul>
            <div class="track">
              <button type="button" name="button" class="btn-track">Track</button>
            </div>
          -->
            <!--Business User Profile Only-->
            <ul>
              <li><a data-toggle="modal" data-target="#star"><i class="fa fa-star"></i> <span>Rate</span></a></li>
              <li><a data-toggle="modal" data-target="#review"><i class="fa fa-comment"></i> <span>Review</span></a></li>
              <li><a data-toggle="modal" data-target="#suggestion"><i class="fa fa-lightbulb-o"></i> <span>Suggestion</span></a></li>
              <li><a data-toggle="modal" data-target="#share"><i class="fa fa-share-square-o"></i> <span>Share</span></a></li>
            </ul>
            <!--/Business User Profile Only-->
          </div>
        </div>
          <!--Profile Content for Customers-->
          <div class="tab-content">
          <!--Track Tab-->
          <div class="tab-pane fade" id="mytrack">
              <div class="biz-window">
                <a href="#">
                <div class="window-name"><header><h4>Business Name</h4></header></div>
                <div class="window-img">
                  <img src="../image/profile_pic_avatar.png" alt="">
                </div>
                <div class="window-detail">
                  <div class="track-date">Tracked Since: <span>2018.07.03</span></div>
                </div>
                </a>
              </div>
          </div>
          <!--Rate Tab-->
          <div class="tab-pane fade" id="myrate">
            <div class="biz-window">
              <a href="#">
              <div class="window-name"><header><h4>Business Name</h4></header></div>
              <div class="window-img">
                <img src="../image/profile_pic_avatar.png" alt="">
              </div>
              <div class="window-detail">
                <div class="track-date">Rancked: <span>0/5</span></div>
              </div>
              </a>
            </div>
          </div>
          <!--Review Tab-->
          <div class="tab-pane fade" id="myreview">
            <div class="biz-window text-window">
              <div class="window-name"><header><h4>Business Name</h4></header></div>
              <div class="window-content">
                <h5>2018.07.04</h5>
                <article>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </article>
              </div>
              <div class="window-action">
                <button type="button" name="review-edit" data-toggle="modal" data-target="#edit_review" title="Edit"><i class="fa fa-edit"></i></button>
                <button type="button" name="review-delete" title="Delete"><i class="fa fa-close"></i></button>
              </div>
            </div>
            <?php include_layout_template('edit_review_modal.php'); ?>
          </div>
          <!--Suggestions Tab-->
          <div class="tab-pane fade" id="mysuggestion">
            <div class="biz-window text-window">
              <div class="window-name"><header><h4>Business Name</h4></header></div>
              <div class="window-content">
                <h5>2018.07.04</h5>
                <article>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </article>
              </div>
              <div class="window-display">
                <i class="fa fa-thumbs-up"></i><span>0</span>
                <i class="fa fa-thumbs-down"></i><span>0</span>
                <i class="fa fa-thumb-tack"></i>
              </div>
              <div class="window-action">
                <button type="button" name="suggestions-edit" data-toggle="modal" data-target="#edit_suggestion" title="Edit"><i class="fa fa-edit"></i></button>
                <button type="button" name="suggestions-delete" title="Delete"><i class="fa fa-close"></i></button>
              </div>
            </div>
            <?php include_layout_template('edit_suggestion_modal.php'); ?>
          </div>
          </div>
          <!-- Profile Content for Business-->
          <div class="biz-content">
            <?php include_layout_template('rate_modal.php'); ?>
            <?php include_layout_template('review_modal.php'); ?>
            <?php include_layout_template('suggestion_modal.php'); ?>
            <?php include_layout_template('share_modal.php'); ?>

            <?php include_layout_template('edit_review_modal.php'); ?>
            <div class="about">
              <div class="about-content">
                <h1>About Us</h1>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
              </div>
            </div><!--about-->
            <div class="center">
               <div class="center-main">
                <div class="row">
                  <!--What We Are-->
                     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 biz-fields">
                       <h2>Our Fields</h2>
                       <ul>
                         <li>Business Sub Type</li>
                         <li>Business Sub Type</li>
                         <li>Business Sub Type</li>
                       </ul>
                     </div>
                     <!--What We Do-->
                     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 biz-services">
                       <h2>Our Services</h2>
                       <ul>
                         <li>Service Type</li>
                         <li>Service Type</li>
                         <li>Service Type</li>
                       </ul>
                    </div>
                   <!--col-lg-6 col-md-6 col-sm-12 col-xs-12-->


                 </div><!--row-->
                 <div class="center-middle">
                 <div class="paragraph">
                   <h2>Images From Us</h2>
                   <div class="blog">
                     <div class="row">
                      <div class="col-xs-6 col-md-3">
                <div class="thumbnail">
                  <div class="pict">
                  <img src="../image/image.jpg" alt="error"></div>
                  <div id="thum" class="caption" >
                    <h5>David J.Robbins</h5>
                  </div>
                </div>
              </div>
            </div>
                   </div><!--blog-->
                   </div><!--paragraph-->
                 </div><!--center-middle-->
                 </div><!--center-main-->

              </div><!--center-->
          </div>
       </div><!--/Wall-->
       <div class="col-sm-2"><!--Ads-->
       </div><!--/Ads-->
     </div><!--/Content-->
   </body>
<!--JQuery-->
<script src="../js/jquery-3.2.1.js"></script>
 </html>
 <?php
} else {
   Redirect::locate('login.php');
}
?>
