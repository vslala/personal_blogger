<?php

class Site extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->helper('html_helper');
        $this->load->helper('url');
    }

    public function cryptMD5($term){
        var_dump(md5($term));die();
    }

    public function searchResults(){
        $data['title'] = "Search Results";
        $data['cover_subheading'] = 'Ooops... There was no matching blog with your search terms!';
        $data['cover_heading'] = 'No Match Found!';
        $count = 0;

        $this->load->view('layout/_header', $data);
        $this->load->view('layout/_top_nav', $data);
        $this->load->view('site/google-search',  $data);
        $this->load->view('layout/_footer', $data);

    }

    public function google7d2ff02ca99d8ba7(){
        $this->load->view('site/google7d2ff02ca99d8ba7.html');
    }

    public function sitemap(){
        $data['data'] = $this->blog_model->get_all_blogs();//select urls from DB to Array
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",$data);
    }

    public function index($count=0){
        $this->load->helper('form_helper');
        
        $title = 'Varun Shrivastava\'s Blog';  
        $count += 5;
     
        $data['title'] = $title;
        $data['setHomeActive'] = 'active';
        $data['setAboutActive'] = '';
        $data['setContactActive'] = '';
        $data['cover_image_url'] = base_url().'img/home-bg.jpg';
        $data['cover_heading'] = "Varun Shrivastava";
        $data['cover_subheading']= '(Web Developer, Graphics Designer, Motivational Speaker)';
        $data['count'] = $count;
        $data['blogs'] = $this->blog_model->get_blogs($count);
        $data['layout'] = $this->blog_model->get_layout('home');
        $data['categories'] = $this->blog_model->get_categories();
        
        if(isset($data['layout'][0])){
            $data['cover_image_url'] = $data['layout'][0]['cover_image'];
        }
        if(isset($data['layout'][0])){
            $data['cover_heading'] = $data['layout'][0]['cover_heading'];
        }
        if(isset($data['layout'][0])){
            $data['cover_subheading'] = $data['layout'][0]['cover_subheading'];
        }
        
        $this->load->view('layout/_header', $data);
        $this->load->view('layout/_top_nav', $data);
        $this->load->view('layout/_cover_image', $data);
        $this->load->view('site/index',  $data);
        $this->load->view('layout/_footer', $data);
    }

    public function getAsyncBlogs(){
        $blogs = $this->blog_model->get_blogs();
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->output->set_output(json_encode($blogs));
    }
    
    public function about(){
        $data['title'] = 'Varun Shrivastava - About Me';
        $data['setHomeActive'] = '';
        $data['setAboutActive'] = 'active';
        $data['setContactActive'] = '';
        $data['i'] = 0;
        $data['about'] = $this->blog_model->get_about();
        $data['projects'] = $this->blog_model->get_projects();

        
        $this->load->view('layout/_header', $data);
        $this->load->view('layout/_top_nav', $data);
        $this->load->view('layout/_about_cover', $data);
        $this->load->view('site/about',  $data);
        $this->load->view('layout/_footer', $data);
    }

    public function mobileAbout(){
        $about = $this->blog_model->get_about();
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->output->set_output(json_encode($about));
    }

    public function product(){
        $data['title'] = 'Products';
        $data['setProductActive'] = 'active';
        $data['cover_heading'] = 'Products';
        $data['cover_subheading'] = 'These are the products that I sell!';
        $data['layout'] = $this->blog_model->get_layout('product');
        $data['products'] = $this->blog_model->get_products();
        
        $this->load->view('layout/_header', $data);
        $this->load->view('layout/_top_nav', $data);
        $this->load->view('layout/_cover_layout', $data);
        $this->load->view('site/product',  $data);
        $this->load->view('layout/_footer', $data);
    }

    public function product_description($id, $name){
        $this->load->helper('form_helper');

        $data['title'] = 'Products';
        $data['setProductActive'] = 'active';
        $data['cover_heading'] = 'Product Description';
        $data['cover_subheading'] = 'Why Would you need this product!';
        $data['layout'] = $this->blog_model->get_layout('product_description');
        $data['products'] = $this->blog_model->get_product_by_id($id);
        $data['product_images'] = $this->blog_model->get_product_images($id);
        $data['iterate'] = count($data['product_images']);
        $data['uri'] = current_url();
        $data['count'] = 0;

        if(empty($data['layout'])){
            $data['layout'] = false;
        }

        $this->load->view('layout/_header', $data);
        $this->load->view('layout/_top_nav', $data);
        $this->load->view('site/product_description',  $data);
        $this->load->view('layout/_footer', $data);
    }

    public function product_contact(){
        $name = $this->input->post('name');
        $occupation = $this->input->post('occupation');
        $email = $this->input->post('email');
        $telephone = $this->input->post('telephone');
        $subject = $this->input->post('subject');

        $this->blog_model->save_product_contact($name,$occupation,$email,$telephone,$subject);

        $data['response'] = ['message'=>'The contact has been stored successfully!'];
        return json_encode($data['response']);
    }
    
    public function contact(){
        $this->load->helper('form');
        $data['title'] = 'Varun Shrivastava - Contact Me';
        $data['setHomeActive'] = '';
        $data['setAboutActive'] = '';
        $data['setContactActive'] = 'active';
        $data['layout'] = $this->blog_model->get_layout('contact');
        $data['about'] = $this->blog_model->get_layout('contact');

        // $this->output->cache(70560);
        
        $this->load->view('layout/_header', $data);
        $this->load->view('layout/_top_nav', $data);
        $this->load->view('functions/layout', $data);
        $this->load->view('layout/_about_cover', $data);
        $this->load->view('site/contact',  $data);
        $this->load->view('layout/_footer', $data);
    }
    
    public function save_contact(){
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $message = $this->input->post('message');
        $this->blog_model->save_contact($name, $email, $phone, $message);

        $this->load->library('email');

        $this->email->from($email, $name);
        $this->email->to('me@varunshrivastava.in'); 
        $this->email->cc('varunshrivastava007@gmail.com'); 

        $this->email->subject(substr($message, 0, 120));
        $this->email->message($message);  

        $this->email->send();

        // echo $this->email->print_debugger();
        
        return true;
    }

    public function newBlog ($slug) { 
        $heading = str_replace('-', ' ', $slug);
        $data['title'] = $heading;
        $this->load->helper ('cookie');
        $date_posted = NULL;

        $data['blog'] = $this->blog_model->get_new_blog($slug); 
        $id = $data['blog'][0]['id'];
        $data['mostViewed'] = $this->blog_model->get_most_viewed_blog(4);
        $data['recentPosts'] = $this->blog_model->get_recent_blogs(4);
        if(isset($data['blog']['0']['posted_on']))
            $date_posted = $data['blog']['0']['posted_on'];
        else
            $date_posted = $data['blog'][0]['created_at'];
        $data['cover_heading'] = $data['blog'][0]['heading'];
        $data['cover_subheading'] = "Posted by <a href='#'>".$data['blog'][0]['author']."</a> ".$date_posted;
        $data['uri'] = current_url();
        $data['tags'] = $this->blog_model->get_blog_tags($data['blog'][0]['id']);
        $userId = $this->blog_model->get_user_id_from_blog_id($id);
        if (!empty($userId)){
            $data['authorProfile'] = $this->admin_model->_getData('user_profiles', ["user_id"=>$userId[0]['user_id']]);
            $data['socialHandles'] = $this->blog_model->getSocialHandles($userId[0]['user_id']);
        }
        $data['categories'] = $this->blog_model->get_categories();

        $data['footerContent'] = "set"; // sets footer for blog page

        $cookie_val = get_cookie('blog'.$id);
        if($cookie_val == '' || $cookie_val == null){
            set_cookie('blog'.$id, $id, (60*60*24*7));
            $data['blog_views'] = $this->blog_model->increment_blog_view($id);
        }else{
            $data['blog_views'] = $this->blog_model->get_blog_views($id);
        }

        $data['css'] = ['https://cdn-images.mailchimp.com/embedcode/slim-10_7.css'];
        
        $this->load->view('layout/_header', $data);
        $this->load->view('layout/_top_nav', $data);
        $this->load->view('layout/_post_cover', $data);
        $this->load->view('site/post',  $data);
        $this->load->view('layout/_footer', $data);
    }
    
    public function blog($id, $heading){
        // with 301 redirect
        redirect($heading, 'location', 301);
        $this->load->helper('cookie');
        $this->load->library('markdown');
        
        $date_posted = NULL;
        $heading = str_replace('-', ' ', $heading);
        $data['title'] = $heading;
        $data['blog'] = $this->blog_model->get_blog($id);
        $data['mostViewed'] = $this->blog_model->get_most_viewed_blog(4);
        $data['recentPosts'] = $this->blog_model->get_recent_blogs(4);
        if(isset($data['blog']['0']['posted_on']))
            $date_posted = $data['blog']['0']['posted_on'];
        else
            $date_posted = $data['blog'][0]['created_at'];
        $data['cover_heading'] = $data['blog'][0]['heading'];
        $data['cover_subheading'] = "Posted by <a href='#'>".$data['blog'][0]['author']."</a> ".$date_posted;
        $data['uri'] = current_url();
        $data['tags'] = $this->blog_model->get_blog_tags($data['blog'][0]['id']);
        $userId = $this->blog_model->get_user_id_from_blog_id($id);
        if (!empty($userId)){
            $data['authorProfile'] = $this->admin_model->_getData('user_profiles', ["user_id"=>$userId[0]['user_id']]);
            $data['socialHandles'] = $this->blog_model->getSocialHandles($userId[0]['user_id']);
        }
        $data['categories'] = $this->blog_model->get_categories();


        // $related_blogs = $this->blog_model->get_related_blog_id($id);
        // $blogs = array();

        // foreach ($related_blogs as $row) {

        //     array_push($blogs, $this->blog_model->get_blog($row['related_blog_id']));
        // }

        // $data['related_blogs'] = $blogs;        
        $data['footerContent'] = "set"; // sets footer for blog page

        $cookie_val = get_cookie('blog'.$id);
        if($cookie_val == '' || $cookie_val == null){
            set_cookie('blog'.$id, $id, (60*60*24*7));
            $data['blog_views'] = $this->blog_model->increment_blog_view($id);
        }else{
            $data['blog_views'] = $this->blog_model->get_blog_views($id);
        }

        $data['css'] = ['https://cdn-images.mailchimp.com/embedcode/slim-10_7.css'];
        
        $this->load->view('layout/_header', $data);
        $this->load->view('layout/_top_nav', $data);
        $this->load->view('layout/_post_cover', $data);
        $this->load->view('site/post',  $data);
        $this->load->view('layout/_footer', $data);
    }

    public function getBlog($id){
        $blogs = $this->blog_model->get_blog($id);
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->output->set_output(json_encode($blogs));
    }
    
    public function search($terms=NULL){
        if($terms == NULL){
            $terms = $this->input->post('search');
            if(empty($terms)){
                $terms = '123never123-/found';
            }
        }
        $data['title'] = "Search Result";
        $data['blogs'] = $this->blog_model->search_blogs($terms);
		$data['cover_image_url'] = 'http://www.snhills.com/images/services-banner2.png';
        
        if(count($data['blogs']) <= 0){
            $data['cover_subheading'] = 'Ooops... There was no matching blog with your search terms!';
            $data['cover_heading'] = 'No Match Found!';
            $count = 0;
        }else{
            $count = count($data['blogs']);
            $data['cover_heading'] = 'Search Results';
            $data['cover_subheading'] = 'Found <strong>'.  $count .'</strong> results... ';
        }
        
        
        $this->load->view('layout/_header', $data);
        $this->load->view('layout/_top_nav', $data);
        $this->load->view('layout/_post_cover', $data);
        $this->load->view('site/search',  $data);
        $this->load->view('layout/_footer', $data);
    }
    
    public function category($id, $category){
        $data['title'] = 'Blogs By Category';
        $data['blogs'] = $this->blog_model->get_blogs_by_category($id);
        $data['cover_heading'] = $category.' Blogs';
        $data['cover_subheading'] = "Below is the list of all the blogs under the selected category";
        
        $this->load->view('layout/_header', $data);
        $this->load->view('layout/_top_nav', $data);
        $this->load->view('layout/_post_cover', $data);
        $this->load->view('site/search',  $data);
        $this->load->view('layout/_footer', $data);
    }
    
    public function portfolio(){
        $data['title'] = 'Portfolio';
        $data['setPortfolioActive'] = 'active';
        $data['cover_heading'] = 'Portfolio';
        $data['cover_subheading'] = 'These are my project works uptil now! Hope you find it appreciable! :D';
        $data['projects'] = $this->blog_model->get_projects();
        $data['layout'] = $this->blog_model->get_layout('portfolio');
        $data['css'] = [base_url().'css/build/toggle/css/style.css', 'https://fonts.googleapis.com/css?family=Righteous'];
        $data['scripts'] = ['js/build/toggle/js/toggle.min.js'];
        if(count($data['layout']) <= 0)
            $data['layout'] = NULL;

        $this->output->cache(70560);
        
        $this->load->view('layout/_header', $data);
        $this->load->view('layout/_top_nav', $data);
        $this->load->view('layout/_cover_layout', $data);
        $this->load->view('site/portfolio',  $data);
        $this->load->view('layout/_footer', $data);
    }

    public function authorLogin(){
        if ($this->session->userdata('isLogged'))
            redirect('author/home');
        $data['title'] = 'Login';

        $this->load->view('layout/_author_header', $data);
        $this->load->view('author/login', $data);
        // $this->load->view('layout/_footer');
    }

    ### OFFER GET FUNCTION ###
    public function offers($offerId = null){
        $data['title'] = 'Offers';

        if (! empty($offerId)){
            $data['offer'] = $this->admin_model->getOfferDetails($offerId);
        } else{
            $data['offers'] = $this->admin_model->getOfferDetails();
        }
        $data['layout'] = $this->blog_model->get_layout('offer');
        $data['css'] = ['https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', '//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css'];
 
        $this->load->view('layout/_header', $data);
        $this->load->view('layout/_top_nav', $data);
        $this->load->view('site/offers', $data);
        $this->load->view('layout/_footer', $data);
    }

    
}
