<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_cl extends CI_Controller {

	public function index()
	{
        $admin = $this->session->userdata('admin');
		if(empty($admin)){

			redirect(base_url().'admin/Admin_login_cl');
            
		}else{
        
            $this->load->view('admin/subject');
        }
	}

    function showData(){

        $this->load->model("admin/Subject_ml");
        $response = $this->Subject_ml->show_data();
        echo json_encode($response);
    }
    function showClass(){

        $this->load->model("admin/Subject_ml");
        $response = $this->Subject_ml->show_class();
        echo json_encode($response);
    }

    function editData(){
        $id = $this->input->get('id');
        $this->load->model("admin/Subject_ml");
        $response = $this->Subject_ml->edit_data($id);
        echo json_encode($response);
    }

    function deleteData(){
            $id = $this->input->get('id');
            $this->load->model("admin/Subject_ml");
            $response = $this->Subject_ml->delete_data($id);
            $msg['success'] = false;
            if($response){
                $msg['success'] = true;
            }
            echo json_encode($msg);
    }

    function insertData(){

            $this->load->model("admin/Subject_ml");
            $result = $this->Subject_ml->insert_data();
            $msg['success'] = false;
            $msg['type'] = 'add';
            if($result){
                $msg['success'] = true;
            }
            echo json_encode($msg);
    }

    function updateData(){

        $data = array(
            'subjectName' => $this->input->post('name'),
            'passingMarks' => $this->input->post('pm'),
            'outofMarks' => $this->input->post('om'),
                );
        
            $this->load->model("admin/Subject_ml");
            $response = $this->Subject_ml->update_data($data);
            $msg['success'] = false;
            $msg['type'] = 'update';
            if($response){
                $msg['success'] = true;
            }
            echo json_encode($msg);
    }
}
