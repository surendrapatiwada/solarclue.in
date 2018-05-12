<?php
class ModelpincodeIndianPin extends Model {
	public function addpin($data) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "pincode SET pincode='".$data['pincode']."',Prepaid = '".$this->db->escape($data['prepaid'])."', `Reverse Pickup` = '".$this->db->escape($data['reverse_pickup'])."', REPL = '".$this->db->escape($data['repl'])."', COD = '".$this->db->escape($data['cod'])."', `Dispatch Center` = '".$this->db->escape($data['dispatch_center'])."', City = '".$this->db->escape($data['city'])."', State = '".$this->db->escape($data['state'])."', `State Code` = '".$this->db->escape($data['state_code'])."', `Sort Code` = '".$this->db->escape($data['sort_code'])."', `Value Capping` = '".$this->db->escape($data['value_capping'])."', date_added = NOW()");
			//$zip_code_id = $this->db->getLastId();
			/*if (isset($data['store'])) {
				foreach ($data['store'] as $store_id) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "zip_code_store SET zip_code_id = '" . (int)$zip_code_id . "', store_id = '" . (int)$store_id . "'");
				}
			}*/
	}

	public function checkpin($pincode) {
		$sql = "SELECT COUNT(pincode) as count FROM " . DB_PREFIX . "pincode WHERE  pincode ='".(int)$pincode."'";	
		$query = $this->db->query($sql);
		return $query->row['count'];
	}

	public function checkepin($zip_code) {
		$sql = "SELECT COUNT(pincode_id) as count FROM " . DB_PREFIX . "pincode WHERE  pincode ='".(int)$zip_code."'";	
		$query = $this->db->query($sql);
		return $query->row['count'];
	}
	
	public function editpin($id, $data) {
		//$this->db->query("UPDATE " . DB_PREFIX . "zip_code SET zip_code='".$data['pin_code']."',city_name='".$this->db->escape($data['city_name_value'])."' , state_name = '".$this->db->escape($data['state_id'])."', zone_name = '".$this->db->escape($data['zone_id'])."', message = '".$this->db->escape($data['message_id'])."', date_added = NOW() WHERE zip_code_id = '" . (int)$id . "'");
		$this->db->query("UPDATE " . DB_PREFIX . "pincode SET pincode='".$data['pincode']."',Prepaid = '".$this->db->escape($data['prepaid'])."', `Reverse Pickup` = '".$this->db->escape($data['reverse_pickup'])."', REPL = '".$this->db->escape($data['repl'])."', COD = '".$this->db->escape($data['cod'])."', `Dispatch Center` = '".$this->db->escape($data['dispatch_center'])."', City = '".$this->db->escape($data['city'])."', State = '".$this->db->escape($data['state'])."', `State Code` = '".$this->db->escape($data['state_code'])."', `Sort Code` = '".$this->db->escape($data['sort_code'])."', `Value Capping` = '".$this->db->escape($data['value_capping'])."', date_added = NOW() WHERE pincode_id = '" . (int)$id . "'");
		/*$this->db->query("DELETE FROM " . DB_PREFIX . "zip_code_store WHERE zip_code_id = '" . (int)$id . "'");
		if (isset($data['store'])) {
			foreach ($data['store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "zip_code_store SET zip_code_id = '" . (int)$id . "', store_id = '" . (int)$store_id . "'");
			}
		}*/
	}
	
	public function delete($pincode) {
		$this->db->query("DELETE  FROM " . DB_PREFIX . "pincode WHERE pincode = '" . (int)$pincode . "'");
		//$this->db->query("DELETE FROM " . DB_PREFIX . "zip_code_store WHERE zip_code_id = '" . (int)$zip_code_id . "'");
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
		$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "pincode_store WHERE pincode_id = '".$id."'");
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
		$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "pincode WHERE pincode_id = '" . (int)$id . "'");

		return $query->row;
	}
	
	public function getpincodes() {
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "pincode ");
		return $query->row;
		
	}	
	
	public function getpins($data) {
		
		$sql = "SELECT * FROM " . DB_PREFIX . "pincode  p";

		$sql .= " WHERE 1 "; 

		if (!empty($data['filter_pincode'])) {
			$sql .= " AND p.pincode LIKE '%" . $this->db->escape($data['filter_pincode']) . "%'";
		}

		if (!empty($data['filter_prepaid'])) {
			$sql .= " AND p.Prepaid LIKE '%" . $this->db->escape($data['filter_prepaid']) . "%'";
		}
		
		if (!empty($data['filter_reverse_pickup'])) {
			$sql .= " AND p.`Reverse Pickup` = '" . $this->db->escape($data['filter_reverse_pickup']) . "'";
		}
		
		if (!empty($data['filter_repl'])) {
			$sql .= " AND p.REPL = '" .  $this->db->escape($data['filter_repl']) . "'";
		}

		if (!empty($data['filter_cod'])) {
			$sql .= " AND p.COD = '" . $this->db->escape($data['filter_cod']) . "'";
		}
		
		if (!empty($data['filter_dispatch_center'])) {
			$sql .= " AND p.`Dispatch Center` = '" . $this->db->escape($data['filter_dispatch_center']) . "'";
		}
		
		if (!empty($data['filter_city'])) {
			$sql .= " AND p.City = '" . $this->db->escape($data['filter_city']) . "'";
		}
		
		if (!empty($data['filter_state'])) {
			$sql .= " AND p.State = '" . $this->db->escape($data['filter_state']) . "'";
		}
		
		if (!empty($data['filter_state_code'])) {
			$sql .= " AND p.`State Code` = '" . $this->db->escape($data['filter_state_code']) . "'";
		}
		
		if (!empty($data['filter_sort_code'])) {
			$sql .= " AND p.`Sort Code` = '" . $this->db->escape($data['filter_sort_code']) . "'";
		}
		
		if (!empty($data['filter_value_capping'])) {
			$sql .= " AND p.`Value Capping` = '" . $this->db->escape($data['filter_value_capping']) . "'";
		}

		$sql .= " GROUP BY p.pincode_id ";
		/*$sort_data = array(
			'pincode_id',
			'pincode',
			'prepaid',
			'reverse_pickup',
			'repl',
			'cod',
			'dispatch_center',
			'city',
			'state',
			'state_code',
			'sort_code',
			's',
			'date_added'
		);	
		
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY p." . $data['sort'];	
		} else {
			
		}*/
		$sql .= " ORDER BY p.pincode_id";	
		
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
		
		$sql = "SELECT * FROM " . DB_PREFIX . "pincode p  ";

		$sql .= " WHERE 1 "; 

		if (!empty($data['filter_pincode'])) {
			$sql .= " AND p.pincode LIKE '%" . $this->db->escape($data['filter_pincode']) . "%'";
		}

		if (!empty($data['filter_prepaid'])) {
			$sql .= " AND p.Prepaid LIKE '%" . $this->db->escape($data['filter_prepaid']) . "%'";
		}
		
		if (!empty($data['filter_reverse_pickup'])) {
			$sql .= " AND p.`Reverse Pickup` = '" . $this->db->escape($data['filter_reverse_pickup']) . "'";
		}
		
		if (!empty($data['filter_repl'])) {
			$sql .= " AND p.REPL = '" .  $this->db->escape($data['filter_repl']) . "'";
		}

		if (!empty($data['filter_cod'])) {
			$sql .= " AND p.COD = '" . $this->db->escape($data['filter_cod']) . "'";
		}
		
		if (!empty($data['filter_dispatch_center'])) {
			$sql .= " AND p.`Dispatch Center` = '" . $this->db->escape($data['filter_dispatch_center']) . "'";
		}
		
		if (!empty($data['filter_city'])) {
			$sql .= " AND p.City = '" . $this->db->escape($data['filter_city']) . "'";
		}
		
		if (!empty($data['filter_state'])) {
			$sql .= " AND p.State = '" . $this->db->escape($data['filter_state']) . "'";
		}
		
		if (!empty($data['filter_state_code'])) {
			$sql .= " AND p.`State Code` = '" . $this->db->escape($data['filter_state_code']) . "'";
		}
		
		if (!empty($data['filter_sort_code'])) {
			$sql .= " AND p.`Sort Code` = '" . $this->db->escape($data['filter_sort_code']) . "'";
		}
		
		if (!empty($data['filter_value_capping'])) {
			$sql .= " AND p.`Value Capping` = '" . $this->db->escape($data['filter_value_capping']) . "'";
		}
		
		$query = $this->db->query($sql);
		
		return $query->num_rows;
	}

	/*public function addindianpins() {

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
	}*/
}
?>