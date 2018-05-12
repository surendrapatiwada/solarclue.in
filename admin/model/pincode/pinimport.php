<?php
class Modelpincodepinimport extends Model {

	public function bulkAddPins($data) {
		$zipinfo = $this->getDetailsByCode($data['Pincode']);
		if(!$zipinfo) {     
		$this->db->query("INSERT INTO " . DB_PREFIX . "pincode SET pincode='".$data['Pincode']."',Prepaid = '".$this->db->escape($data['Prepaid'])."', `Reverse Pickup` = '".$this->db->escape($data['Reverse Pickup'])."', REPL = '".$this->db->escape($data['REPL'])."', COD = '".$this->db->escape($data['COD'])."', `Dispatch Center` = '".$this->db->escape($data['Dispatch Center'])."', City = '".$this->db->escape($data['City'])."', State = '".$this->db->escape($data['State'])."', `State Code` = '".$this->db->escape($data['State Code'])."', `Sort Code` = '".$this->db->escape($data['Sort Code'])."', `Value Capping` = '".$this->db->escape($data['Value Capping'])."', date_added = NOW()");
		}
	}

	public function getDetailsByCode($code) {
      		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "pincode WHERE pincode = '" . $this->db->escape($code) . "'");
		
		return $query->num_rows;
	}

	public function deletepins() {
		$this->db->query("TRUNCATE TABLE " . DB_PREFIX ."pincode");
	}

	public function delete() {
		$this->db->query("TRUNCATE TABLE " . DB_PREFIX ."pincode");
	}
}
?>