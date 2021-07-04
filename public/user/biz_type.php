<?php
 require_once '../../includes/init.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="container-fluid">
  </br></br>
      <div class="row">
        <div class="col-sm-3">
          <nav class="navbar">
            <div class="container-fluid">
              <div class="navbar-header sidebar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mySidebar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse" id="mySideba">
             	<ul class="nav nav-pills nav-stacked" id="sidebar-ul">
                        <li><a data-toggle="tab" href="#food_drink">Food & Drink</a></li>
                        <li><a data-toggle="tab" href="#fashion_clothing">Fashion & Clothing</a></li>
                        <li><a data-toggle="tab" href="#consumer_electronic">Consumer & Home Electronic</a></li>
                        <li><a data-toggle="tab" href="#home_living">Home & Living</a></li>
                        <li><a data-toggle="tab" href="#fitness_sport">Fitness & Sport</a></li>
                        <li><a data-toggle="tab" href="#beauty_cosmetic">Beauty & Cosmetics</a></li>
                        <li><a data-toggle="tab" href="#events_party">Events & Party</a></li>
                        <li><a data-toggle="tab" href="#wedding">Wedding</a></li>
                        <li><a data-toggle="tab" href="#entertainment_toys">Entertainment & Toys</a></li>
                        <li><a data-toggle="tab" href="#travel_leisure">Travel & Leisure</a></li>
                        <li><a data-toggle="tab" href="#car_vheicle">Car & Vehicle</a></li>
                        <li><a data-toggle="tab" href="#education">Education</a></li>
                        <li><a data-toggle="tab" href="#books_stationery">Books & Stationery</a></li>
                        <li><a data-toggle="tab" href="#medical_healthcare">Medical & Healthcare</a></li>
                        <li><a data-toggle="tab" href="#studio_printing">Studio & Printing</a></li>
                        <li><a data-toggle="tab" href="#professional_services">Professional Services</a></li>
                        <li><a data-toggle="tab" href="#commercial_industry">Commercial & Industry</a></li>
                        <li><a data-toggle="tab" href="#finance">Finance</a></li>
                        <li><a data-toggle="tab" href="#animal_pets">Animal & Pets</a></li>
                        <li><a data-toggle="tab" href="#other">Other</a></li>
                      </ul>
              </div>
            </div>
          </nav>
        </div>
        <div class="col-sm-9">
          <div class="tab-content">
            <!--Tab-->
            <!--food_drink-->
            <div id="food_drink" class="tab-pane fade in active">
              <!--Row-->
              <div class="row">
                <div class="col-sm-3 biz-type-div">
                  <div class="checkbox">
                    <label><input type="checkbox" value="1" name="restaurant">Restaurant</label>
                  </div>
                </div>
                <div class="col-sm-3 biz-type-div">
                  <div class="checkbox">
                    <label><input type="checkbox" value="1" name="cafes">Cafes</label>
                  </div>
                </div>
                <div class="col-sm-3 biz-type-div">
                  <div class="checkbox">
                    <label><input type="checkbox" value="1" name="juice-bar">Juice bar & Coolspot</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3 biz-type-div">
                  <div class="checkbox">
                    <label><input type="checkbox" value="1" name="take-away">Take Away</label>
                  </div>
                </div>
                <div class="col-sm-3 biz-type-div">
                  <div class="checkbox">
                    <label><input type="checkbox" value="1" name="hotel">Hotel</label>
                  </div>
                </div>
                <div class="col-sm-3 biz-type-div">
                  <div class="checkbox">
                    <label><input type="checkbox" value="1" name="liquor">Liquor & Wine</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3 biz-type-div">
                  <div class="checkbox">
                    <label><input type="checkbox" value="1" name="take-away">Other</label>
                  </div>
                </div>
              </div>
              <!--/Row-->
            </div>
            <!--fashion_clothing-->
            <div id="fashion_clothing" class="tab-pane fade">
            </div>
            <!--consumer_electronic-->
            <div id="consumer_electronic" class="tab-pane fade">
            </div>
            <!--home_living-->
            <div id="home_living" class="tab-pane fade">
            </div>
            <!--fitness_sport-->
            <div id="fitness_sport" class="tab-pane fade">
            </div>
            <!--beauty_cosmetic-->
            <div id="beauty_cosmetic" class="tab-pane fade">
            </div>
            <!--events_party-->
            <div id="events_party" class="tab-pane fade">
            </div>
            <!--wedding-->
            <div id="wedding" class="tab-pane fade">
            </div>
            <!--entertainment_toys-->
            <div id="entertainment_toys" class="tab-pane fade">
            </div>
            <!--travel_leisure-->
            <div id="travel_leisure" class="tab-pane fade">
            </div>
            <!--car_vheicle-->
            <div id="car_vheicle" class="tab-pane fade">
            </div>
            <!--education-->
            <div id="education" class="tab-pane fade">
            </div>
            <!--books_stationery-->
            <div id="books_stationery" class="tab-pane fade">
            </div>
            <!--medical_healthcare-->
            <div id="medical_healthcare" class="tab-pane fade">
            </div>
            <!--studio_printing-->
            <div id="studio_printing" class="tab-pane fade">
            </div>
            <!--professional_services-->
            <div id="professional_services" class="tab-pane fade">
            </div>
            <!--commercial_industry-->
            <div id="commercial_industry" class="tab-pane fade">
            </div>
            <!--finance-->
            <div id="finance" class="tab-pane fade">
            </div>
            <!--animal_pets-->
            <div id="animal_pets" class="tab-pane fade">
            </div>
            <!--other-->
            <div id="other" class="tab-pane fade">
            </div>
            <!--/Tab-->
          </div>
        </div>
      </div>
  </body>
  <!--Bootstrap-->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!--JQuery-->
<script src="../js/jquery-3.2.1.js"></script>
</html>
