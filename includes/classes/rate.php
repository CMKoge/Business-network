<?php
/**
 * 5 Rank Rate System
 * Single Customer Allowd to Give One Rank to Single Business
 * Calculate Average of Rank
 * Display Rate
 */
class Rate {

private $_db;

  public function __construct() {
    $this->_db = Database::getInstance();
  }

  // Create Rank
  private function create_rank($biz_id, $cst_id, $rank) {
    if (in_array($rank, [1,2,3,4,5])) {
      $business = $this->_db->get('business', array('biz_id', '=', $biz_id));
      $customer = $this->_db->get('customer', array('cst_id', '=', $cst_id));
      if ($business->count() && $customer->count()) {
        $this->_db->insert('rate', array(
          'rank' => $rank,
          'date_time' => date('Y-m-d H:i:s'),
          'biz_id' => $biz_id,
          'cst_id' => $cst_id
        ));
      }
    }
    Redirect::locate('../../test_only/test_rate.php');
  }

  // Retrive and Calculate Average Ratings
  public function get_avg_rating() {
    $rating = $this->_db->query(
    "SELECT business.biz_id,  AVG(rate.rank) AS rating
    FROM business
    LEFT JOIN rate
    ON business.biz_id = rate.biz_id
    GROUP BY business.biz_id"
    );

    if($rating) return $rating;
    else throw new \Exception("Error Processing Request", 1);
  }

  // Check Same Customer ID and Business ID in Same Record
  public function is_rating_exists($biz_id, $cst_id, $rank) {
    $exists = $this->_db->query("SELECT * FROM `rate` WHERE `biz_id` = {$biz_id} AND `cst_id` = {$cst_id}");
    if($exists->count())
      $this->_db->query("UPDATE `rate` SET `rank`= {$rank}  WHERE `biz_id` = {$biz_id} AND `cst_id` = {$cst_id}");
    else
      $this->create_rank($biz_id, $cst_id, $rank);
  }

}

 ?>
