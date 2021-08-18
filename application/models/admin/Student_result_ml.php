<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_result_ml extends CI_Model
{

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
    }
    
   function insert_data(){
      
        $i=0;
        while($i <= $this->input->post('sub_ids_'.$i)){
            $data = array(

            
                'subject' => $this->input->post('sub_ids_'.$i),
                'marks' => $this->input->post('marks'.$i),
                'class' => $this->input->post('className'),
                'student' => $this->input->post('studentName')
                
                    );
                $this->db->insert('result',$data);
            $i++;
        }

    
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
        $query = $this->db->get('result');
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
   function show_student(){
    $id = $this->input->get('id');
        $this->db->where('class',$id);
        $query = $this->db->get('students');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }

    }
   function show_Subject_Marks(){

    $std_id = $this->input->get('student_id');
    if($std_id){
        $query= $this->db->select('result.subject,subject.subjectName,result.marks,subject.outofMarks,subject.passingMarks')
        ->from('result')
        ->join('subject','result.subject = subject.id')
        ->where('result.student',$std_id)
        ->get();
        
            if($query->num_rows() > 0){
                return $query->result();
            }else{
                return false;
            }
        
    }


    }
   function show_std($std){
    // $cl = $this->input->get('class_id');
    
        $this->db->where('id',$std);
        $query = $this->db->get('students');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }

    }

}


?>