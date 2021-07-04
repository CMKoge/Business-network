<?php
  /**
   * Create Suggestion
   * Delete Suggestion
   * Like Suggestion
   * Dislike Suggestion
   */
  class Suggestion {

  private $_db;

    public function __construct() {
      $this->_db = Database::getInstance();
    }

    public function create($fields = array()) {
      if (!$this->_db->insert('suggestion', $fields)) {
        throw new Exception("Error Occur While Creating Suggestion");
      }
    }

    public function pin($sgs_id, $biz_id) {
      $update = $this->_db->query("UPDATE `suggestion` SET `pin`= 1 WHERE `biz_id` = {$biz_id} AND `sgs_id` = {$sgs_id}");
      if(!$update) {
        throw new Exception("Error Occur While Pining Suggestion");
      }
    }

    public function contribute($sgs_id, $user_id, $fields = array()) {
      $exists = $this->_db->query("SELECT * FROM `suggestion_contribute` WHERE `sgs_id` = {$sgs_id} AND `usr_id` = {$user_id} ");
      if(!$exists->count()) {
        if (!$this->_db->insert('suggestion_contribute', $fields)) {
          throw new Exception("Error Occur While Creating Contribution");
        }
      } else {
        foreach ($exists->result() as $exists) {
          $con_id = $exists->con_id;
          $this->_db->delete('suggestion_contribute', array('con_id', '=', $con_id));
        }
      }
    }

    public function delete($sgs_id) {
      if($this->_db->delete('suggestion', array('sgs_id', '=', $sgs_id)))
        $this->_db->delete('suggestion_contribute', array('sgs_id', '=', $sgs_id));
    }


  }

 ?>
