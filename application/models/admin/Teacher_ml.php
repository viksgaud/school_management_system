<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_ml extends CI_Model
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
//    function show_class(){

//         $this->db->order_by('id', 'asc');
//         // $this->db->select('*');
//         $query = $this->db->get('subject');
//         if($query->num_rows() > 0){
//             return $query->result();
//         }else{
//             return false;
//         }
//     }
   function show_subject(){
        
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('subject');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

   function update_data($data){
        $id = $this->input->post('txtId');
        $this->db->where('id',$id);
        $this->db->update('teacher',$data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   
   function edit_data($id){

        $this->db->where('id',$id);
        $query = $this->db->get('teacher');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }

   }
   function delete_data($id){

        $this->db->where('id',$id);
        $this->db->delete('teacher');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   function show_data(){

        $this->db->order_by('id', 'asc');
        // $this->db->select('*');
        $query = $this->db->get('teacher');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
   }

}


?>