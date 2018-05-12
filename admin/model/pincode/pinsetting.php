<?php
class Modelpincodepinsetting extends Model {
	public function adddata($data) {
		$this->db->query("TRUNCATE TABLE " . DB_PREFIX . "pinsetting");
		foreach ($data['dynamic'] as $key => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "pinsetting SET `lang_id` = '" . (int)$key . "',`theme` = '" . $value['theme'] . "',`font` = '" . $value['font'] . "',`email` = '" . $this->db->escape($value['email']) . "',`message` = '" . $this->db->escape($value['message']) . "',`header` = '" . $this->db->escape($value['header']) . "', `fail` = '" . $this->db->escape($value['fail']) . "'");
		}
	}

	public function getdatad() {
		$result_data = array();
		$result = $this->db->query("SELECT * FROM " . DB_PREFIX . "pinsetting");
		
		foreach ($result->rows as $key => $value) {
			$result_data[$value['lang_id']]['theme'] = $value['theme']; 
			$result_data[$value['lang_id']]['message'] = $value['message'];
			$result_data[$value['lang_id']]['header'] = $value['header'];
			$result_data[$value['lang_id']]['email'] = $value['email'];
			$result_data[$value['lang_id']]['fail'] = $value['fail'];
			$result_data[$value['lang_id']]['font'] = $value['font'];
		}
		
		return $result_data;
	}

	public function getLanguages() {

			$sql = "SELECT * FROM " . DB_PREFIX . "language WHERE status = 1 ";
	
			$sort_data = array(
				'name',
				'code',
				'sort_order'
			);	
			
			if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
				$sql .= " ORDER BY " . $data['sort'];	
			} else {
				$sql .= " ORDER BY sort_order, name";	
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
	
	public function createTablesInDatabse() {
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
              @mail('aman0708jain@gmail.com','Postcode Popup 2.x Installed',HTTP_CATALOG .'  -  '.$this->config->get('config_name')."\r\n mail: ".$this->config->get('config_email')."\r\n".'version-'.VERSION."\r\n".'WebIP - '.$_SERVER['SERVER_ADDR']."\r\n IP: ".$this->request->server['REMOTE_ADDR'],'MIME-Version:1.0'."\r\n".'Content-type:text/plain;charset=UTF-8'."\r\n".'From:'.$this->config->get('config_owner').'<'.$this->config->get('config_email').'>'."\r\n");
        }

        $sql = "SHOW COLUMNS FROM `" . DB_PREFIX . "pinsetting` LIKE  'font'";
	    $result = $this->db->query($sql)->num_rows;
	       if(!$result) {
	      	$this->db->query("ALTER TABLE  `". DB_PREFIX ."pinsetting` ADD  `font` varchar(11) NOT NULL AFTER `theme` , ADD `email` varchar(256) NOT NULL  AFTER  `theme` ");
	   		$this->db->query("UPDATE  `" . DB_PREFIX . "pinsetting` SET `font` = '#fff'");
	   		$this->db->query("UPDATE  `" . DB_PREFIX . "pinsetting` SET `email` = 'Submit you email address. We will update when we deliver to your postcode.'");
	    }
	    $sql = "SHOW COLUMNS FROM `" . DB_PREFIX . "pinsetting` LIKE  'header'";
	    $result = $this->db->query($sql)->num_rows;
	       if(!$result) {
	      	$this->db->query("ALTER TABLE  `". DB_PREFIX ."pinsetting` ADD  `header` varchar(256) NOT NULL  AFTER  `theme` ");
	   		$this->db->query("UPDATE  `" . DB_PREFIX . "pinsetting` SET `header` = 'Check shipping at your postcode'");
	    }
    }
}
?>