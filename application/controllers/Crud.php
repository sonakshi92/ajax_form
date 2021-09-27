<?php
class Crud extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->library ( 'session' ); 
		$this->load->database();
		$this->load->model('Crud_model');
	}

	public function register()
	{
		$this->load->view('register');
	}

    public function savedata()
	{
		if($this->input->post('type')==1)
		{
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$this->Crud_model->saverecords($name,$email,$password);	
			echo json_encode(array(
				"statusCode"=>200
			));
            redirect('crud/login');
		} 
	}

    public function login()
	{
		$this->load->view('login');
	}

    public function check_login(){  
		$email=$this->input->post('uemail');
			$password=$this->input->post('upassword');
       // $data['email']=htmlspecialchars($_POST['uemail']);  
       // $data['password']=htmlspecialchars($_POST['upassword']);  

        $res=$this->Crud_model->islogin($email, $password);  

        if($res){     
            //$this->session->set_userdata('id',$data['name']);
           echo base_url()."crud/dashboard/";  
          //  redirect('crud/dashboard');
            
        }  
        else{  
           echo 0;  
        }   
    } 
    
    public function dashboard()
	{
		$this->load->view('dashboard');
	}
}