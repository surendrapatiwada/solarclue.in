<?php
	class ModelAccountOtpValidation extends Model {
		public function validate($input_otp) {	
			$query = $this->db->query("SELECT id FROM otp WHERE value=='".(int)$input_otp."'");

		return $query->row;
		}
	}
?>