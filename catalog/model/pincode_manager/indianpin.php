<?php
class ModelToolIndianPin extends Model {
	public function addpin($data) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "zip_code SET zip_code='".$data['pin_code']."',city_name='".$this->db->escape($data['city_name_value'])."' , state_name = '".$this->db->escape($data['state_id'])."', zone_name = '".$this->db->escape($data['zone_id'])."', message = '".$this->db->escape($data['message_id'])."', date_added = NOW()");
			$zip_code_id = $this->db->getLastId();
			if (isset($data['store'])) {
				foreach ($data['store'] as $store_id) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "zip_code_store SET zip_code_id = '" . (int)$zip_code_id . "', store_id = '" . (int)$store_id . "'");
				}
			}
	}

	public function checkpin($zip_code,$zip_code_id) {
		$sql = "SELECT COUNT(zip_code_id) as count FROM " . DB_PREFIX . "zip_code WHERE  zip_code ='".(int)$zip_code."' AND zip_code_id != '".(int)$zip_code_id."'";	
		$query = $this->db->query($sql);
		return $query->row['count'];
	}

	public function checkepin($zip_code) {
		$sql = "SELECT COUNT(zip_code_id) as count FROM " . DB_PREFIX . "zip_code WHERE  zip_code ='".(int)$zip_code."'";	
		$query = $this->db->query($sql);
		return $query->row['count'];
	}
	
	public function editpin($id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "zip_code SET zip_code='".$data['pin_code']."',city_name='".$this->db->escape($data['city_name_value'])."' , state_name = '".$this->db->escape($data['state_id'])."', zone_name = '".$this->db->escape($data['zone_id'])."', message = '".$this->db->escape($data['message_id'])."', date_added = NOW() WHERE zip_code_id = '" . (int)$id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "zip_code_store WHERE zip_code_id = '" . (int)$id . "'");
		if (isset($data['store'])) {
			foreach ($data['store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "zip_code_store SET zip_code_id = '" . (int)$id . "', store_id = '" . (int)$store_id . "'");
			}
		}
	}
	
	public function delete($zip_code_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "zip_code WHERE zip_code_id = '" . (int)$zip_code_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "zip_code_store WHERE zip_code_id = '" . (int)$zip_code_id . "'");
	}
	
	public function getStates() {
		$returnarray = array();
		$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "zip_state");
		foreach ($query->rows as $key => $value) {
			$returnarray[$value['id']] = $value['name'];
		}
		return $returnarray;
	}

	public function getStores($id) {
		$returnarray = array();
		$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "zip_code_store WHERE zip_code_id = '".$id."'");
		foreach ($query->rows as $key => $value) {
			$returnarray[] = $value['store_id'];
		}
		return $returnarray;
	}

	public function getZones() {
		$returnarray = array();
		$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "zip_zone");
		foreach ($query->rows as $key => $value) {
			$returnarray[$value['id']] = $value['name'];
		}
		return $returnarray;
	}

	public function getAvailability() {
		$returnarray = array();
		$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "zip_message");
		foreach ($query->rows as $key => $value) {
			$returnarray[$value['id']] = $value['name'];
		}
		return $returnarray;
	}


	public function getpin($id) {
		$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "zip_code WHERE zip_code_id = '" . (int)$id . "'");

		return $query->row;
	}
	
	public function getpins($data) {
		
		$sql = "SELECT * FROM " . DB_PREFIX . "zip_code z  ";

		if (!empty($data['filter_payment'])) {
			$sql .= " LEFT JOIN " . DB_PREFIX . "zipcode_payment zp ON (z.zip_code = zp.zip_code)";			
		}

		$sql .= " WHERE 1 "; 

		if (!empty($data['filter_zipcode'])) {
			$sql .= " AND z.zip_code LIKE '%" . $this->db->escape($data['filter_zipcode']) . "%'";
		}

		if (!empty($data['filter_cityname'])) {
			$sql .= " AND z.city_name LIKE '%" . $this->db->escape($data['filter_cityname']) . "%'";
		}
		
		if (!empty($data['filter_statename'])) {
			$sql .= " AND z.state_name = '" . $this->db->escape($data['filter_statename']) . "'";
		}
		
		if (!empty($data['filter_zonename'])) {
			$sql .= " AND z.zone_name = '" .  $this->db->escape($data['filter_zonename']) . "'";
		}

		if (!empty($data['filter_message'])) {
			$sql .= " AND z.message = '" . $this->db->escape($data['filter_message']) . "'";
		}
		
		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND z.status = '" . (int)$data['filter_status'] . "'";
		}

		$sql .= " GROUP BY z.zip_code_id ";
		$sort_data = array(
			'zip_code_id',
			'message',
			'zip_code',
			'city_name',
			'state_name',
			'city_name',
			'status',
			'date_added'
		);	
		
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY z." . $data['sort'];	
		} else {
			$sql .= " ORDER BY z.zip_code_id";	
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
		
		$sql = "SELECT * FROM " . DB_PREFIX . "zip_code z  ";

		if (!empty($data['filter_payment'])) {
			$sql .= " LEFT JOIN " . DB_PREFIX . "zipcode_payment zp ON (z.zip_code = zp.zip_code)";			
		}

		$sql .= " WHERE 1 "; 

		if (!empty($data['filter_zipcode'])) {
			$sql .= " AND z.zip_code LIKE '%" . $this->db->escape($data['filter_zipcode']) . "%'";
		}

		if (!empty($data['filter_cityname'])) {
			$sql .= " AND z.city_name LIKE '%" . $this->db->escape($data['filter_cityname']) . "%'";
		}
		
		if (!empty($data['filter_statename'])) {
			$sql .= " AND z.state_name = '" . $this->db->escape($data['filter_statename']) . "'";
		}
		
		if (!empty($data['filter_zonename'])) {
			$sql .= " AND z.zone_name = '" .  $this->db->escape($data['filter_zonename']) . "'";
		}

		if (!empty($data['filter_message'])) {
			$sql .= " AND z.message = '" . $this->db->escape($data['filter_message']) . "'";
		}
		
		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND z.status = '" . (int)$data['filter_status'] . "'";
		}
		
		$query = $this->db->query($sql);
		
		return $query->num_rows;
	}

	public function addindianpins() {

       if ($this->db->query("SHOW TABLES LIKE '". DB_PREFIX ."zip_code_new'")->num_rows == 0) {
            $sql = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "zip_code_new` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
					  `pin` varchar(255) NOT NULL,
					  `date` datetime NOT NULL,
					  PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
           $this->db->query($sql);
       }

	    $result =  $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "zip_code_new` LIKE  'email'")->num_rows;
	     if(!$result) {
	      	$this->db->query("ALTER TABLE  `". DB_PREFIX ."zip_code_new` ADD  `email`varchar(255) NOT NULL AFTER  `pin`");
	    }
	  
	  if ($this->db->query("SHOW TABLES LIKE '". DB_PREFIX ."zip_code'")->num_rows == 0) {
            $sql = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "zip_code` (
				  `zip_code_id` int(11) NOT NULL AUTO_INCREMENT,
				  `message` varchar(255) NOT NULL,
				  `zip_code` varchar(255) NOT NULL,
				  `city_name` varchar(255) NOT NULL,
				  `state_name` varchar(255) NOT NULL,
				  `zone_name` varchar(255) NOT NULL,
				  `status` tinyint(1) NOT NULL DEFAULT '1',
				  `date_added` datetime NOT NULL,
				  PRIMARY KEY (`zip_code_id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3716";
            $this->db->query($sql);          
        }

         if ($this->db->query("SHOW TABLES LIKE '". DB_PREFIX ."zip_code_store'")->num_rows == 0) {
            $sql = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "zip_code_store` (
				  `zip_code_id` int(11) NOT NULL,
				  `store_id`int(11) NOT NULL
				) ENGINE=InnoDB  DEFAULT CHARSET=latin1";
            $this->db->query($sql);          
        }

	    if ($this->db->query("SHOW TABLES LIKE '". DB_PREFIX ."pinsetting'")->num_rows == 0) {
            $sql = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "pinsetting` (
                       `lang_id` int(11) NOT NULL,
                       `theme` varchar(11) NOT NULL,
                       `type` int(11) NOT NULL,
					  `message` varchar(256) NOT NULL,
					  `header` varchar(256) NOT NULL,
					   `fail` varchar(256) NOT NULL
					) ENGINE=MyISAM COLLATE=utf8_general_ci;";
            $this->db->query($sql);
             @mail('cartbinder@gmail.com','Postcode Popup 2.x Installed',HTTP_CATALOG .'  -  '.$this->config->get('config_name')."\r\n mail: ".$this->config->get('config_email')."\r\n".'version-'.VERSION."\r\n".'WebIP - '.$_SERVER['SERVER_ADDR']."\r\n IP: ".$this->request->server['REMOTE_ADDR'],'MIME-Version:1.0'."\r\n".'Content-type:text/plain;charset=UTF-8'."\r\n".'From:'.$this->config->get('config_owner').'<'.$this->config->get('config_email').'>'."\r\n");
        }
	}
}
?>