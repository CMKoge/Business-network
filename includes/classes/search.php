<?php
/**
 * Search By Business Service
 * Search By Businees Name
 * Search Whole Site
 * Search With Filters(Main Business Types)
 */
class Search {
  private $_db;

  public function __construct() {
    $this->_db = Database::getInstance();
  }

  public function full_search($keyword, $district) {
    $search = $this->_db->query("SELECT `business`.`biz_id`, `business`.`business_name`,      `business_profile`.`service`
    FROM `business`
    INNER JOIN `business_profile` ON `business`.biz_id = `business_profile`.biz_id
    WHERE (MATCH `business_name` AGAINST ('{$keyword}' IN NATURAL LANGUAGE MODE)
    OR MATCH `description`, `service` AGAINST ('{$keyword}' IN NATURAL LANGUAGE MODE))
    AND `biz_address_district` = '{$district}'");

    return $search;
  }

  public function type_search($keyword, $district, $type) {
    $search = $this->_db->query("SELECT `business`.`biz_id`,`business`.`business_name`, `business_profile`.`description`, `business_profile`.`service`
    FROM ((`business`
    INNER JOIN `{$type}` ON `business`.`biz_id` = `{$type}`.`biz_id`)
    INNER JOIN `business_profile` ON `business`.`biz_id` = `business_profile`.`biz_id`)
    WHERE (MATCH `description`, `service` AGAINST ('{$keyword}' IN NATURAL LANGUAGE MODE)
    OR MATCH `business_name` AGAINST ('{$keyword}' IN NATURAL LANGUAGE MODE))
    AND `biz_address_district` = '{$district}'");

    return $search;
  }

}
 ?>
