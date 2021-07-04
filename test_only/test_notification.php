<?php
require_once '../includes/init.php';
$user = new User();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title></title>
  </head>
  <body>
    <br>
    <?php
    $db = Database::getInstance()->query("SELECT * FROM `notification` WHERE `reciver` = 4 AND `viewed` = 0");

     ?>
    <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
  <?php if ($db->count() > 0): ?>
    New Notification
  <?php else: ?>
    Notification
  <?php endif; ?>
  </button>
  <ul class="dropdown-menu">
  </ul>
</div>
  </body>
  <script type="text/javascript" src="../public/js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../public/js/functions.js"></script>
</html>
