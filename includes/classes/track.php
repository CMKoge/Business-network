<?php
/**
 * Customer Track Business or Business Track Business
 * Unrack Business
 */
class Track {

  private $_db;

  public function __construct() {
    $this->_db = Database::getInstance();
  }

  // Get Loged in User ID
  // Get Tracking User ID
  // Insert Them to Track Table
  private function create_track_record($user_id, $tracking_id) {
    $fields = array(
      'biz_id' => $tracking_id,
      'usr_id' => $user_id,
      'date_time' => date('Y-m-d H:i:s')
    );
    if (!$this->_db->insert('tracked_business', $fields)) {
      throw new Exception("Error Occur While Creating Account");
    } else {
      // TODO: Proper Message Display
      echo "Successfully Tracked The Business ".$tracking_id;
    }
  }

  private function destroy_track_record($user_id, $tracking_id) {
    $query = $this->_db->query("DELETE FROM `tracked_business` WHERE `biz_id` = {$tracking_id} AND `usr_id` = {$user_id}");
    if (!$query) {
      throw new Exception("Error Occur While Deleting the Record");
    } else {
      // TODO: Proper Message Display
      echo "Successfully Untracked The Business ".$tracking_id;
    }
  }

  public function is_record_available($user_id, $tracking_id) {
    $data = $this->_db->query("SELECT * FROM `tracked_business` WHERE `biz_id` = {$tracking_id} AND `usr_id` = {$user_id}");
    if(!$data->count()) {
      $this->create_track_record($user_id, $tracking_id);
    } else {
      $this->destroy_track_record($user_id, $tracking_id);
    }
  }

}

 ?>
