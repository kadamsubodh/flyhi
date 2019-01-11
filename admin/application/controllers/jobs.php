<?php
  class Jobs extends CI_Controller{
  
    public function __construct(){
      
      parent::__construct();
      if($this->session->userdata('loggedIn') == FALSE) {
          redirect('login');
      }
      
      $this->load->helper(array('form'));
      $this->load->library(array('pagination'));
      $this->load->model('job_model');
       
    }
    
    /**
     * Function to display dashboard              
     * @access public
     * @return void 
     */
    function index(){
        
        $arrData['data'] = $this->job_model->get();
        
        $arrData['content'] = 'jobs/list';
        
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
             $this->form_validation->set_rules('txtexperience', 'Experience', 'required|trim');
             $this->form_validation->set_rules('txtdescription', 'Description', 'required|trim');
             
             if ($this->form_validation->run() === TRUE) {

                $arrData = array(
                    'title'         => $this->input->post("txttitle"),
                    'description'   => $this->input->post("txtdescription"),
                    'experience'    => $this->input->post("txtexperience"),
                    'createdOn'     => date('Y-m-d')
                );
                                   
                if($this->job_model->add($arrData)){
                    $this->session->set_flashdata("success", "Job Opportunity added successfully");
                    redirect("jobs");
                }
                else{
                    $this->session->set_flashdata("error", "Job Opportunity was not added!!");
                    $this->session->set_flashdata('data',$this->input->post());
                }
                
            }else{
                
                $this->session->set_flashdata('error',validation_errors());
            }
            redirect("jobs/add");
            
        }
        
        $arrData['content'] = 'jobs/add';
        
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
             $this->form_validation->set_rules('txtexperience', 'Experience', 'required|trim');
             $this->form_validation->set_rules('txtdescription', 'Description', 'required|trim');
             
             if ($this->form_validation->run() === TRUE) {

                $updateData = array(
                    'title'          => $this->input->post("txttitle"),
                    'description'   => $this->input->post("txtdescription"),
                    'experience'     => isset($_POST['txtexperience']) && $this->input->post("txtexperience") !="" ? $this->input->post("txtexperience") : ""
                );
                                   
                if($this->job_model->update($id,$updateData)){
                    $this->session->set_flashdata("success", "Job Opportunity Updated successfully");
                    redirect("jobs");
                }
                else{
                    $this->session->set_flashdata("error", "Job Opportunity was not Updated!!");
                    $this->session->set_flashdata('data',$this->input->post());
                }
                
            }else{
                
                $this->session->set_flashdata('error',validation_errors());
            }
            redirect("jobs/edit/$id");
            
        }
        
        $Jobs = $this->job_model->get($id);
        
        if(isset($Jobs) && count($Jobs) > 0){
            $arrData['data'] = $Jobs[0];
        }
        
        $arrData['content'] = 'jobs/edit';
        
        $this->load->view('template',$arrData);
    }
    
    /**
     * Function to delete News & Events            
     * @access public
     * @return void 
     */
    function delete($id){
        
        if($this->job_model->delete($id)){
            $this->session->set_flashdata("success", "Job Opportunity Deleted successfully");
        }else{
            $this->session->set_flashdata("error", "Job Opportunity was not Deleted!!");
        }
        
        redirect("jobs");
    }
}
?>
