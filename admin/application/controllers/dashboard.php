<?php
  class Dashboard extends CI_Controller{
  
    public function __construct(){
      
      parent::__construct();
      if($this->session->userdata('loggedIn') == FALSE) {
          redirect('login');
      }
       
    }
    
    /**
     * Function to display dashboard              
     * @access public
     * @return void 
     */
    function index(){
        
        $this->load->view('template');
    }
}
?>