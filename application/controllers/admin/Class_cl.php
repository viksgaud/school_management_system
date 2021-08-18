<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_cl extends CI_Controller {

	public function index()
	{
        $admin = $this->session->userdata('admin');
		if(empty($admin)){

			redirect(base_url().'admin/Admin_login_cl');
            
		}else{
        
            $this->load->view('admin/class');
        }
	}

    function showData(){

        $this->load->model("admin/Class_ml");
        $response = $this->Class_ml->show_data();
        echo json_encode($response);
    }
    function showSubject(){

        $this->load->model("admin/Class_ml");
        $response = $this->Class_ml->show_subject();
        echo json_encode($response);
    }

    function editData(){
        $id = $this->input->get('id');
        $this->load->model("admin/Class_ml");
        $response = $this->Class_ml->edit_data($id);
        echo json_encode($response);
    }

    function deleteData(){
            $id = $this->input->get('id');
            $this->load->model("admin/Class_ml");
            $response = $this->Class_ml->delete_data($id);
            $msg['success'] = false;
            if($response){
                $msg['success'] = true;
            }
            echo json_encode($msg);
    }

    function insertData(){

            $this->load->model("admin/Class_ml");
            $result = $this->Class_ml->insert_data();
            $msg['success'] = false;
            $msg['type'] = 'add';
            if($result){
                $msg['success'] = true;
            }
            echo json_encode($msg);
    }

    function updateData(){

        $data = array(
            'className' => $this->input->post('className')
                );
        
            $this->load->model("admin/Class_ml");
            $response = $this->Class_ml->update_data($data);
            $msg['success'] = false;
            $msg['type'] = 'update';
            if($response){
                $msg['success'] = true;
            }
            echo json_encode($msg);
    }
}
