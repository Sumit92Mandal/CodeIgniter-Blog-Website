<?php
   class Users_model extends CI_Model{
   	public function register($enc_password){
   			$data=array(
   	  		'name'=>$this->input->post('name'),
   	  		'username'=>$this->input->post('username'), 
            'email' => $this->input->post('email'),
            'Password' =>$enc_password,
            'zipcode' =>$this->input->post('zipcode')
           
             );

   			//insert user
   			return $this->db->insert('users',$data);

   	}


    //log user in
    public function login($username,$password){
      //validate
      $this->db->where('username',$username);
      $this->db->where('password',$password);

       $result = $this->db->get('users'); 

       if($result->num_rows() == 1){
           return $result->row(0)->id;
       }else{
        return false;
       }

    }


   		//check mail exist already or not
  	function check_email_exists($email){
  		$query=$this->db->get_where('users',array('email'=> $email));
  		if(empty($query->row_array())){
  			return true;

  		}else {
  			return false;
  		}
  	}

 }