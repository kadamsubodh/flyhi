<?php 

class Login extends CI_Controller {

	/**
	* __construct
	*
	* Calls parent constructor
	* @access	public
	* @return	void
	*/
	function __construct()
	{
		parent::__construct();
	}
	
	
	/**
	* index
	*
	* This displays the login page for admin
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
            if($this->session->userdata('loggedIn') == TRUE){
                redirect('dashboard');
            }else{
                $this->load->view('login');
            }
	}
	
    /*
     * Function validation() validates the username and password
     * @access public
     * @return void
     */
    function validation(){

     $usernm = $this->form_validation->set_rules('loginName', 'Login Name', 'required|callback_verify');

     $passwd = $this->form_validation->set_rules('loginPass', 'Password','required|callback_verify');

     if ($this->form_validation->run() == FALSE)
     {
        $this->session->set_flashdata('error',  form_error('loginName'));

        redirect('login');
     }
     else
     {
       redirect('dashboard');
     }

   }
  
  /*
   * Function verify() verifies the particular user and checks in database
   * @access public
   * @return void
   */
  function verify(){

    $this->db->where(array('user_name'	=>	$this->input->post('loginName'),
			'enc_password'	=>	md5($this->input->post('loginPass')),
			'active_status'	=>	'1'));

    $this->db->limit(1);
    
    $Query = $this->db->get('adminUser');
    
    $this->db->last_query();
	
    if ($Query->num_rows() > 0){
      
      $row = $Query->row_array();
     
      $ses_user = array("Username"=>$row['user_name'],"Userid"=>$row['id'],"logged_in"=>TRUE);
      
//      $ses_user = array("Username"=>'admin',"Userid"=>'1',"logged_in"=>TRUE);
      
      $this->session->set_userdata('username',$ses_user['Username']);
      
      $this->session->set_userdata('userid',$ses_user['Userid']);

      $this->session->set_userdata('loggedIn',$ses_user['logged_in']);

	  return $ses_user;
    }
    else
    {    
      $this->form_validation->set_message('verify','Invalid User');
      
      return false;
    }
  }
	
 /*
  * Function logout() logouts the current user and usset the data
  * @access public
  * @author Pranali
  * @return void
  */
  function logout(){

    $this->session->unset_userdata('username');
    
    $this->session->unset_userdata('userid');

    $this->session->unset_userdata('loggedIn');
    
    $this->session->sess_destroy();
    
    redirect('login');
    
  }
 }