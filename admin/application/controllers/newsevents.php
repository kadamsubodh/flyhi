<?php
  class Newsevents extends CI_Controller{
  
    public function __construct(){
      
      parent::__construct();
      if($this->session->userdata('loggedIn') == FALSE) {
          redirect('login');
      }
      
      $this->load->helper(array('form'));
      $this->load->library(array('pagination','form_validation'));
      $this->load->model('newsevents_model');
       
    }
    
    /**
     * Function to display dashboard              
     * @access public
     * @return void 
     */
    function index(){
        
        $arrData['data'] = $this->newsevents_model->get();
        
        $arrData['content'] = 'newsevents/list';
        
        $this->load->view('template',$arrData);
    }
    
    /**
     * Function to display dashboard              
     * @access public
     * @return void 
     */
    function add(){
        
        if(isset($_POST['add']) && $_POST['add'] == 'Add'){
            
             $this->form_validation->set_rules('txttitle', 'Title', 'required|trim');
             $this->form_validation->set_rules('txtdate', 'Date', 'required|trim');
             $this->form_validation->set_rules('txtdescription', 'Description', 'required|trim');
             
             if ($this->form_validation->run() === TRUE) {

                $arrData = array(
                    'title'          => $this->input->post("txttitle"),
                    'description'   => $this->input->post("txtdescription"),
                    'createdOn'     => isset($_POST['txtdate']) && $this->input->post("txtdate") !="" ? date('Y-m-d',  strtotime($this->input->post("txtdate"))) : date('Y-m-d')
                );
                                   
                if($this->newsevents_model->add($arrData)){
                    $this->session->set_flashdata("success", "News & Events added successfully");
                    redirect("newsevents");
                }
                else{
                    $this->session->set_flashdata("error", "News & Events was not added!!");
                    $this->session->set_flashdata('data',$this->input->post());
                }
                
            }else{
                
                $this->session->set_flashdata('error',validation_errors());
            }
            redirect("newsevents/add");
            
        }
        
        $arrData['content'] = 'newsevents/add';
        
        $this->load->view('template',$arrData);
    }
    
     /**
     * Function to edit News & Events             
     * @access public
     * @return void 
     */
    function edit($id){
        
        if(isset($_POST['edit']) && $_POST['edit'] == 'Update'){
            
             $this->form_validation->set_rules('txttitle', 'Title', 'required|trim');
             $this->form_validation->set_rules('txtdate', 'Date', 'required|trim');
             $this->form_validation->set_rules('txtdescription', 'Description', 'required|trim');
             
             if ($this->form_validation->run() === TRUE) {

                $updateData = array(
                    'title'          => $this->input->post("txttitle"),
                    'description'   => $this->input->post("txtdescription"),
                    'createdOn'     => isset($_POST['txtdate']) && $this->input->post("txtdate") !="" ? date('Y-m-d',  strtotime($this->input->post("txtdate"))) : date('Y-m-d')
                );
                                   
                if($this->newsevents_model->update($id,$updateData)){
                    $this->session->set_flashdata("success", "News & Events Updated successfully");
                    redirect("newsevents");
                }
                else{
                    $this->session->set_flashdata("error", "News & Events was not Updated!!");
                    $this->session->set_flashdata('data',$this->input->post());
                }
                
            }else{
                
                $this->session->set_flashdata('error',validation_errors());
            }
            redirect("newsevents/edit/$id");
            
        }
        
        $NewsEvents = $this->newsevents_model->get($id);
        
        if(isset($NewsEvents) && count($NewsEvents) > 0){
            $arrData['data'] = $NewsEvents[0];
        }
        
        $arrData['content'] = 'newsevents/edit';
        
        $this->load->view('template',$arrData);
    }
    
    /**
     * Function to delete News & Events            
     * @access public
     * @return void 
     */
    function delete($id){
        
        if($this->newsevents_model->delete($id)){
            $this->session->set_flashdata("success", "News & Events Deleted successfully");
        }else{
            $this->session->set_flashdata("error", "News & Events was not Deleted!!");
        }
        
        redirect("newsevents");
    }
}
?>
