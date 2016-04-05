<?php

class Blog_Model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    
    public function get_blogs($count = 0) {
        $u = $count;
        $l = $count-5;
        $this->db->order_by('sort', 'asc');
        $query = $this->db->get('blogs', $u,$l);
        return $query->result_array();
    }

    public function get_all_blogs(){
        $query = $this->db->get('blogs');
        return $query->result_array();
    }
    
    public function get_most_viewed_blog($blogCount = 3){
        $this->db->select('id, heading, summary, cover_image_dir, cover_image, slug, views');
        $this->db->order_by('views', 'DESC');
        $this->db->limit($blogCount);
        $query = $this->db->get('blogs');
        return $query->result_array();
    }

    public function get_recent_blogs($blogCount = 5){
        $this->db->select('id, heading, summary, cover_image_dir, cover_image, slug, views');
        $this->db->order_by('posted_on', 'desc');
        $this->db->limit($blogCount);
        $query = $this->db->get('blogs');
        return $query->result_array();
    }

    public function get_about(){
        $query = $this->db->get('about');
        return $query->result_array();
    }
    
    public function get_projects(){
        $query = $this->db->get('projects');
        return $query->result_array();
    }
    
    public function get_layout($for_page){
        $sql = "SELECT * FROM layout WHERE `for_page`= ?";
        $query = $this->db->query($sql, [$for_page]);
        return $query->result_array();
    }
    
    public function get_blog($id){
        $sql = "SELECT * FROM blogs WHERE `id`=?";
        $query = $this->db->query($sql, [$id]);
        return $query->result_array();
    }
    
    public function increment_blog_view($id){
        $sql = "UPDATE blogs SET views=views+1 WHERE id=?";
        $query = $this->db->query($sql, [$id]);
        return $this->get_blog_views($id);
    }
    
    public function get_blog_views($id){
        $sql = "SELECT views FROM `blogs` WHERE `id`=?";
        $query = $this->db->query($sql, [$id]);
        return $query->result_array();
    }
    
    public function save_contact($name, $email, $phone, $message){
        $sql = "INSERT INTO contacts (name, email, phone, message) VALUES (?,?,?,?)";
        $query = $this->db->query($sql, [$name, $email, $phone, $message]);
    }
    
    public function get_blog_tags($blogId){
        $sql = "SELECT * FROM tags WHERE blog_id=?";
        $query = $this->db->query($sql, [$blogId]);
        return $query->result_array();
    }

    /**
     * @param $blogId
     * @return mixed
     */
    public function get_user_id_from_blog_id($blogId){
        $this->db->select('user_id');
        $query = $this->db->get_where('map_user_blogs', ['blog_id' => $blogId]);
        return $query->result_array();
    }

    public function getSocialHandles($userId){
        $sql = "SELECT social_handles.*, user_social_handles.handle_username
                FROM social_handles
                LEFT JOIN user_social_handles
                ON user_social_handles.social_handles_id = social_handles.id
                WHERE user_social_handles.user_id = ?";
        $query = $this->db->query($sql, [$userId]);
        return $query->result_array();
    }
    
    public function search_blogs($terms){
        $sql = "select blogs.id as id, blogs.heading, blogs.content from blogs
left join tags
on tags.blog_id=blogs.id
where blogs.heading LIKE '%$terms%'
or tags.tag LIKE '%$terms%'
group by blogs.id;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function get_categories(){
        $sql = "SELECT count(blogs.id) as total, categories.id as id, categories.name, blogs.id as blog_id from categories
left join blogs
on blogs.category_id = categories.id
group by categories.id;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function get_blogs_by_category($id){
        $sql = "SELECT * FROM blogs WHERE category_id=?;";
        $query = $this->db->query($sql, [$id]);
        return $query->result_array();
    }

    public function get_products(){
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function get_product_by_id($id){
        $query = $this->db->get_where('products', ['id'=>$id]);
        return $query->result_array();
    }

    public function get_product_images($id){
        $query = $this->db->get_where('product_images', ['product_id'=>$id]);
        return $query->result_array();
    }

    public function save_product_contact($name,$occupation,$email,$telephone,$subject){
        $data = [
            'name'=>$name,
            'occupation'=>$occupation,
            'email'=>$email,
            'telephone'=>$telephone,
            'subject'=>$subject
        ];

        $this->db->insert('customers', $data);
    }

    public function get_related_blog_id($blog_id){
        $sql = "SELECT related_blog_id FROM blog_related WHERE blog_id=?;";
        $query = $this->db->query($sql, [$blog_id]);
        return $query->result_array();
    }

}