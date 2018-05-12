<?php 

class Controllerpincodepinimport extends Controller {
  private $error = array(); 
     
    public function index() {
        $this->load->model('pincode/pinimport');
        $this->load->language('pincode/pinimport');
        $data['success'] = '';
        if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
           if($this->request->post['delete']) {
                if($this->request->post['delete'] == 'dc'){
                  $this->model_pincode_pinimport->deletepins();
                 $this->session->data['success'] = $this->language->get('delete_success_coupons');
                }
            }
        }
        $this->getForm();
        }

      private function getForm() {
      
        $this->document->setTitle($this->language->get('heading_title')); 
        
        $this->load->model('pincode/pinimport');
      
        $data['heading_title'] = $this->language->get('heading_title');
      
        $data['importd'] = $this->language->get('importd');
        $data['exportd'] = $this->language->get('exportd');
        $data['importc'] = $this->language->get('importc');
        $data['exportc'] = $this->language->get('exportc');
      
        $data['show'] = $this->language->get('show');

        $data['button_rf'] = $this->language->get('button_rf');
        $data['button_help'] = $this->language->get('button_help');
        $data['text_form'] = $this->language->get('text_form');

        $data['importcoupons'] = $this->language->get('importcoupons');
        $data['exportcoupons'] = $this->language->get('exportcoupons');
        $data['help_importcoupons'] = $this->language->get('help_importcoupons');
        $data['help_exportcoupons'] = $this->language->get('help_exportcoupons');
        $data['deletecoupons'] = $this->language->get('deletecoupons');
        $data['dc'] = $this->language->get('dc');

        $data['exportct'] = HTTPS_SERVER. 'index.php?route=pincode/pinimport/exportct&user_token=' . $this->session->data['user_token'];
        $data['importct'] = HTTPS_SERVER. 'index.php?route=pincode/pinimport/importcoupon&user_token=' . $this->session->data['user_token'];
        $data['delete'] = HTTPS_SERVER. 'index.php?route=pincode/pinimport/delete&user_token=' . $this->session->data['user_token'];      
        $data['action'] = HTTPS_SERVER. 'index.php?route=pincode/pinimport&user_token=' . $this->session->data['user_token'];

        $data['tab_coupon'] = $this->language->get('tab_coupon');
        $data['tab_discounts'] = $this->language->get('tab_discounts');
        $data['tab_delete'] = $this->language->get('tab_delete');   
       
        if (isset($this->error['warning'])) {
          $data['error_warning'] = $this->error['warning'];
        } else {
          $data['error_warning'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
			'separator' => false
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('pincode/pinimport', 'user_token=' . $this->session->data['user_token'], 'SSL'),
            'separator' => ' :: '
        );

        if (isset($this->session->data['success'])) {
          $data['success'] = $this->session->data['success']; 
          unset($this->session->data['success']);
        } else {
          $data['success'] = '';
        }

        if (isset($this->session->data['error'])) {
          $data['error'] = $this->session->data['error']; 
          unset($this->session->data['error']);
        } else {
          $data['error'] = '';
        }

        $data['cancel'] = $this->url->link('pincode/pinimport', 'user_token=' . $this->session->data['user_token'] , 'SSL');

        $data['user_token'] = $this->session->data['user_token'];
                        
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('pincode/pinimport', $data));
    }

    public function exportct() {

       $fields = array();
       $sample_data = array();
       $this->load->model("pincode/indianpin");
       $pins = $this->model_pincode_indianpin->getpins(array());
       array_push($fields,'Pincode','Prepaid','Reverse Pickup','REPL','COD','Dispatch Center','City','State','State Code','Sort Code','Value Capping');
       $i = 0;
      foreach ($pins as $key => $value) {
         $sample_data[$i]['Pincode'] 			= $value['pincode'];
         $sample_data[$i]['Prepaid'] 			= $value['Prepaid'];
         $sample_data[$i]['Reverse Pickup'] 	= $value['Reverse Pickup'];
         $sample_data[$i]['REPL'] 				= $value['REPL'];
         $sample_data[$i]['COD'] 				= $value['COD'];
         $sample_data[$i]['Dispatch Center'] 	= $value['Dispatch Center'];
         $sample_data[$i]['City'] 				= $value['City'];
         $sample_data[$i]['State'] 				= $value['State'];
         $sample_data[$i]['State Code'] 		= $value['State Code'];
         $sample_data[$i]['Sort Code'] 			= $value['Sort Code'];
         $sample_data[$i]['Value Capping'] 		= $value['Value Capping'];
         $i = $i + 1;
       }

       $this->load->library('exportcsv');
       $csv = new ExportCSV();
       $csv->fields = $fields;
       $csv->result = $sample_data;
       $csv->process();
       $csv->download('zip_code.xls');

    }

    public function importcoupon() {
         ini_set("auto_detect_line_endings", true);   
          ini_set("memory_limit", "512M");
          ini_set("max_execution_time", 180);
          set_time_limit(0);
          if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validateEForm()) {
           $data = array();
           if (is_uploaded_file($this->request->files['download']['tmp_name'])) {
                $filename = $this->request->files['download']['name'] . '.' . md5(rand());

                move_uploaded_file($this->request->files['download']['tmp_name'], DIR_DOWNLOAD . $filename);

                if (file_exists(DIR_DOWNLOAD . $filename)) {
                  $this->load->model('pincode/pinimport');
                  if (($file = file(DIR_DOWNLOAD . $filename)) !== FALSE) {
                    $complete_data = array();
                    $columns = array();
                    $row = 1;
                    foreach($file as $line) {
                       if($row == 1){
                          $line = str_replace("'", '', $line);
                          $columns = explode(',', $line);
                          $response = $this->validatecsv($columns);

                          if(0) {
                            $this->response->redirect(HTTPS_SERVER. 'index.php?route=pincode/pinimport&user_token=' . $this->session->data['user_token']);
                          }

                        } else {
                        
                          $case =  array('TRUE' => 1, 'FALSE' => 0);
                          $line = str_replace('"', '', $line);
                           $line = str_replace("'", '', $line);
                          $datarow = explode(',', $line);
                          
                          foreach($datarow as $key=>$val){
                             $val = trim($val);
                             $datarow[trim($columns[$key])] = isset($case[strtoupper($val)])?$case[strtoupper($val)]:$val;
                             unset($datarow[$key]);
                          }
                          array_push($complete_data,$datarow);
                        }
                        $row++;
                    }  
                     $chunks = array_chunk($complete_data, 1000);
                    
                     foreach($chunks as $chunk){
                       foreach($chunk as $pins){
                          $this->model_pincode_pinimport->bulkAddPins($pins);
                        }
                      }
                      $this->session->data['success'] = "Pincodes are uploaded successfully";
                  }
                  unlink(DIR_DOWNLOAD . $filename);
                }
          }
        }
        
        $this->response->redirect($this->url->link('pincode/pinimport', 'user_token=' . $this->session->data['user_token'] , 'SSL'));
      }    

    private function validatecsv($columns1) {

           unset($columns1['11']);
           foreach ($columns1 as $key => $value) {
             $columns1[$key] = trim($value);
           }
           $fields = array();
           //array_push($fields,'message','zip_code','city_name','state_name','zone_name','status');
		   array_push($fields,'Pincode','Prepaid','Reverse Pickup','REPL','COD','Dispatch Center','City','State','State Code','Sort Code','Value Capping');
           
           if($columns1 != $fields) {
              $this->error['warning'] = $this->language->get('error_upload');
           }

           if (!$this->error) {
                  return true;
           } else {
                  return false;
          }
    }

    private function validateForm() {
    
      if (!$this->user->hasPermission('modify', 'pincode/pinimport')) {
        $this->error['warning'] = $this->language->get('error_permission');
      }

      if (!$this->error) {
        return TRUE;
      } else {
        return FALSE;
      }
    }

     private function validateEForm() {
      $this->load->language('pincode/pinimport');
      if (!$this->user->hasPermission('modify', 'pincode/pinimport')) {
        $this->session->data['error'] = $this->language->get('error_permission');
      }

      if (!$this->error) {
        return TRUE;
      } else {
        return FALSE;
      }
    }

}
?>