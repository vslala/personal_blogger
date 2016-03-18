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
            $content = $this->input->post('blog_content');
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

    # SAVE IMAGE TO THE SERVER

    # Checks if the image is in the appropriate type or not
    private function check_image($image_url, $image_path = 'img/blogs/'){
        $file_extension = explode('.', $image_url);
        $file_extension = $file_extension[count($file_extension)-1];
        $uniq_name = uniqid();
        $image_location = $image_path.$uniq_name.'.';

        if ($file_extension == 'jpg'){
            $image_location .= $file_extension; 
        } else if($file_extension == 'jpeg'){
            $image_location .= $file_extension;
        } else if($file_extension == 'png'){
            $image_location .= $file_extension;
        } else if ($file_extension == 'gif'){
            $image_location .= $file_extension;
        } else{
            return NULL;
        }
        return $image_location;
    }
    public function saveImage(){
        $imageUrl = $this->input->post('image_url');
        $dir = $this->input->post('dir');
        $imagePath = null;

        if (! empty($dir)){
            if (! file_exists(FCPATH.'img/blogs/'.$dir)){
                mkdir(FCPATH.'img/blogs/'.$dir);
                $imagePath = FCPATH.'img/blogs/'.$dir.'/';
            }
            $imagePath = FCPATH.'img/blogs/'.$dir.'/';
        }


        $image = NULL;
        $image_location = $this->check_image($imageUrl, $imagePath);

        if (!empty($image_location)){
            $file_contents = file_get_contents($imageUrl);
            file_put_contents($image_location, $file_contents);
            $image_name = explode('/', $image_location);
            $image_name = $image_name[count($image_name) - 1];
            $image = $imagePath.$image_name;

            $data = ['url'=>base_url().'img/blogs/'.$dir.'/'.$image_name];
            $this->output->set_header('Access-Control-Allow-Origin: *');
            $this->output->set_output(json_encode($data));
            return ;
        } else {
            $this->session->set_flashdata('warning', 'Image location was not found!');
        }
    }

    public function editUserDetails(){
        $formData = $this->input->post();
        $flag = $this->admin_model->editUserDetails($formData);
        if ($this->input->is_ajax_request()){
            if ($flag)
                return $formData['type']." saved";
        }

        redirect('author/profile/'.$this->session->userdata('authorUsername'));
    }

}