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
            'subject' => $this->input->post('subName')
                );

        $this->db->insert('teacher',$data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

   }
   function login_Student(){

        $email = $this->input->post('email');
        $rollNo = $this->input->post('rollNo');

        $this->db->where('email',$email);
        $this->db->where('roll_no',$rollNo);
        $query = $this->db->get('students');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }

   }
   function show_Student($email){
      
        $this->db->where('email',$email);
        $query = $this->db->get('students');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }

        

   }

   function show_Marks(){
       $std = $this->input->get('student_id');

    $query= $this->db->select('result.marks,result.subject,subject.passingMarks,subject.outofMarks,subject.subjectName')
    ->from('result')
    ->join('subject','result.subject = subject.id')
    ->where('result.student',$std)
    ->get();
    // $cl = $this->input->get('class_id');
    
        // $this->db->where('student',$std);
        // $query = $this->db->get('result');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }

    }


}


?>