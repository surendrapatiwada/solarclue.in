<?php
class ModelToolpinimport extends Model {

	public function bulkAddPins($data) {
		$zipinfo = $this->getDetailsByCode($data['zip_code']);
		if(!$zipinfo) {     
		$this->db->query("INSERT INTO " . DB_PREFIX . "zip_code SET zip_code='".$data['zip_code']."',city_name='".$this->db->escape($data['city_name'])."' , state_name = '".$this->db->escape($data['state_name'])."', zone_name = '".$this->db->escape($data['zone_name'])."', message = '".$this->db->escape($data['message'])."', date_added = NOW()");
		}
	}

	public function getDetailsByCode($code) {
      		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "zip_code WHERE zip_code = '" . $this->db->escape($code) . "'");
		
		return $query->num_rows;
	}

	public function deletepins() {
		$this->db->query("TRUNCATE TABLE " . DB_PREFIX ."zip_code");
	}

	public function delete() {
		$this->db->query("TRUNCATE TABLE " . DB_PREFIX ."zip_code");
	}
}
?>