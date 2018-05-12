<?php

class Controllerpincodepinnew extends Controller {
	private $error = array();
 
	public function index() {
		$this->load->language('pincode/pinnew');
 
		$this->document->setTitle($this->language->get('heading_title'));
 		
		$this->load->model('pincode/pinnew');
		$this->getList();
	}
	
		
	public function delete() { 
		$this->load->language('pincode/pinnew');

		$this->document->setTitle($this->language->get('heading_title'));		
		
		$this->load->model('pincode/pinnew');
		
		if (isset($this->request->post['selected'])  && $this->validateForm()) {
      		foreach ($this->request->post['selected'] as $zip_code_id) {
				$this->model_pincode_pinnew->delete($zip_code_id);	
			}
						
			$this->session->data['success'] = $this->language->get('text_success');
			
			$url = '';

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			
			$this->response->redirect($this->url->link('pincode/pinnew', 'user_token=' . $this->session->data['user_token'].$url, 'SSL'));
		}

		$this->getList();
	}

	private function getList() {
	
		if (isset($this->request->get['filter_zipcode'])) {
			$filter_zipcode = $this->request->get['filter_zipcode'];
		} else {
			$filter_zipcode = null;
		}

		if (isset($this->request->get['filter_email'])) {
			$filter_email = $this->request->get['filter_email'];
		} else {
			$filter_email = null;
		}


  		$data['breadcrumbs'] = array();

  		$data['breadcrumbs'][] = array(
       		'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
       		'text'      => $this->language->get('text_home'),
      		'separator' => FALSE
   		);

  		$data['breadcrumbs'][] = array(
       		'href'      => $this->url->link('pincode/pinnew', 'user_token=' . $this->session->data['user_token'], 'SSL'),
       		'text'      => $this->language->get('heading_title'),
      		'separator' => ' :: '
   		);
							
		
		$data['delete'] 				= $this->url->link('pincode/pinnew/delete', 'user_token=' . $this->session->data['user_token'], 'SSL');
		
		$data['links'][0]['href']		= $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'], 'SSL');	
		$data['links'][1]['href']		= $this->url->link('pincode/pinsetting', 'user_token=' . $this->session->data['user_token'], 'SSL');	
		$data['links'][5]['href']		= $this->url->link('pincode/pinnew', 'user_token=' . $this->session->data['user_token'], 'SSL');	
		$data['links'][6]['href']		= $this->url->link('pincode/pinimport', 'user_token=' . $this->session->data['user_token'] . '&pagename=zip_zone', 'SSL');	
		$data['links'][0]['text']		= "Postcode Diary";
		$data['links'][1]['text']		= "Postcode Setting";
		$data['links'][5]['text']		= "New Postcodes Found";
		$data['links'][6]['text']		= "Import/Export";
		
		
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'zip_code_id';
		}
		
		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'DESC';
		}
		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
	
		$data['pins'] = array();

		$data1 = array(
			'filter_zipcode'  => $filter_zipcode,
			'filter_email'	  => $filter_email,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit'           => $this->config->get('config_admin_limit')
		);

		$pin_total = $this->model_pincode_pinnew->getTotalpins($data1);
		$results = $this->model_pincode_pinnew->getpins($data1,($page - 1) * $this->config->get('config_admin_limit'),$this->config->get('config_admin_limit'));
		
		foreach ($results as $result) {		

			$data['pins'][] = array(
				'zip_code_id' 		 => $result['id'],
				'zip_code' 	 => $result['pin'],
				'email' 	 => $result['email'],
				'date_added' 	 => $result['date']
				);
		}	
	
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_form'] = $this->language->get('text_form');
		$data['date_added'] = $this->language->get('date_added');
		$data['zip_code'] = $this->language->get('zip_code');
		$data['email'] = $this->language->get('email');
		$data['button_filter'] = $this->language->get('button_filter');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['text_confirm'] = $this->language->get('text_confirm');
		$data['user_token'] = $this->session->data['user_token'];
		
		$url = '';

		if (isset($this->request->get['filter_zipcode'])) {
			$url .= '&filter_zipcode=' . urlencode(html_entity_decode($this->request->get['filter_zipcode'], ENT_QUOTES, 'UTF-8'));
		}
								
		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
 
		$data['sort_zip_code'] = $this->url->link('pincode/pinnew', 'user_token=' . $this->session->data['user_token'] . '&sort=zip_code' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link('pincode/pinnew', 'user_token=' . $this->session->data['user_token'] . '&sort=date_added' . $url, 'SSL');

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
		
		$url = "";
		
		if (isset($this->request->get['filter_zipcode'])) {
			$url .= '&filter_zipcode=' . urlencode(html_entity_decode($this->request->get['filter_zipcode'], ENT_QUOTES, 'UTF-8'));
		}
								
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		
		$pagination = new Pagination();
		$pagination->total = $pin_total;
		$pagination->page  = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url   = $this->url->link('pincode/pinnew/', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();
		$data['results'] = sprintf($this->language->get('text_pagination'), ($pin_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($pin_total - $this->config->get('config_limit_admin'))) ? $pin_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $pin_total, ceil($pin_total / $this->config->get('config_limit_admin')));

		$data['filter_zipcode'] = $filter_zipcode;
		$data['filter_email'] = $filter_email;

		$data['sort'] = $sort;
		$data['order'] = $order;


		$data['sort_name'] = $this->url->link('pincode/pinnew/', 'user_token=' . $this->session->data['user_token']);
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('pincode/pinnew', $data));
 	}


	private function validateForm() {
		
		if (!$this->user->hasPermission('modify', 'pincode/pinnew')) {
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