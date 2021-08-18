<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_cl extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login');
	}

    
    function loginAdmin(){
        // $id = $this->input->get('id');
        $username = $this->input->post('username');
        $this->load->model("admin/Admin_login_ml");
        $response = $this->Admin_login_ml->login_Admin();
        $msg['success'] = false;
            if($response){
                $msg['success'] = true;
                $this->session->set_userdata('admin',$username);
            }
            echo json_encode($msg);
    }

    
    function logout()
    {
        $this->session->unset_userdata('admin');
        redirect(base_url().'admin/login_cl');
    }

    
}
