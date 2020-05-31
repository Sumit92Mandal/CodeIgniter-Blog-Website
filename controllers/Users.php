<?php
  class Users extends CI_Controller{

    //for user registration/signup
  	public function register(){
  		$data['title'] = 'Sign UP';

  		$this->form_validation->set_rules('name','Name','required');
  		$this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
  		$this->form_validation->set_rules('username','Username','required');
  		
  		$this->form_validation->set_rules('zipcode','zipcode','required');
		  $this->form_validation->set_rules('password','Password','required');
		  $this->form_validation->set_rules('password2','confirm password','matches[password]');

		if($this->form_validation->run() ===FALSE){
			$this->load->view('templates/header');
			$this->load->view('users/register',$data);
			$this->load->view('templates/footer');
		  } else {
			//Encrypt password
			$enc_password = md5($this->input->post('password'));

			$this->users_model->register($enc_password);

			//set message
			$this->session->set_flashdata('user_registered','you are now registered and can log in');

			redirect('users/login');

			
		  }
 
  	}

  //for user login

    public function login(){
    $data['title'] = 'Sign In';

    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');
 

    if($this->form_validation->run() ===FALSE){
      $this->load->view('templates/header');
      $this->load->view('users/login',$data);
      $this->load->view('templates/footer');

      } else {
        //get username
        $username =$this->input->post('username');
        //get and encrypt password
        $password = md5($this->input->post('password'));

        //login user
        $user_id = $this->users_model->login($username,$password);

        if( $user_id){
          //create session
          $user_data=array(
                       'user_id' => $user_id,
                       'username' => $username,
                       'logged_in' => true
                      );
            $this->session->set_userdata($user_data);

               //set message
      $this->session->set_flashdata('user_loggedin','you are now logged in');

      redirect('posts');
        }else {

      //set message
      $this->session->set_flashdata('login_failed',' login is invalid');

      redirect('users/login');

       }
      }
 
    }
    
  function check_email_exists($email){
	  $this->form_validation->set_message('check_email_exists','oops that email is taken bro');
	    if($this->users_model->check_email_exists($email)){
	       return true;
	      }else {
	       	return false;
	           }

	     }


	      
        //userlogout
        public function logout(){
           //unset user data
          $this->session->unset_userdata('logged_in');
          $this->session->unset_userdata('user_id');
          $this->session->unset_userdata('username');

      //set message
      $this->session->set_flashdata('user_loggedout','you are now logged out');
       redirect('users/login');
        }
}