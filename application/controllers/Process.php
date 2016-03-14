<?php

class Process extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function authenticate(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->admin_model->auth($username, $password);

        if (! (empty($user))){
            if (! $user[0]['is_admin']){
                $this->session->set_userdata('isLogged', true);
                $this->session->set_userdata('authorUsername', $username);
                $this->session->set_userdata('first_name', $user[0]['first_name']);
                $this->session->set_userdata('last_name', $user[0]['last_name']);
                $this->session->set_userdata('authorId', $user[0]['id']);
                redirect('author/home');
            }else{
                redirect('author/login');
            }
        }

        redirect('author/login');
    }

    public function create(){
        $this->load->library('markdown');
        $author = $this->session->userdata('first_name').' '.$this->session->userdata('last_name');
        $heading = $this->input->post('title');
        $content = $this->markdown->defaultTransform($this->input->post('blog_content'));
        $summary = $this->input->post('blog_summary');
        $tags = $this->input->post('tags');
        $coverImage = $this->input->post('featuredImage');
        $category_id = $this->input->post('category');
        $sort = $this->input->post('sort');
        $slug = url_title($heading);
        $posted_on = date('Y-m-d');
        $created_at = date('Y-m-d').' '.date('h:i:s');

        if (!empty($sort))
            $sort = 0;

        $tagArray = $this->create_tags($tags);
        
        $blogId = $this->admin_model->create_blog($author, $heading, $content, $summary, $coverImage, $category_id, $sort, $slug, $posted_on, $created_at, $tagArray);

        if (! empty($blogId)){
            $this->admin_model->map_user_blogs($this->session->userdata('authorId'), $blogId);
        }
        
        redirect('author/home');
    }
    private function create_tags($tags){
        $tagArray = explode(',', $tags);
        return $tagArray;
    }

    # update blog 
    public function update(){
        $this->load->library('markdown');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $this->input->post('blogId');
            $heading = $this->input->post('title');
            $content = $this->markdown->defaultTransform($this->input->post('blog_content'));
            $summary = $this->input->post('blog_summary');
            $coverImage = $this->input->post('featuredImage');
            $category_id = $this->input->post('category');
            $sort = $this->input->post('sort');
            if (empty($sort))
                $sort = 0;
            $this->admin_model->update_blog($id, $heading, $content, $summary, $coverImage, $category_id, $sort);
            
            redirect('author/blog-edit/'.$id);       
        }
    }

}