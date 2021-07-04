<!DOCTYPE html>
<?php
require_once '../includes/init.php';
if (Input::exists()) {
  if (Token::check(Input::get('token'))) {
    $search = new Search();
    if (Input::get('section') == 'full_site') {
      $full_search = $search->full_search(Input::get('search'), Input::get('district'));
      if ($full_search->count()) {
        foreach ($full_search->result() as $full_search) {
           echo $full_search->business_name."</br>";
           echo $full_search->service."</br><hr>";
        }
      }
    } elseif (Input::get('section') == 'professional_service') {
      $type_search = $search->type_search(Input::get('search'), Input::get('district'), Input::get('section'));
      if($type_search->count()) {
        foreach ($type_search->result() as $type_search) {
          echo $type_search->business_name."</br>";
          echo $type_search->service."</br><hr>";
        }
      }
    } elseif (Input::get('section') == 'book_and_stationary') {
      $type_search = $search->type_search(Input::get('search'), Input::get('district'), Input::get('section'));
      if($type_search->count()) {
        foreach ($type_search->result() as $type_search) {
          echo $type_search->business_name."</br>";
          echo $type_search->service."</br><hr>";
        }
      }
    }
  }
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="test_search.php" method="post">
      <input type="text" name="search" value="">
      <input type="hidden" name="token" value="<?php echo Token::generate();?>">
      <select class="" name="district">
        <option value="kandy">Kandy</option>
        <option value="kegall">Kegall</option>
        <option value="kurunagale">Kurunagale</option>
      </select>
      <select class="" name="section">
        <option value="full_site">Full Site</option>
        <option value="professional_service">Professional Services</option>
        <option value="book_and_stationary">Books and Stationary</option>
      </select>
      <button type="submit" name="btn-search">Search</button>
    </form>
  </body>
  <script type="text/javascript" src="../public/js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../public/js/functions.js"></script>
</html>
