<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login_ml extends CI_Model
{

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
    }
    
   function insert_data(){

        $data = array(
            'name' => $this->input->post('name'),
            'subject' => $this->input->post('subName')
                );

        $this->db->insert('teacher',$data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   function login_Admin(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('admin');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }

   }


}


?>