<?php
class Controllerpincodeindianpin extends Controller {
	private $error = array();
 
	public function index() {
		$this->load->language('pincode/indianpin');
 
		$this->document->setTitle($this->language->get('heading_title'));
 		
		$this->load->model('pincode/indianpin');
		//$this->model_pincode_indianpin->addindianpins();
		$this->getList();
	}

	public function insert() {
		$this->load->language('pincode/indianpin');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('pincode/indianpin');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateEForm()) {
			$this->model_pincode_indianpin->addpin($this->request->post);
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
			
			$this->response->redirect($this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'].$url, 'SSL'));
		}

		$this->getForm();
	}

	public function update() {
		$this->load->language('pincode/indianpin');

		$this->document->setTitle($this->language->get('heading_title'));		
		
		$this->load->model('pincode/indianpin');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_pincode_indianpin->editpin($this->request->get['pincode_id'], $this->request->post);
			
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
			
			$this->response->redirect($this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'].$url, 'SSL'));
		}

		$this->getForm();
	}
		
	public function delete() { 
		$this->load->language('pincode/indianpin');

		$this->document->setTitle($this->language->get('heading_title'));		
		
		$this->load->model('pincode/indianpin');
		
		if (isset($this->request->post['selected']) && $this->validateForm()) {
      		foreach ($this->request->post['selected'] as $filter_pincode) {
				$this->model_pincode_indianpin->delete($filter_pincode);	
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
			
			$this->response->redirect($this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'].$url, 'SSL'));
		}

		$this->getList();
	}

	private function getList() {
		
		if (isset($this->request->get['filter_pincode'])) {
			$filter_pincode = $this->request->get['filter_pincode'];
		} else {
			$filter_pincode = null;
		}

		if (isset($this->request->get['filter_prepaid'])) {
			$filter_prepaid = $this->request->get['filter_prepaid'];
		} else {
			$filter_prepaid = null;
		}
		
		if (isset($this->request->get['filter_reverse_pickup'])) {
			$filter_reverse_pickup = $this->request->get['filter_reverse_pickup'];
		} else {
			$filter_reverse_pickup = null;
		}

		if (isset($this->request->get['filter_repl'])) {
			$filter_repl = $this->request->get['filter_repl'];
		} else {
			$filter_repl = null;
		}

		if (isset($this->request->get['filter_cod'])) {
			$filter_cod = $this->request->get['filter_cod'];
		} else {
			$filter_cod = null;
		}
		
		if (isset($this->request->get['filter_dispatch_center'])) {
			$filter_dispatch_center = $this->request->get['filter_dispatch_center'];
		} else {
			$filter_dispatch_center = null;
		}
		
		if (isset($this->request->get['filter_city'])) {
			$filter_city = $this->request->get['filter_city'];
		} else {
			$filter_city = null;
		}
		
		if (isset($this->request->get['filter_state'])) {
			$filter_state = $this->request->get['filter_state'];
		} else {
			$filter_state = null;
		}
		
		if (isset($this->request->get['filter_state_code'])) {
			$filter_state_code = $this->request->get['filter_state_code'];
		} else {
			$filter_state_code = null;
		}
		
		if (isset($this->request->get['filter_sort_code'])) {
			$filter_sort_code = $this->request->get['filter_sort_code'];
		} else {
			$filter_sort_code = null;
		}

		if (isset($this->request->get['filter_value_capping'])) {
			$filter_value_capping = $this->request->get['filter_value_capping'];
		} else {
			$filter_value_capping = null;
		}

  		$data['breadcrumbs'][] = array(
       		'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], true),
       		'text'      => $this->language->get('text_home'),
      		'separator' => FALSE
   		);

  		$data['breadcrumbs'][] = array(
       		'href'      => $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'], 'SSL'),
       		'text'      => $this->language->get('heading_title'),
      		'separator' => ' :: '
   		);
		
		$data['insert'] 	= $this->url->link('pincode/indianpin/insert', 'user_token=' . $this->session->data['user_token'], 'SSL');
		$data['delete'] 	= $this->url->link('pincode/indianpin/delete', 'user_token=' . $this->session->data['user_token'], 'SSL');
		
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'pincode_id';
		}
		
		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}
		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
		
		$data1 = array(
			'filter_pincode'	      => $filter_pincode, 
			'filter_prepaid'	      => $filter_prepaid,
			'filter_reverse_pickup'	  => $filter_reverse_pickup,
			'filter_repl'             => $filter_repl,
			'filter_cod'              => $filter_cod,
			'filter_dispatch_center'  => $filter_dispatch_center,
			'filter_city'             => $filter_city,
			'filter_state'            => $filter_state,
			'filter_state_code'       => $filter_state_code,
			'filter_sort_code'        => $filter_sort_code,
			'filter_value_capping'    => $filter_value_capping,
			'sort'                    => $sort,
			'order'                   => $order,
			'start'                   => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'                   => $this->config->get('config_limit_admin')
		);
		
		$pin_total = $this->model_pincode_indianpin->getTotalpins($data1);
		$results = $this->model_pincode_indianpin->getpins($data1,($page - 1) * $this->config->get('config_limit_admin'),$this->config->get('config_limit_admin'));
		$data['pins'] = array();
		foreach ($results as $result) {
			$action = array();
			
			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('pincode/indianpin/update', 'user_token=' . $this->session->data['user_token'] . '&pincode_id=' . $result['pincode_id'], 'SSL')
			);		

			$data['pins'][] = array(
				'pincode' 				=> $result['pincode'],
				'prepaid' 		 		=> $result['Prepaid'],
				'reverse_pickup' 	 	=> $result['Reverse Pickup'],
				'repl' 					=> $result['REPL'],
				'cod' 	 				=> $result['COD'],
				'dispatch_center' 	 	=> $result['Dispatch Center'],
				'city' 	 				=> $result['City'],
				'state' 				=> $result['State'],
				'state_code' 	 		=> $result['State Code'],
				'sort_code' 	 		=> $result['Sort Code'],
				'value_capping' 	    => $result['Value Capping'],
				'action'    			=> $action
			);
		}	
	
		$data['heading_title'] 		= $this->language->get('heading_title');
		
		$data['text_no_results']	= $this->language->get('text_no_results');

		$data['date_added'] 		= $this->language->get('date_added');
		$data['status'] 			= $this->language->get('status');
		$data['zone_name'] 			= $this->language->get('zone_name');
		$data['message'] 			= $this->language->get('message');
		$data['pincode'] 			= $this->language->get('pincode');
		$data['prepaid'] 			= $this->language->get('prepaid');
		$data['reverse_pickup'] 	= $this->language->get('reverse_pickup');
		$data['repl'] 				= $this->language->get('repl');
		$data['cod'] 				= $this->language->get('cod');
		$data['dispatch_center'] 	= $this->language->get('dispatch_center');
		$data['city'] 				= $this->language->get('city');
		$data['state'] 				= $this->language->get('state');
		$data['state_code'] 		= $this->language->get('state_code');
		$data['sort_code'] 			= $this->language->get('sort_code');
		$data['city_name'] 			= $this->language->get('city_name');
		$data['state_name'] 		= $this->language->get('state_name');

		$data['text_enabled'] 		= $this->language->get('text_enabled');		
		$data['text_disabled'] 		= $this->language->get('text_disabled');
		$data['text_confirm'] 		= $this->language->get('text_confirm');
		$data['text_list'] 			= $this->language->get('text_list');
		$data['button_filter'] 		= $this->language->get('button_filter');
		
		$data['column_action'] 		= $this->language->get('column_action');

		$data['button_insert'] 		= $this->language->get('button_insert');
		$data['button_delete'] 		= $this->language->get('button_delete');
		$data['user_token'] 		= $this->session->data['user_token'];
		
		$url = '';

		if (isset($this->request->get['filter_pincode'])) {
			$url .= '&filter_pincode=' . urlencode(html_entity_decode($this->request->get['filter_pincode'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_prepaid'])) {
			$url .= '&filter_prepaid=' . urlencode(html_entity_decode($this->request->get['filter_prepaid'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_reverse_pickup'])) {
			$url .= '&filter_reverse_pickup=' . urlencode(html_entity_decode($this->request->get['filter_reverse_pickup'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_repl'])) {
			$url .= '&filter_repl=' . urlencode(html_entity_decode($this->request->get['filter_repl'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_cod'])) {
			$url .= '&filter_cod=' . urlencode(html_entity_decode($this->request->get['filter_cod'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_dispatch_center'])) {
			$url .= '&filter_dispatch_center=' . urlencode(html_entity_decode($this->request->get['filter_dispatch_center'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_city'])) {
			$url .= '&filter_city=' . urlencode(html_entity_decode($this->request->get['filter_city'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_state'])) {
			$url .= '&filter_state=' . urlencode(html_entity_decode($this->request->get['filter_state'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_state_code'])) {
			$url .= '&filter_state_code=' . urlencode(html_entity_decode($this->request->get['filter_state_code'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_sort_code'])) {
			$url .= '&filter_sort_code=' . urlencode(html_entity_decode($this->request->get['filter_sort_code'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_value_capping'])) {
			$url .= '&filter_value_capping=' . urlencode(html_entity_decode($this->request->get['filter_value_capping'], ENT_QUOTES, 'UTF-8'));
		}
								
		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
 
		$data['sort_pincode'] 			= $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'] . '&sort=pincode' . $url, 'SSL');
		$data['sort_prepaid'] 			= $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'] . '&sort=prepaid' . $url, 'SSL');
		$data['sort_reverse_pickup'] 	= $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'] . '&sort=reverse_pickup' . $url, 'SSL');
		$data['sort_repl'] 				= $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'] . '&sort=repl' . $url, 'SSL');
		$data['sort_cod'] 				= $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'] . '&sort=cod' . $url, 'SSL');
		$data['sort_dispatch_center']   = $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'] . '&sort=dispatch_center' . $url, 'SSL');
		$data['sort_city'] 				= $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'] . '&sort=city' . $url, 'SSL');
		$data['sort_state'] 			= $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'] . '&sort=state' . $url, 'SSL');
		$data['sort_state_code'] 		= $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'] . '&sort=state_code' . $url, 'SSL');
		$data['sort_sort_code'] 		= $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'] . '&sort=sort_code' . $url, 'SSL');
		$data['sort_value_capping'] 	= $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'] . '&sort=value_capping' . $url, 'SSL');

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
		
		$pagination = new Pagination();
		$pagination->total = $pin_total;
		$pagination->page  = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url   = $this->url->link('pincode/indianpin/', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();
		$data['results'] = sprintf($this->language->get('text_pagination'), ($pin_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($pin_total - $this->config->get('config_limit_admin'))) ? $pin_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $pin_total, ceil($pin_total / $this->config->get('config_limit_admin')));

		$data['filter_pincode']    		  = $filter_pincode;
		$data['filter_prepaid']   		  = $filter_prepaid;
		$data['filter_reverse_pickup']    = $filter_reverse_pickup;
		$data['filter_repl'] 			  = $filter_repl;
		$data['filter_cod']  			  = $filter_cod;
		$data['filter_dispatch_center']   = $filter_dispatch_center;
		$data['filter_city']      		  = $filter_city;
		$data['filter_state']    		  = $filter_state;
		$data['filter_state_code']	   	  = $filter_state_code;
		$data['filter_sort_code'] 		  = $filter_sort_code;
		$data['filter_value_capping']     = $filter_value_capping;
		
		$data['sort'] = $sort;
		$data['order'] = $order;


		$data['sort_name'] = $this->url->link('pincode/indianpin/', 'user_token=' . $this->session->data['user_token']);
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('pincode/indianpin_list', $data));
 	}

	private function getForm() {
		$url = '';
		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['date_added'] 		= $this->language->get('date_added');
		$data['status'] 			= $this->language->get('status');
		$data['zone_name'] 			= $this->language->get('zone_name');
		$data['message'] 			= $this->language->get('message');
		$data['zip_code'] 			= $this->language->get('zip_code');
		$data['text_pincode'] 			= $this->language->get('pincode');
		$data['text_prepaid'] 			= $this->language->get('prepaid');
		$data['text_reverse_pickup'] 	= $this->language->get('reverse_pickup');
		$data['text_repl'] 				= $this->language->get('repl');
		$data['text_cod'] 				= $this->language->get('cod');
		$data['text_dispatch_center'] 	= $this->language->get('dispatch_center');
		$data['text_city'] 				= $this->language->get('city');
		$data['text_state'] 				= $this->language->get('state');
		$data['text_state_code'] 		= $this->language->get('state_code');
		$data['text_sort_code'] 			= $this->language->get('sort_code');
		$data['text_value_capping'] 	= $this->language->get('value_capping');
		$data['city_name'] 			= $this->language->get('city_name');
		$data['state_name']			= $this->language->get('state_name');
		
		$data['user_token'] 		= $this->session->data['user_token'];
		$data['text_default'] 		= $this->language->get('text_default');
		$data['text_form'] 			= $this->language->get('text_form');
		
		$data['button_save'] 		= $this->language->get('button_save');
		$data['button_cancel'] 		= $this->language->get('button_cancel');
		$data['text_enabled'] 		= $this->language->get('text_enabled');		
		$data['text_disabled'] 		= $this->language->get('text_disabled');

		$data['tab_general'] 		= $this->language->get('tab_general');

 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
	
  		$data['breadcrumbs'] = array();

  		$data['breadcrumbs'][] = array(
       		'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
       		'text'      => $this->language->get('text_home'),
      		'separator' => FALSE
   		);

  		$data['breadcrumbs'][] = array(
       		'href'      => $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'], 'SSL'),
       		'text'      => $this->language->get('heading_title'),
      		'separator' => ' :: '
   		);
			
		if (!isset($this->request->get['pincode_id'])) {
			$data['action'] = $this->url->link('pincode/indianpin/insert', 'user_token=' . $this->session->data['user_token'], 'SSL');
		} else {
			$data['action'] = $this->url->link('pincode/indianpin/update', 'user_token=' . $this->session->data['user_token'] . '&pincode_id=' . $this->request->get['pincode_id'], 'SSL');
		}
		
		$data['user_token'] = $this->session->data['user_token'];
		  
    	$data['cancel'] = $this->url->link('pincode/indianpin', 'user_token=' . $this->session->data['user_token'], 'SSL');

		if (isset($this->request->get['pincode_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$pin_info = $this->model_pincode_indianpin->getpin($this->request->get['pincode_id']);
		}		
		
		if (isset($this->request->post['pincode'])) {
			$data['pincode'] = $this->request->post['pincode'];
		} elseif (isset($pin_info)) {
			$data['pincode'] = $pin_info['pincode'];
		} else {
			$data['pincode'] = '';
		}

		if (isset($this->request->get['pincode_id'])) {
			$data['pincode_id'] = $this->request->get['pincode_id'];
		}
		
		if (isset($this->request->post['prepaid'])) {
			$data['prepaid'] = $this->request->post['prepaid'];
		} elseif (isset($pin_info)) {
			$data['prepaid'] = $pin_info['Prepaid'];
		} else {
			$data['prepaid'] = '';
		}
		
		if (isset($this->request->post['reverse_pickup'])) {
			$data['reverse_pickup'] = $this->request->post['reverse_pickup'];
		} elseif (isset($pin_info)) {
			$data['reverse_pickup'] = $pin_info['Reverse Pickup'];
		} else {
			$data['reverse_pickup'] = '';
		}
		
		if (isset($this->request->post['repl'])) {
			$data['repl'] = $this->request->post['repl'];
		} elseif (isset($pin_info)) {
			$data['repl'] = $pin_info['REPL'];
		} else {
			$data['repl'] = '';
		}
		
		if (isset($this->request->post['cod'])) {
			$data['cod'] = $this->request->post['cod'];
		} elseif (isset($pin_info)) {
			$data['cod'] = $pin_info['COD'];
		} else {
			$data['cod'] = '';
		}
		
		if (isset($this->request->post['dispatch_center'])) {
			$data['dispatch_center'] = $this->request->post['dispatch_center'];
		} elseif (isset($pin_info)) {
			$data['dispatch_center'] = $pin_info['Dispatch Center'];
		} else {
			$data['dispatch_center'] = '';
		}
		
		if (isset($this->request->post['city'])) {
			$data['city'] = $this->request->post['city'];
		} elseif (isset($pin_info)) {
			$data['city'] = $pin_info['City'];
		} else {
			$data['city'] = '';
		}
		
		if (isset($this->request->post['state'])) {
			$data['state'] = $this->request->post['state'];
		} elseif (isset($pin_info)) {
			$data['state'] = $pin_info['State'];
		} else {
			$data['state'] = '';
		}
		
		if (isset($this->request->post['state_code'])) {
			$data['state_code'] = $this->request->post['state_code'];
		} elseif (isset($pin_info)) {
			$data['state_code'] = $pin_info['State Code'];
		} else {
			$data['state_code'] = '';
		}
		
		if (isset($this->request->post['sort_code'])) {
			$data['sort_code'] = $this->request->post['sort_code'];
		} elseif (isset($pin_info)) {
			$data['sort_code'] = $pin_info['Sort Code'];
		} else {
			$data['sort_code'] = '';
		}
		
		if (isset($this->request->post['value_capping'])) {
			$data['value_capping'] = $this->request->post['value_capping'];
		} elseif (isset($pin_info)) {
			$data['value_capping'] = $pin_info['Value Capping'];
		} else {
			$data['value_capping'] = '';
		}
		
	
		$this->load->model('setting/store');

		$data['stores'] = $this->model_setting_store->getStores();

		if (isset($this->request->post['store'])) {
			$data['store_ids'] = $this->request->post['store'];
		} elseif (isset($pin_info)) {
			$data['store_ids'] = $this->model_pincode_indianpin->getStores($this->request->get['pincode_id']);
		} else {
			$data['store_ids'] = array(0);
		}
			
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('pincode/indianpin_form', $data));
	}

	private function validateForm() {
		
		$this->load->model('pincode/indianpin');
		
		if (!$this->user->hasPermission('modify', 'pincode/indianpin')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

	 	if(isset($this->request->post['pincode']) and $this->request->post['pincode']!=""){
			if(trim($this->request->post['pincode']) == "") {
			 	$this->error['warning'] = $this->language->get('error_pin_empty');
			}
		}

		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	private function validateEForm() {
		
		$this->load->model('pincode/indianpin');
		
		if (!$this->user->hasPermission('modify', 'pincode/indianpin')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

	 	if(isset($this->request->post['pincode_id']) and $this->request->post['pincode_id']!=""){

	 		if(trim($this->request->post['pincode']) == "") {
			 	$this->error['warning'] = $this->language->get('error_pin_empty');
			} 

			if($this->model_pincode_indianpin->checkepin($this->request->post['pincode'])) {
			 	$this->error['warning'] = $this->language->get('error_pin_exist');
			} 	
		}
	
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}
?>