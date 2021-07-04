<?php
/**
 * Make, Delete Review
 * Review the Reviews
 */
class Review {

  private $_db;

  public function __construct() {
    $this->_db = Database::getInstance();
  }

  public function create($fields = array()) {
    if (!$this->_db->insert('review', $fields)) {
      throw new Exception("Error Occur While Creating Account");
    }
  }

  public function display($biz_id) {
    $table = 'review';
    $field = 'biz_id';
    $data = $this->_db->query("SELECT * FROM {$table} WHERE {$field} = {$biz_id}  ORDER BY 1 DESC LIMIT 1");
    return $data;
  }

  public function display_more($biz_id, $rew_id) {
    $table = 'review';
    $field = 'biz_id';
    $field_1 = 'rew_id';
    $data = $this->_db->query("SELECT * FROM {$table} WHERE {$field} = {$biz_id} AND {$field_1} < {$rew_id} ORDER BY 1 DESC LIMIT 2");
    return $data;
  }

  public function delete($rew_id) {
    $this->_db->delete('review', array('rew_id', '=', $rew_id));
  }
}

 ?>
