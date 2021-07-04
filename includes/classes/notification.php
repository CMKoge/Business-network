<?php
/**
 * Insert Notification to Database
 * Recive Notification
 * Filter Notification : 1 = Customer Make Rate, 2 = Customer Make Review, 3 = User Track Business,
 * 4 = Business Upload Article, 5 = Business Upload Image, 6 = Create Suggession,
 * 7 = Business Response to Suggession,
 * 8 = Customer Liked or Disliked Suggession
 * Display Notification
 * Indicate When New Notification Arrived
 * Remove Notification sender Display After View
 */
class Notification {

private $_db;
private $_count;

  public function __construct() {
    $this->_db = Database::getInstance();
  }

  public function create($fields = array()) {
    if (!$this->_db->insert('notification', $fields)) {
      throw new Exception("Error Occur While Creating Notification");
    }
  }

  /**
   * Filter Notification
   * $path = redirect business tracker to business profile
   * $link = redirect business to own suggession area
   */
  private static function filter_notifcation($type, $sender) {
    switch ($type) {
      case '1':
        echo '<li>Your businees have been rate by '.$sender.'<br></li>';
        break;
      case '2':
        echo '<li>Your businees have been reviewd by '.$sender.'<br></li>';
        break;
      case '3':
        echo '<li>Your businees have been tracked by '.$sender.'<br></li>';
        break;
      case '4':
        echo '<li>Your businees have been reviewd by '.$sender.'<br></li>';
        break;
      case '5':
        # Business Upload Image
        break;
      case '6':
        echo '<li>Your businees have new suggestion from '.$sender.'<br></li>';
        break;
      case '7':
        echo "<li> $sender Response to Your Suggestion <br></li>";
        break;
      case '8':
        echo "<li> $sender Contribute to Your Suggestion <br></li>";
        break;
      default:
        # User Do Not Have Notification
        break;
    }
  }

  public function display($reciver) {
    $notify = $this->_db->query("SELECT * FROM `notification` WHERE `reciver` = {$reciver} ORDER BY 1 DESC LIMIT 0,5");
    if($notify->count()) {
      foreach ($notify->result() as $notify) {
        self::filter_notifcation($notify->type, $this->get_user_name($notify->sender));
      }
    }
  }

  // Get Sender ID from Notification and Get Display Name or Business Name
  private function get_user_name($sender) {
    $user = $this->_db->get('user', array('usr_id', '=', $sender));
    if($user->count()){
      foreach ($user->result() as $user) {
        $cat = $user->category;
        if ($cat == '1') {
          $name = $this->_db->get('customer', array('usr_id', '=', $sender));
          if($name->count()) {
            foreach ($name->result() as $name) {
              return $name->display_name;
            }
          }
        }
        if ($cat == '2') {
          $name = $this->_db->get('business', array('usr_id', '=', $sender));
          if($name->count()) {
            foreach ($name->result() as $name) {
              return $name->business_name;
            }
          }
        }
      }
    }
  }

  public function clear_viewd_notification($reciver) {
    $update = $this->_db->update('notification' , 'reciver', $reciver, array(
      'viewed' => 1
    ));
    if(!$update) {
      throw new Exception("Error Occur While Updating Notification");
    }
  }

}

 ?>
