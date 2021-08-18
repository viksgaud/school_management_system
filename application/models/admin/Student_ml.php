<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_ml extends CI_Model
{

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
    }
    
   function insert_data(){

        $data = array(
            'name' => $this->input->post('name'),
            'class' => $this->input->post('className'),
            'email' => $this->input->post('email'),
            'roll_no' => $this->input->post('rollNo'),
            'created_at' => date('Y-m-d H:i:s')
                );

        $this->db->insert('students',$data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   function update_data($data){
        $id = $this->input->post('txtId');
        $this->db->where('id',$id);
        $this->db->update('students',$data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   
   function edit_data($id){

        $this->db->where('id',$id);
        $query = $this->db->get('students');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }

   }
   function delete_data($id){

        $this->db->where('id',$id);
        $this->db->delete('students');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   function show_data(){

    $query= $this->db->select('students.name,students.email,students.roll_no,students.id,class.className')
    ->from('students')
    ->join('class','students.class = class.id')
    ->get();

        // $this->db->order_by('id', 'asc');
        // $this->db->select('*');
        // $query = $this->db->get('students');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
   }
   function show_class(){

        $this->db->order_by('id', 'asc');
        // $this->db->select('*');
        $query = $this->db->get('class');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
   }

}


?>