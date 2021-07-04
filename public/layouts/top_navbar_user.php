<nav class="navbar navbar-­default navbar-fixed-top navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <div class="search-group">
            <input type="text" name="" value="" placeholder="SEARCH" id="nav-search">
            <button type="button" name="search" id="btn-nav-search"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </li>
        <li><a href="../../index.php"><span class="glyphicon glyphicon-home"></span>&nbsphome</a></li>
        <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span>&nbsp<?php echo display_user_details('2');?></a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> settings
        <span class="caret"></span></a>
        <ul class="dropdown-menu dropmenu-custom">
          <li><a href="cst_account_setting.php">account setting</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="logout.php">log out</a></li>
        </ul>
      </li>
      </ul>
    </div>
  </div>
</nav>
