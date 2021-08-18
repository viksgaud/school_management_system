<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_cl extends CI_Controller {

	public function index()
	{
		$this->load->view('student/studentHome');
	}

    
    function loginStudent(){
        // $id = $this->input->get('id');
        $email = $this->input->post('email');
        $this->load->model("student/Student_ml");
        $response = $this->Student_ml->login_Student();
        $msg['success'] = false;
            if($response){
                $msg['success'] = true;
                $this->session->set_userdata('email',$email);
            }
            echo json_encode($msg);
    }

    
    function logout()
    {
        $this->session->unset_userdata('email');
        redirect(base_url().'admin/login_cl');
    }

    function showStudent(){
        
        $email = $this->session->userdata('email');

        if(empty($email)){
            redirect(base_url().'admin/Admin_login_cl');
        }
        else{
            $this->load->model("student/Student_ml");
            $response = $this->Student_ml->show_Student($email);
            echo json_encode($response);
        }


    }
    function showMarks(){

        $this->load->model("student/Student_ml");
        $response = $this->Student_ml->show_Marks();
        echo json_encode($response);
    }

    
}
