<?php
class ExportCSV {
    
    private $csv_terminated = "\n";
    
    private $csv_separator = ", ";
    
    private $csv_enclosed = '';
    
    private $csv_escaped = "\\";
    
    private $connection;
    
    public $query;
    
    private $output = '';
    
    public $result = array();
    
    public $fields = array();
    
    public function process() {
        
        if(!$this->fields){
            throw new Exception("No data found");
        }
        
        $num_fields = count($this->fields);
        
        $schema = "";
        $fields = array();
		$out = "";
        
        foreach($this->fields as $field){
            $out .= '<th>' . $field . '</th>';
        }
		
		$out .= '</tr>';
		
        foreach($this->result as $result){  
            $record = '<tr>';               
            foreach ($this->fields as $key=>$field) {
                if($result[$field] != 0 || $result[$field] != ''){
                    $record .= '<td>' .  $result[$field] . '</td>';                                     
                } 
                else {
                    $record .= '<td></td>';
                }
            }
            $out .= $record . '</tr>';          
        }   
        
        $this->output = $out;
    }
    
    public function write($filepath) {      
        if(!file_exists($filepath)){
            throw new Exception("file to write to could not be found");
        }       
        $file = fopen($filepath, "a");  
        fputs($file, $this->output);    
        fclose($file);      
    }
    
    public function download($filename){
		header("Content-Type: application/xls");    
		header("Content-Disposition: attachment; filename=$filename");  
		header("Pragma: no-cache"); 
		header("Expires: 0");
		echo '<table width="600" border="1" cellpadding="0" cellspacing="0">';
		echo '<tr height="40" style=" font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-family: normal; background-color: #4682B4; color: #FFFFFF; padding: 5px;" >';
        echo $this->output;
		echo '</table>';
        exit;
    }
    
}