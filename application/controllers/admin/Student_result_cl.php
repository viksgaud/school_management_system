<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_result_cl extends CI_Controller {

	public function index()
	{
        $admin = $this->session->userdata('admin');
		if(empty($admin)){

			redirect(base_url().'admin/Admin_login_cl');
            
		}else{
        
            // $this->load->view('admin/student');
            $this->load->view('admin/student_result');
        }
	}

    function showData(){

        $this->load->model("admin/Student_result_ml");
        $response = $this->Student_result_ml->show_data();
        echo json_encode($response);
    }
    function showClass(){

        $this->load->model("admin/Student_result_ml");
        $response = $this->Student_result_ml->show_class();
        echo json_encode($response);
    }
    function showStudent(){

        $this->load->model("admin/Student_result_ml");
        $response = $this->Student_result_ml->show_student();
        echo json_encode($response);
    }
    function showSubjectMarks(){

        $this->load->model("admin/Student_result_ml");
        $response = $this->Student_result_ml->show_Subject_Marks();
        echo json_encode($response);
    }
    function myResultData(){
        $std = $this->input->get('student_id');
        $this->load->model("admin/Student_result_ml");
        $response = $this->Student_result_ml->show_std($std);
        echo json_encode($response);
    }

    function showSubject(){
        $std = $this->input->get('student_id');
        $this->load->model("admin/Student_result_ml");
        $response = $this->Student_result_ml->show_std($std);
        echo json_encode($response);
    }
   
  

}
