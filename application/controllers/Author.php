<?php

class Author extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if (! $this->session->userdata('isLogged'))
            redirect('author/login');
    }

    public function index(){
        redirect('author/home');
    }

    /**
     * @param $username
     */
    public function profile($username){
        $data['title'] = $username;
        $data['setProfileActive'] = "active";
        $userId = $this->admin_model->_getData('users', ['username' => $username], 'id');
        $data['user'] = $this->admin_model->_getData('user_profiles', ['user_id' => $userId]);
        $this->load->view('layout/_author_header', $data);
        $this->load->view('layout/_author_top_nav', $data);
        $this->load->view('author/profile', $data);
        $this->load->view('layout/_author_footer', $data);
    }

    public function home(){
        $data['title'] = 'Home';
        $data['setHomeActive'] = 'active';
        $data['blogs'] = $this->admin_model->get_user_blogs($this->session->userdata('authorId'));
        $this->load->view('layout/_author_header', $data);
        $this->load->view('layout/_author_top_nav', $data);
        $this->load->view('author/home', $data);
    }

    public function compose(){
        $data['title'] = 'Compose';
        $data['setComposeActive'] = 'active';
        $data['categories'] = $this->admin_model->get_categories();

        $data['scripts'] = ['http://cdn.ckeditor.com/4.5.1/full/ckeditor.js'];

        $this->load->view('layout/_author_header', $data);
        $this->load->view('layout/_author_top_nav', $data);
        $this->load->view('author/compose', $data);
        $this->load->view('layout/_author_footer', $data);
    }

    public function blogEdit($id){
        $data['title'] = 'Edit Blog';
        $data['blog'] = $this->admin_model->get_blog($id);
        $data['blogId'] = $id;
        $data['heading'] = $data['blog'][0]['heading'];
        $data['categories'] = $this->admin_model->get_categories();

        $data['scripts'] = ['http://cdn.ckeditor.com/4.5.1/full/ckeditor.js'];
        
        $this->load->view('layout/_author_header', $data);
        $this->load->view('layout/_author_top_nav', $data);
        $this->load->view('author/blog-edit', $data);
        $this->load->view('layout/_author_footer', $data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('author/login');
    }
}