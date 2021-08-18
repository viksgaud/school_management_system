<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_cl extends CI_Controller {

	public function index()
	{
        $admin = $this->session->userdata('admin');
		if(empty($admin)){

			redirect(base_url().'admin/Admin_login_cl');
            
		}else{
        
            $this->load->view('admin/student');
        }
	}

    function showData(){

        $this->load->model("admin/Student_ml");
        $response = $this->Student_ml->show_data();
        echo json_encode($response);
    }
    function showClass(){

        $this->load->model("admin/Student_ml");
        $response = $this->Student_ml->show_class();
        echo json_encode($response);
    }

    function editData(){
        $id = $this->input->get('id');
        $this->load->model("admin/Student_ml");
        $response = $this->Student_ml->edit_data($id);
        echo json_encode($response);
    }

    function deleteData(){
            $id = $this->input->get('id');
            $this->load->model("admin/Student_ml");
            $response = $this->Student_ml->delete_data($id);
            $msg['success'] = false;
            if($response){
                $msg['success'] = true;
            }
            echo json_encode($msg);
    }

    function insertData(){

            $this->load->model("admin/Student_ml");
            $result = $this->Student_ml->insert_data();
            $msg['success'] = false;
            $msg['type'] = 'add';
            if($result){
                $msg['success'] = true;
            }
            echo json_encode($msg);
    }

    function updateData(){

        $data = array(
            'name' => $this->input->post('name'),
            'class' => $this->input->post('className'),
            'email' => $this->input->post('email'),
            'roll_no' => $this->input->post('rollNo'),
            'updated_at' => date('Y-m-d H:i:s')
                );
        
            $this->load->model("admin/Student_ml");
            $response = $this->Student_ml->update_data($data);
            $msg['success'] = false;
            $msg['type'] = 'update';
            if($response){
                $msg['success'] = true;
            }
            echo json_encode($msg);
    }
}