<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Home extends CI_Controller {  
    public function __construct()
    {
            parent::__construct();
            $this->load->model('news_model');
            $this->load->model('users_model');
            $this->load->helper('url_helper');
            $this->load->library('session');

    }
    public function index()  
    {  
        $data['news'] = $this->news_model->get_news();
        $this->load->view('home', $data);  
    }  
    public function details($slug)  
    {  
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['news_item'] = $this->news_model->get_news($slug);
        $post_id = $data['news_item']['id'];
        $data['comments'] = $this->news_model->get_post_comments($post_id);
        $data['total_comments'] = $this->news_model->total_comments($post_id);

        if (empty($data['news_item']))
        {
                show_404();
        }
        $this->load->view('header'); 
        $this->load->view('details_view', $data);  
    }

public function like_post(){
        $postid = $this->input->post('postid');
        $n = $this->news_model->add_like($_SESSION['user_id'], $postid);
		echo $n;
}
public function unlike_post(){
        $postid = $this->input->post('postid');
        $n = $this->news_model->remove_like($_SESSION['user_id'], $postid);
		echo $n;
}


    public function create_post(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        if (empty($_SESSION['isAdmin']))
        {
                show_404();
        }else{
            if($_SESSION['isAdmin'] == 1){
                $this->load->view('header');
                $this->load->view('create_post', array('error' => '',
                'success_msg' => '' )); 
            }else{
                show_404();
            }
        }
        
    }
    public function update_post($slug){
        $this->load->helper('form');
        $this->load->library('form_validation');
        if (empty($_SESSION['isAdmin']))
        {
                show_404();
        }else{
            if($_SESSION['isAdmin'] == 1){
                $this->load->view('header');
                $data['news_item'] = $this->news_model->get_news($slug);
                $data['error'] = '';
                $data['success_msg'] = '';
                //echo print_r($data);
                $this->load->view('update_post', $data); 
            }else{
                show_404();
            }
        }
        
    }

    public function create_post_validation(){
        if (empty($_SESSION['isAdmin']))
        {
                show_404();
        }else{
            if($_SESSION['isAdmin'] == 1){
                $this->load->helper('form');
            $this->load->library('form_validation');

            $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 100;
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;

                    $this->load->library('upload', $config);


            $this->form_validation->set_rules('title', 'Title', 'required|is_unique[news.title]');
            $this->form_validation->set_rules('text', 'Text', 'required');
            //$this->form_validation->set_rules('text', 'Text', 'required');
            if ( ($this->form_validation->run() === FALSE) || !($this->upload->do_upload('userfile')) )
            {   
                $data = array('error' => $this->upload->display_errors(), 'success_msg' => '');
                $this->load->view('header');
                $this->load->view('create_post', $data);
            }else{
                $filename = $this->upload->data('file_name'); 
                $str = $this->input->post('title');
                $delimiter = '-';
                $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
                $data = array(
                    'user_id' => $this->input->post('user_id'),
                    'title' => $this->input->post('title'),
                    'text' => $this->input->post('text'),
                    'slug' => $slug,
                    'image' => $filename
                );
                $this->news_model->add_post($data);
                $this->session->set_flashdata('success_msg', 'New post added successfully.');
                redirect('home/dashboard');  
            }
                }else{
                    show_404();
                }
            }
        
    }

    public function update_post_validation(){
        if (empty($_SESSION['isAdmin']))
        {
                show_404();
        }else{
            if($_SESSION['isAdmin'] == 1){
                $this->load->helper('form');
                $this->load->library('form_validation');

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'Text', 'required');
            $post_slug = $this->input->post('slug');
            $error = '';
        if ( $this->upload->data('file_name')!=NULL ){
            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = 'The filetype you are attempting to upload is not allowed.';
            }
            else
            {
                $error = '';
            }
        }else{
            $error ='';
        }
            if ( ($this->form_validation->run() === FALSE) || ($error != '') )
            {   
                $data['error'] = $error;
                $data['success_msg'] = '';
                $data['news_item'] = $this->news_model->get_news($post_slug);
                $this->load->view('header');
                $this->load->view('update_post', $data);
            }else{
                $filename = $this->upload->data('file_name'); 
                if($filename == ''){
                    $filename = $this->input->post('hidden_image'); 
                }
                $str = $this->input->post('title');
                $delimiter = '-';
                $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
                $data = array(
                    'user_id' => $this->input->post('user_id'),
                    'title' => $this->input->post('title'),
                    'text' => $this->input->post('text'),
                    'slug' => $slug,
                    'image' => $filename
                );
                $this->news_model->update_post($post_id, $data);
                $data = array('error' => '', 'success_msg' => 'Post updated successfully.');
                $this->load->view('header');
                $this->load->view('dashboard', $data);
            }
                }else{
                    show_404();
                }
            }
        }
            public function confirm_delete_post($post_slug){
                if (empty($_SESSION['isAdmin'])){
                    show_404();
                }else{
                    if($_SESSION['isAdmin'] == 1){
                        $this->load->view('header');
                        $data['error'] = '';
                        $data['success_msg'] = '';
                        $data['slug'] = $post_slug;
                        $this->load->view('confirm_delete_post', $data); 
                    }else{
                        show_404();
                    }
                }
            }
            public function delete_post($post_slug){
                if (empty($_SESSION['isAdmin'])){
                show_404();
                }else{
                    if($_SESSION['isAdmin'] == 1){
                        $post = $this->news_model->get_news($post_slug);
                        if($post){
                            $user = $this->users_model->get_user($post['user_id']);
                            if($_SESSION['user'] == $user['username'] ){
                                $this->news_model->delete_post($post_slug);
                                $this->session->set_flashdata('success_msg', 'Post successfully deleted.');
                                redirect('home/dashboard');
                                
                            }else{
                                $this->session->set_flashdata('error_msg', 'You cannot delete this post.');
                                redirect('home/dashboard');
                            }
                        }else{
                            $this->session->set_flashdata('error_msg', 'Post does not exist.');
                            redirect('home/dashboard');
                        } 
                    }else{
                        show_404();
                    }
                }
            }


    public function add_comment(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('comment_body', 'Comment', 'required');
        $post_slug = $this->input->post('post_slug');
            if ($this->form_validation->run())  
            {  
                $data = array(
                    'post_id' => $this->input->post('post_id'),
                    'comment_username' => $this->input->post('comment_username'),
                    'comment_body' => $this->input->post('comment_body'),
                );
                $this->news_model->add_comment($data);
                echo json_encode(["comment" => "hello"]);
            }else{
                $data = array(
                    'error' => validation_errors()
                );  
                echo json_encode($data);
                }
    }
    public function edit_comment($comment_id, $post_id){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['comment'] = $this->news_model->get_post_comment($comment_id, $post_id);
        if( $data['comment'] != '' ){
            $this->load->view('header'); 
            $this->load->view('edit_comment', $data); 
        }else{
            show_404();
        }
    }
    public function update_comment(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('comment_body', 'Comment', 'required');
        $post_slug = $this->input->post('post_slug');
            if ($this->form_validation->run())  
            {  
                $data = array(
                    'comment_id' => $this->input->post('comment_id'),
                    'comment_body' => $this->input->post('comment_body')
                );
                $this->news_model->update_comment($data);
                echo json_encode($data);
            }else{
                $data = array(
                    'error' => validation_errors()
                );  
                echo json_encode($data);
                }       
    }
    public function dashboard(){
        if (empty($_SESSION['isAdmin']))
        {
                show_404();
        }else{
            if($_SESSION['isAdmin'] == 1){
                $data['news'] = $this->news_model->get_news();
                $data['num_post'] = $this->db->count_all('news');
                $this->load->view('header'); 
                $this->load->view('dashboard', $data); 
            }else{
                show_404();
            }
        }
    }
}

?>