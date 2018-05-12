<?php
class ModelToolpinnew extends Model {
	
	public function delete($zip_code_id) {
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "zip_code_new WHERE id = '" . (int)$zip_code_id . "'");
	}

	public function getpins($data) {
		$sql = "SELECT * FROM " . DB_PREFIX . "zip_code_new WHERE 1 ";

		if (!empty($data['filter_zipcode'])) {
			$sql .= " AND pin LIKE '%" . $this->db->escape($data['filter_zipcode']) . "%'";
		}

		if (!empty($data['filter_email'])) {
			$sql .= " AND email LIKE '%" . $this->db->escape($data['filter_email']) . "%'";
		}

		$sql .= " GROUP BY id ";
		$sort_data = array(
			'id',
			'pin',
			'date'
		);	
		
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY id";	
		}
		
		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}
	
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}				

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}	
		
			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}	
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getTotalpins($data) {
		
		$sql = "SELECT * FROM " . DB_PREFIX . "zip_code_new WHERE 1 ";

		if (!empty($data['filter_zipcode'])) {
			$sql .= " AND pin LIKE '%" . $this->db->escape($data['filter_zipcode']) . "%'";
		}
		
		if (!empty($data['filter_email'])) {
			$sql .= " AND email LIKE '%" . $this->db->escape($data['filter_email']) . "%'";
		}

		$sql .= " GROUP BY id ";
		$sort_data = array(
			'id',
			'pin',
			'date'
		);	
		
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY id";	
		}
		
		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}	
		
		$query = $this->db->query($sql);
		
		return $query->num_rows;
	}
}
?>
