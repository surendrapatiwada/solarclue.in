<?php
 
class Controllerpincodepinsetting extends Controller { 
	private $error = array();
	
	public function index() {		
		$this->load->language('pincode/pinsetting');
		$this->load->model('pincode/pinsetting');
		$this->load->model('setting/setting');
		//$this->load->model('pincode/image');
		
		$this->model_pincode_pinsetting->createTablesInDatabse();
		$this->document->setTitle($this->language->get('heading_title'));
				
		if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
			
			$temp['imdev_config_pinzone'] =  $this->request->post['imdev_config_pinzone'];
			$temp['imdev_config_pinstate'] =  $this->request->post['imdev_config_pinstate'];
			$temp['imdev_config_pincity'] =  $this->request->post['imdev_config_pincity'];
			$temp['imdev_config_pinemail'] =  $this->request->post['imdev_config_pinemail'];
			$temp['imdev_config_postcodepopup'] =  $this->request->post['imdev_config_postcodepopup'];
 			$this->model_setting_setting->editSetting('imdev', $temp);
			$this->model_pincode_pinsetting->adddata($this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
		}

		$data['heading_title'] = $this->language->get('heading_title');
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_pinsetting_extent'] = $this->language->get('text_pinsetting_extent');
		$data['text_register_status'] = $this->language->get('text_register_status');
        $data['text_product_status'] = $this->language->get('text_product_status');
        $data['text_popup_status'] = $this->language->get('text_popup_status');
		$data['text_theme'] = $this->language->get('text_theme');
		$data['text_font'] = $this->language->get('text_font');
		$data['text_message'] = $this->language->get('text_message');
		$data['text_delivery'] = $this->language->get('text_delivery');
		$data['text_payment'] = $this->language->get('text_payment');
		$data['text_header'] = $this->language->get('text_header');
		$data['text_email'] = $this->language->get('text_email');
		$data['text_fail'] = $this->language->get('text_fail');
		$data['text_state'] = $this->language->get('text_state');
		$data['text_zone'] = $this->language->get('text_zone');
		$data['text_city'] = $this->language->get('text_city');
		$data['text_list'] = $this->language->get('text_list');
		$data['text_type'] = $this->language->get('text_type');
		$data['help_mail'] = $this->language->get('help_mail');
		$data['text_mail'] = $this->language->get('text_mail');
		$data['help_theme'] = $this->language->get('help_theme');
		$data['help_font'] = $this->language->get('help_font');
		$data['help_message'] = $this->language->get('help_message');
		$data['help_register_status'] = $this->language->get('help_register_status');
		$data['help_product_status'] = $this->language->get('help_product_status');
		$data['help_popup_status'] = $this->language->get('help_popup_status');
		$data['help_header'] = $this->language->get('help_header');
		$data['help_fail'] = $this->language->get('help_fail');
		$data['help_delivery'] = $this->language->get('help_delivery');
		$data['help_payment'] = $this->language->get('help_payment');
		$data['help_state'] = $this->language->get('help_state');
		$data['help_zone'] = $this->language->get('help_zone');
		$data['help_city'] = $this->language->get('help_city');
		$data['user_token'] = $this->session->data['user_token'];

		$data['languages'] = $this->model_pincode_pinsetting->getLanguages();
		
		$data['action'] = $this->url->link('pincode/pinsetting', 'user_token=' . $this->session->data['user_token'], 'SSL');
		$data['cancel'] = $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL');

		if(isset($this->request->post['dynamic'])) {
			$data['dynamic'] = $this->request->post['dynamic'];
		} else {
			$data['dynamic'] = $this->model_pincode_pinsetting->getdatad();
		}
		
		foreach ($data['languages'] as $key => $value) {	
			if(!isset($data['dynamic'][$value['language_id']])) {
				$data['dynamic'][$value['language_id']]['theme']  = '#efefef';
				$data['dynamic'][$value['language_id']]['message']  = 'Enter Pincode';
				$data['dynamic'][$value['language_id']]['header']  = 'Check delivery at your pincode';
				$data['dynamic'][$value['language_id']]['email']  = 'Submit you email address. We will update when we deliver to your postcode.';
				$data['dynamic'][$value['language_id']]['fail']  = 'Sorry delivery is not available at your pincode';
				$data['dynamic'][$value['language_id']]['font']  = '#fff';
			}
		}

		if (isset($this->request->post['imdev_config_pincity'])) {
			$data['imdev_config_pincity'] = $this->request->post['imdev_config_pincity'];
		} else  {
			$data['imdev_config_pincity'] = $this->config->get('imdev_config_pincity');
		}
		
		if (isset($this->request->post['imdev_config_pinzone'])) {
			$data['imdev_config_pinzone'] = $this->request->post['imdev_config_pinzone'];
		} else {
			$data['imdev_config_pinzone'] = $this->config->get('imdev_config_pinzone');
		}

		if (isset($this->request->post['imdev_config_pinstate'])) {
			$data['imdev_config_pinstate'] = $this->request->post['imdev_config_pinstate'];
		} else {
			$data['imdev_config_pinstate'] = $this->config->get('imdev_config_pinstate');
		}


		if (isset($this->request->post['imdev_config_pinemail'])) {
			$data['imdev_config_pinemail'] = $this->request->post['imdev_config_pinemail'];
		} else {
			$data['imdev_config_pinemail'] = $this->config->get('imdev_config_pinemail');
		}
		
		if (isset($this->request->post['imdev_config_postcodepopup'])) {
			$data['imdev_config_postcodepopup'] = $this->request->post['imdev_config_postcodepopup'];
		} else {
			$data['imdev_config_postcodepopup'] = $this->config->get('imdev_config_postcodepopup');
		}
		
		

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),     		
      		'separator' => false
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('pincode/pinsetting', 'user_token=' . $this->session->data['user_token'], 'SSL'),
      		'separator' => ' :: '
   		);

		$data['links'][0]['href']		= $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'], 'SSL');	
		$data['links'][1]['href']		= $this->url->link('pincode/pinsetting', 'user_token=' . $this->session->data['user_token'], 'SSL');	
		$data['links'][5]['href']		= $this->url->link('pincode/pinnew', 'user_token=' . $this->session->data['user_token'], 'SSL');	
		$data['links'][6]['href']		= $this->url->link('pincode/pinimport', 'user_token=' . $this->session->data['user_token'] . '&pagename=zip_zone', 'SSL');	
		$data['links'][0]['text']		= "Postcode Diary";
		$data['links'][1]['text']		= "Postcode Setting";
		$data['links'][5]['text']		= "New Postcodes Found";
		$data['links'][6]['text']		= "Import/Export";
				
			$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('pincode/pinsetting', $data));
	}

	private function validateForm() {
		
		$this->load->model('pincode/pinsetting');
		
		if (!$this->user->hasPermission('modify', 'pincode/pinsetting')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}
?>