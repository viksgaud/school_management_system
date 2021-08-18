<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_ml extends CI_Model
{

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
    }
    
   function insert_data(){

        $data = array(

            'className' => $this->input->post('className'),
                );

        $this->db->insert('class',$data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   function update_data($data){
        $id = $this->input->post('txtId');
        $this->db->where('id',$id);
        $this->db->update('class',$data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   
   function edit_data($id){

        $this->db->where('id',$id);
        $query = $this->db->get('class');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }

   }
   function delete_data($id){

        $this->db->where('id',$id);
        $this->db->delete('class');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   function show_data(){

        $this->db->order_by('id', 'asc');
        // $this->db->select('*');
        $query = $this->db->get('class');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
   }
   function show_subject(){

    $this->db->order_by('id', 'asc');
    // $this->db->select('*');
    $query = $this->db->get('subject');
    if($query->num_rows() > 0){
        return $query->result();
    }else{
        return false;
    }
}

}


?>