<?php

class Admin extends CI_Controller{
    public function __construct() {
        parent::__construct();

        $this->load->library('session');
    }
    
    private function checkAuth(){
        if($this->session->userdata('username') == NULL){
            redirect('admin/login');
        }
    }
    
    private function loggedIn(){
        if($this->session->userdata('username') !== NULL){
            redirect('admin/home');
        }
    }
    
    public function index(){
        redirect('admin/login');
    }
    
    public function login(){  
        $this->loggedIn();
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if (!(empty($username) || empty($password)))
            $auth = $this->admin_model->auth($username, $password);
        
        if(isset($auth[0])){
            $this->session->set_userdata(['username'=>$auth[0]['username']]);
            $this->session->set_userdata('first_name', $auth[0]['first_name']);
            $this->session->set_userdata('last_name', $auth[0]['last_name']);
            $this->session->set_userdata('is_admin', true);
            redirect('admin/home');
        }
        
        $data['title'] = 'Login';
 
        $this->load->view('layout/_admin_header', $data);
        $this->load->view('admin/login', $data);
        $this->load->view('layout/_footer');
    }

    // public function createUser($username, $password, $firstName, $lastName, $isAdmin){
    //     $flag = $this->admin_model->create_user($username, $password, $firstName, $lastName, $isAdmin);

    //     if ($flag){
    //         echo 'Successfully';
    //     }else{
    //         echo "Kaam Dal Gayo!";
    //     }
    // }
    
    public function home(){
        $this->checkAuth();
        $data['title'] = "Home";
        $data['setHomeActive'] = 'active';
        $data['blogs'] = $this->admin_model->get_blogs();
        
        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/home', $data);
        $this->load->view('layout/_footer', $data);
    }
    
    public function project(){
        $this->checkAuth();
        $data['title'] = "Projects";
        $data['setProjectActive'] = 'active';
        $data['projects'] = $this->admin_model->get_projects();
        
        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/project', $data);
        $this->load->view('layout/_footer');
    }
    
    public function project_edit($id){
        $this->checkAuth();
        $data['title'] = 'Edit Project';
        $data['setProjectActive'] = 'active';
        $data['project'] = $this->admin_model->get_project($id);
        
        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/edit_project', $data);
        $this->load->view('layout/_footer');
    }
    
    public function project_update(){
        $this->checkAuth();
        $id = $this->input->post('id');
        $title = $this->input->post('projectTitle');
        $link = $this->input->post('projectLink');
        $projectDescription = $this->input->post('projectDescription');
        $projectImage = $this->input->post('projectImage');
        
        $flag = $this->admin_model->update_project($title, $link, $projectDescription, $projectImage,$id);
        
        if($flag){
            redirect('admin/project');
        }
    }
    
    public function project_delete($id){
        $this->checkAuth();
        $this->admin_model->delete_project($id);
        return "Delete Successfully";
    }
    
    public function create_project(){
        $this->checkAuth();
        $title = $this->input->post('projectTitle');
        $link = $this->input->post('projectLink');
        $content = $this->input->post('projectDescription');
        $project_image = $this->input->post('projectImage');
        $this->admin_model->create_project($title, $link, $content, $project_image);
        
        redirect('admin/project');
    }
    
    public function about(){
        $this->checkAuth();
        $data['title'] = 'About';
        $data['setAboutActive'] = 'active';
        $data['about'] = $this->admin_model->get_about();
        
        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/about', $data);
        $this->load->view('layout/_footer');
    }
    
    public function update_about(){
        $this->checkAuth();
        $id = $this->input->post('id');
        $content = $this->input->post('content');
        $coverImage = $this->input->post('coverImage');
        $coverHeading = $this->input->post('coverHeading');
        $coverSubHeading = $this->input->post('coverSubHeading');
        
        $this->admin_model->update_about($content, $coverImage, $coverHeading, $coverSubHeading, $id);
        
        redirect('admin/about');     
    }
    
    public function compose(){
        $this->checkAuth();
        $data['title'] = 'Compose';
        $data['setComposeActive'] = 'active';
        $data['categories'] = $this->admin_model->get_categories();
        
        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/compose', $data);
        $this->load->view('layout/_footer');
    }
    
    public function create(){
        $this->load->library('markdown');
        $this->checkAuth();
        $author = $this->session->userdata('first_name').' '.$this->session->userdata('last_name');
        $heading = $this->input->post('heading');
        $content = $this->markdown->defaultTransform($this->input->post('text_content'));
        $summary = $this->input->post('summary');
        $tags = $this->input->post('tags');
        $coverImage = $this->input->post('coverImage');
        $category_id = $this->input->post('category');
        $sort = $this->input->post('sort');
        $slug = url_title($heading);
        $posted_on = $this->input->post('posted_on');
        $created_at = date('Y-m-d').' '.date('h:i:s');

        $tagArray = $this->create_tags($tags);
        
        $this->admin_model->create_blog($author, $heading, $content, $summary, $coverImage, $category_id, $sort, $slug, $posted_on, $created_at, $tagArray);
        
        redirect('admin/home');
    }
    
    public function edit($id,$heading,$sort){
        $this->checkAuth();
        
        $heading = str_replace('-', ' ', $heading);
        $data['title'] = 'Edit Blog';
        $data['blog'] = $this->admin_model->get_blog($id);
        $data['blogId'] = $id;
        $data['heading'] = $data['blog'][0]['heading'];
        $data['sort'] = $sort;
        $data['categories'] = $this->admin_model->get_categories();
        $data['blogs'] = $this->admin_model->get_blogs();
        
        $related_blogs = array();
        $related_blogs_id = $this->admin_model->get_all_related_blogs_id($id);
        foreach($related_blogs_id as $rb){
            $blog = $this->admin_model->get_blog($rb['related_blog_id']);
            array_push($related_blogs, $blog);
        }

        $data['related_blogs'] = $related_blogs;
        
        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/edit_blog', $data);
        $this->load->view('layout/_footer');
    }
    
    public function update(){
        $this->checkAuth();
        $this->load->library('markdown');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $this->input->post('blogId');
            $heading = $this->input->post('heading');
            $content = $this->markdown->defaultTransform($this->input->post('text_content'));
            $summary = $this->input->post('summary');
            $coverImage = $this->input->post('coverImage');
            $category_id = $this->input->post('category');
            $sort = $this->input->post('sort');
            $this->admin_model->update_blog($id, $heading, $content, $summary, $coverImage, $category_id, $sort);
            
            redirect('admin/edit/'.$id.'/'.url_title($heading).'/'.$sort);       
        }
    }

    public function singleBlog($blog_id, $r_blog_id){
        $this->admin_model->insert_related_blog($r_blog_id, $blog_id);
        $data['blog'] = $this->admin_model->get_blog($r_blog_id);
        $heading = $data['blog'][0]['heading'];
        $id = $data['blog'][0]['id'];
        $blog = ['heading'=>$heading, 'id'=>$id];
        header('Content-Type: application/json');
        echo json_encode($blog);
    }

    public function deleteRelatedBlog($id){
        $this->admin_model->delete_related_blog($id);
    }
    
    public function delete($id){
        $this->checkAuth();
        $this->admin_model->delete_blog($id);
        redirect('admin/home');
    }
    
    public function layout(){
        $this->checkAuth();
        $data['title'] = 'Layouts';
        $data['setLayoutActive'] = 'active';
        $data['layouts'] = $this->admin_model->get_layouts();
        
        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/layout', $data);
        $this->load->view('layout/_footer');
    }
    
    public function create_layout(){
        $this->checkAuth();
        $forPage = $this->input->post('forPage');
        $coverHeading = $this->input->post('coverHeading');
        $coverSubHeading = $this->input->post('coverSubHeading');
        $coverImage = $this->input->post('coverImage');
        
        $this->admin_model->create_layout($forPage,$coverImage,$coverHeading,$coverSubHeading);
        
        echo true;
        return true;
        redirect('admin/layout');
    }
    
    public function delete_layout($forPage){
        $this->checkAuth();
        $this->admin_model->delete_layout($forPage);
        echo true;
        return true;
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('admin/login');
    }
    
    public function contact(){
        $data['title'] = 'Contact Me';
        $data['setContactActive'] = 'active';
        $data['unread_contacts'] = $this->admin_model->get_contacts(true);
        $data['read_contacts'] = $this->admin_model->get_contacts(false);
        $data['customerResponse'] = $this->admin_model->get_customers_response();
        
        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/contact', $data);
        $this->load->view('layout/_footer');
    }
    
    public function category(){
        $data['title'] = 'Category';
        $data['setCategoryActive'] = 'active';
        $data['categories'] = $this->admin_model->get_categories();
        
        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/category', $data);
        $this->load->view('layout/_footer');
    }
    
    public function category_add(){
        $category = $this->input->post('category');
        $sort = $this->input->post('sort');
        $this->admin_model->add_category($category, $sort);
        redirect('admin/category');
        return true;
    }
    
    public function category_edit(){
        $category = $this->input->post('category');
        $sort = $this->input->post('sort');
        $id = $this->input->post('category_id');
        $this->admin_model->edit_category($category, $sort, $id);
        $data['category'] = $this->admin_model->get_category_by_id($id);

        return json_encode($data['category']);
    }

    public function product(){
        $data['title'] = 'Products';
        $data['setProductActive'] = 'active';
        $data['products'] = $this->admin_model->get_products();

        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/product', $data);
        $this->load->view('layout/_footer');
    }

    public function product_add(){
        $data['title'] = 'Add Product';

        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/product_add', $data);
        $this->load->view('layout/_footer');
    }

    public function product_create(){
        $name = $this->input->post('name');
        $title = $this->input->post('title');
        $tagLine = $this->input->post('tagLine');
        $description = $this->input->post('description');
        $imageUrl = $this->input->post('imageUrl');
        $status = $this->input->post('status');

        $this->admin_model->create_product($name, $title, $tagLine, $description, $imageUrl, $status);

        redirect('admin/product_add');
    }

    public function product_edit($id){
        $data['title'] = 'Product Edit';
        $data['product'] = $this->admin_model->get_product_by_id($id);

        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/product_edit', $data);
        $this->load->view('layout/_footer');
    }

    public function product_update(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $title = $this->input->post('title');
        $tagLine = $this->input->post('tagLine');
        $description = $this->input->post('description');
        $imageUrl = $this->input->post('imageUrl');
        $status = $this->input->post('status');

        $this->admin_model->update_product($name, $title, $tagLine, $description, $imageUrl, $status, $id);

        redirect('admin/product_edit/'.$id);
    }

    public function product_delete($id){
        $this->admin_model->product_delete($id);
        redirect('admin/product');
    }

    public function product_images_add(){
        $productId = $this->input->post('productId');
        $name = $this->input->post('name');
        $src = $this->input->post('src');
        $caption = $this->input->post('caption');
        $data['productId'] = ['data'=>$productId];

        $this->admin_model->add_product_images($productId, $name, $src, $caption);
        return json_encode($data['productId']);
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

            if (! is_dir($imagePath.'/thumbs'))
                mkdir($imagePath.'thumbs');
            # Generate Thumbnail
            $config['image_library'] = 'gd2';
            $config['source_image']	= $image_location;
            $config['new_image'] = $imagePath.'/thumbs/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']	= 250;
            $config['height']	= 108;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $data = ['url'=>base_url().'img/blogs/'.$dir.'/'.$image_name];
            $this->output->set_header('Access-Control-Allow-Origin: *');
            $this->output->set_output(json_encode($data));
            return ;
        } else {
            $this->session->set_flashdata('warning', 'Image location was not found!');
        }
    }

    ### OFFER CRUD BELOW ###

    public function showOffers(){
        $data['title'] = "Offers";
    }

    public function offerCreateForm(){
        $data['title'] = "Create-offer";

        $this->load->view('layout/_admin_header', $data);
        $this->load->view('layout/_admin_top_nav', $data);
        $this->load->view('admin/create-offer', $data);
        $this->load->view('layout/_footer');

    }

    public function createOffer(){
        $offerData = $this->input->post();
        $datetime = $this->getDateTime();
        $newArray = [
            'created_at' => $datetime['date'].' '.$datetime['time'],
            'offer_id' => substr(uniqid(), 0, 7)
        ];
        $offerData = array_merge($offerData, $newArray);
        $flag = $this->admin_model->saveData($offerData);
        if ($flag){
            redirect('showOffers');
        }

        show_404();
    }

    /**
    * @return array
    */
    function getDateTime(){
        $date = date('Y-m-d');
        $time = date('h:i:s');
        $datetime = [
            'date' => $date,
            'time' => $time
        ];
        return $datetime;
    }
    
    private function create_tags($tags){
        $tagArray = explode(',', $tags);
        return $tagArray;
    }

    # Checks if the image is in the appropriate type or not
    private function check_image($image_url, $image_path = 'img/blogs/'){
        # fetch file extension from the file and check for valid extension
        $file_extension = explode('.', $image_url);
        $file_extension = $file_extension[count($file_extension)-1];
        $uniq_name = uniqid();
        $image_location = $image_path.$uniq_name.'.';

        if ($file_extension == 'jpg'){
            $image_location .= 'jpg';
        } else if($file_extension == 'jpeg'){
            $image_location .= 'jpg';
        } else if($file_extension == 'png'){
            $image_location .= 'jpg';
        } else if ($file_extension == 'gif'){
            $image_location .= $file_extension;
        } else{
            return NULL;
        }
        return $image_location;
    }
}
        
