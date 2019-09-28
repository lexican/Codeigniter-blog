<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Users extends CI_Controller {  
    public function __construct()
    {
            parent::__construct();
            $this->load->model('users_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
    }
    public function login()  
    {  
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->view('header');  
        $this->load->view('login');  
    }  
    public function sign_up(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->view('header'); 
        $this->load->view('signup'); 
    }

    public function login_validation(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'username', 'Username',
            'required|min_length[5]|max_length[12]',
            array(
                    'required'      => 'You have not provided %s.',
            )
            );
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run())  
            {  
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                );
                ;
                $data['user'] = $this->users_model->login_user($data);
                if ($data['user'])  
                {  
                    $data = array(
                        'first_name' => $data['user'][0]['first_name'],
                        'last_name' => $data['user'][0]['last_name'],
                        'user' => $data['user'][0]['username'],
                        'email' => $data['user'][0]['email'],
                        'isAdmin' => $data['user'][0]['isAdmin'],
                        'user_id' => $data['user'][0]['id']
                    );
                    $this->session->set_userdata($data);
                    if($data['isAdmin'] == 1){
                        redirect('home/dashboard');  
                    }else{
                        $username = $data['user'];
                        redirect('home/profile/'.$username);
                    }
                } else {  
                    $this->session->set_flashdata('error_msg', 'Provide valid credentials.');
                    $this->load->view('header');
                    $this->load->view('login');   
                }
            }   
                else {  
                $this->session->set_flashdata('error_msg', 'Provide valid credentials.');
                $this->load->view('header');
                $this->load->view('login');  
            }  


    }


    public function signup_validation()  
    {  
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'username', 'Username',
            'required|min_length[5]|max_length[12]|is_unique[users.username]',
            array(
                    'required'      => 'You have not provided %s.',
                    'is_unique'     => 'This %s already exists.'
            )
            );
            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required');
            $this->form_validation->set_rules('password_1', 'Password', 'required');
            $this->form_validation->set_rules('password_2', 'Password Confirmation', 'required|matches[password_1]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        ));

        if ($this->form_validation->run())  
        {  
            $data = array(
                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'email' => $this->input->post('email')
            );
            $this->users_model->register_user($data);
            $this->session->set_flashdata('success_msg', 'Registered successfully. Now login to your account.');
            redirect('users/login');
         }   
            else {  
            $this->load->view('header');
            $this->load->view('signup');  
        }  
         
    } 
    public function profile($user_profile){
        $data['user'] = $this->users_model->profile($user_profile);
        if ($data['user'])  
        {  
            $data = array(
                'first_name' => $data['user'][0]['first_name'],
                'last_name' => $data['user'][0]['last_name'],
                'username' => $data['user'][0]['username'],
                'email' => $data['user'][0]['email']
            );
        $this->load->view('header');
        $this->load->view('profile', $data);
    }else{
        echo "User does not exist";
    }
}
    public function logout(){
        $this->session->sess_destroy();
        redirect('users/login');
    } 
}  
?>