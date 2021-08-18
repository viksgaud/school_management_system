<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ast_ml extends CI_Model
{

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
    }
    
   function insert_data(){

      
    $data = array(

        'classid' => $this->input->post('className'),
        'subjectid' => $this->input->post('subName')
        // 'class' => $this->input->post('class_name')
        // 'subject' => $this->input->post('sub_name')
        
            );


        $this->db->insert('class_sub',$data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   function update_data($data){
       
        $id = $this->input->post('txtId');
        $this->db->where('id',$id);
        $this->db->update('class_sub',$data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   
   function edit_data($id){

        $this->db->where('id',$id);
        $query = $this->db->get('class_sub');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }

   }
   function delete_data($id){

        $this->db->where('id',$id);
        $this->db->delete('class_sub');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   function show_data(){

    $query= $this->db->select('class_sub.id,class.className,subject.subjectName')
    ->from('class_sub')
    ->join('class','class.id = class_sub.classid')
    ->join('subject','subject.id = class_sub.subjectid')
    ->order_by('class_sub.id','asc')
    ->get();

        // $this->db->order_by('id', 'asc');
        // $th
        // $query = $this->db->get('class_sub');
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