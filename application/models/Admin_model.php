<?php

class Admin_model extends CI_Model{
     public function __construct(){
        $this->load->database();
    }

    // This section auth the user against database and returns true or false
    public function auth($username, $password){
        $query = $this->db->get_where('users', ['username'=>$username]);
        $user = $query->result_array();
        $password = md5($password);

        if ($user[0]['username'] == $username){
            if ($user[0]['password'] == $password){
                return $user;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * @param $username
     * @param $password
     * @param $firstName
     * @param $lastName
     * @param $isAdmin
     * @return bool
     */
    public function create_user($username, $password, $firstName, $lastName, $isAdmin){
        if ($isAdmin === 'true'){
            $isAdmin = true;
        } else{
            $isAdmin = false;
        }
        $data = [
            'username' => $username,
            'password' => md5($password),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'is_admin' => $isAdmin

        ];

        $this->db->insert('users', $data);

        if ($this->db->affected_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return bool
     */
    private function checkUserProfile(){
        $query = $this->db->get_where('user_profiles', ['user_id' => $this->session->userdata('authorId')]);
        $data = $query->result_array();

        if (count ($data > 0))
            return true;

        return false;
    }

    /**
     * @param $formData
     */
    public function editUserDetails($formData){

        if ($this->checkUserProfile() ){
            $type = $this->encrypt->decode($formData['type']);
            $this->db->where('user_id', $this->session->userdata('authorId'));
            switch ($type) {
                case 'about':
                    $this->db->update('user_profiles', ['about'=>$formData['about']]);
                    break;
                case 'summary':
                    $this->db->update('user_profiles', ['summary'=>$formData['summary']]);
                    break;
                case 'email':
                    $this->db->update('user_profiles', ['email'=>$formData['email']]);
                    break;
                case 'mobile':
                    $this->db->update('user_profiles', ['mobile'=>$formData['mobile']]);
                    break;
                case 'featured_image':
                    $folderPath = FCPATH.'img/users/'.$this->session->userdata('authorUsername');
                    # get the file name from the database and delete the file from the location
                    $fileName = $this->_getData('user_profiles', ['user_id' => $this->session->userdata('authorId')], 'featured_image');
                    # Check if file exists on server
                    if (file_exists(FCPATH.$fileName[0]['featured_image']))
                        unlink(FCPATH.$fileName[0]['featured_image']);
                    $fileName = "";

                    # Check if the folder path exists otherwise create it
                    if (! is_dir($folderPath)){
                        mkdir($folderPath, 0777, true);
                    }

                    # Set the file configuration
                    $config['upload_path'] = FCPATH.'img/users/'.$this->session->userdata('authorUsername');
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('featured_image'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump($error);die();
                    }
                    else
                    {
                        $data = array('upload_data' => $this->upload->data());
                        $fileUrl = 'img/users/'.$this->session->userdata('authorUsername').'/'.$data['upload_data']['file_name'];
                        $this->db->update('user_profiles', ['featured_image'=>$fileUrl]);
                    }
                    break;
                default:
                    return false;
                    break;
            }
            $affectedRowsCount = $this->db->affected_rows();
            if ($affectedRowsCount == 1)
                return true;
        }

        $this->db->insert('user_profiles', ['user_id' => $this->session->authorId]);
        editUserDetails($formData);

    }

    /**
     * description: if userID and handle website is already present then return true otherwise false
     * @param $formData
     * @return bool
     */
    public function checkSocialHandle($formData){
        unset($formData['handle_username']);
        $query = $this->db->get_where('user_social_handles', $formData);
        $data = $query->result_array();
        if (count ($data) == 1)
            return true;
        else
            return false;
    }
    /**
     * @param $formData
     * @return bool
     */
    public function addSocialHandle($formData){
        $formData = array_merge(['user_id'=>$this->session->userdata('authorId')], $formData);
        # if user's particular social handle is already present then update else insert
        if ($this->checkSocialHandle($formData))
        {
            $this->db->where(['user_id' => $formData['user_id'], 'social_handles_id' => $formData['social_handles_id']]);
            $this->db->update('user_social_handles', $formData);
        }
        else
        {
            $this->db->insert('user_social_handles', $formData);
        }

        $affectedRowsCount = $this->db->affected_rows();
        if ($affectedRowsCount == 1)
            return true;
        else
            return false;
    }

    /**
     * @param $tableName
     * @param array $conditions
     * @param bool $selection
     * @return mixed
     */
    public function _getData($tableName, $conditions = null, $selection = null){

        if (! empty($selection)){
            $this->db->select(compact('selection'));
        }

        if (! empty($conditions)){
            $query = $this->db->get_where($tableName, $conditions);
        }else{
            $query = $this->db->get($tableName);
        }
        return $query->result_array();
    }

    // public function auth($username, $password){
    //     if(md5($username) == md5('vs_lala')){
    //         if(md5($password) == md5('ucanthackitbuddy')){
    //             return true;
    //         }else{
    //             return false;
    //         }
    //     }else{
    //         return false;
    //     }
    // }

    public function getSocialHandles(){
        $sql = "SELECT social_handles.*, user_social_handles.handle_username
                FROM social_handles
                LEFT JOIN user_social_handles
                ON social_handles.id = user_social_handles.social_handles_id";

        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function get_blogs(){
        $this->db->order_by('sort', 'asc');
        $query = $this->db->get('blogs');
        return $query->result_array();
    }
    
    public function get_blog($id){
        $sql = "SELECT * FROM blogs WHERE id=?";
        $query = $this->db->query($sql, [$id]);
        return $query->result_array();
    }

    # Fetches all blogs related to a particular user
    /**
     * @param $userId
     * @return mixed
     */
    public function get_user_blogs($userId){
        $sql = 'SELECT blogs.* FROM blogs 
                LEFT JOIN map_user_blogs
                ON blogs.id=map_user_blogs.blog_id
                WHERE map_user_blogs.user_id = ?';
        $query = $this->db->query($sql, [$userId]);
        return $query->result_array();
    }

    /**
     * @param $id
     * @param $heading
     * @param $content
     * @param $summary
     * @param $coverImage
     * @param $category_id
     * @param $sort
     * @return bool
     */
    public function update_blog($id, $heading, $content, $summary, $coverImage, $category_id, $sort){
        $createUrlSegments = explode('/', $coverImage);
        $imageFolder = $createUrlSegments[count($createUrlSegments) - 2];
        $folderPath = base_url().'img/blogs/'.$imageFolder.'/';
        $data = [
            'heading' => $heading,
            'content' => $content,
            'summary' => $summary,
            'cover_image' => $coverImage,
            'cover_image_dir' => $folderPath,
            'category_id' => $category_id,
            'sort' => $sort
        ];
        $this->db->where('id', $id);
        $this->db->update('blogs', $data);
        $affected_rows = $this->db->affected_rows();
        
        if ($affected_rows == 1)
            return true;

        return false;
    }
    
    public function create_blog($author, $heading, $content, $summary, $coverImage, $category_id, $sort, $slug, $posted_on, $created_at, $tagArray){
        $createUrlSegments = explode('/', $coverImage);
        $imageFolder = $createUrlSegments[count($createUrlSegments) - 2];
        $folderPath = base_url().'img/blogs/'.$imageFolder.'/';
        $data = [
            'author'=>$author,
            'heading'=>$heading,
            'content'=>$content,
            'summary'=>$summary,
            'cover_image_dir' => $folderPath,
            'cover_image'=>$coverImage,
            'category_id'=>$category_id,
            'slug'=>$slug,
            'posted_on'=>$posted_on,
            'created_at' => $created_at,
            'sort'=>$sort
        ];
        $this->db->trans_start();
        $this->db->insert('blogs', $data);
        $blogId = $this->db->insert_id();
        $this->db->trans_complete();

        
        for($i=0; $i<count($tagArray);$i++){
            $data = [
                "blog_id" => $blogId,
                "tag" => $tagArray[$i] 
            ];
            $this->db->insert('tags', $data);
        }
        
        return $blogId;
    }

    public function insert_related_blog($r_blog_id, $blog_id){
        $data = [
            'blog_id'=>$blog_id,
            'related_blog_id'=>$r_blog_id
        ];

        $this->db->insert('blog_related', $data);
    }

    public function get_related_blogs($id){
        $sql = "SELECT blogs.id, blogs.heading FROM `blogs` 
LEFT JOIN blog_related 
ON blog_related.blog_id =blogs.id
WHERE blogs.id=?
GROUP BY blogs.id;";
        $query = $this->db->query($sql, [$id]);
        return $query->result_array();
    }

    public function get_all_related_blogs_id($id){
        $sql = "SELECT DISTINCT(related_blog_id) FROM blog_related
WHERE blog_id=?;";
        $query = $this->db->query($sql, [$id]);
        return $query->result_array();
    }

    public function delete_related_blog($id){
        $this->db->delete('blog_related', ['related_blog_id'=>$id]);
    }
    
    public function delete_blog($id){
        $this->db->delete('blogs', ['id'=>$id]);
    }
    
    public function get_projects(){
        $query = $this->db->get('projects');
        return $query->result_array();
    }
    
    public function get_project($id){
        $sql = "SELECT * FROM projects WHERE id=?";
        $query = $this->db->query($sql, [$id]);
        return $query->result_array();
    }
    
    public function create_project($title, $link, $content, $project_image='https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-xpt1/v/t1.0-9/10478536_920644664662603_7347306928843301299_n.jpg?oh=5a78e43633f20dbbd6aca1a0a1a74832&oe=5642D8D0&__gda__=1450264276_a7944e78a0d9bd6deb9a24eb07ad65d1'){
        $sql = "INSERT INTO projects (`title`,`link`,`description`, `project_image`) VALUES (?,?,?,?)";
        $this->db->query($sql, [$title,$link,$content,$project_image]);
    }
    
    public function update_project($title, $link, $content, $project_image='https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-xpt1/v/t1.0-9/10478536_920644664662603_7347306928843301299_n.jpg?oh=5a78e43633f20dbbd6aca1a0a1a74832&oe=5642D8D0&__gda__=1450264276_a7944e78a0d9bd6deb9a24eb07ad65d1', $id){
        $sql = "UPDATE projects SET title=?, link=?, description=?, project_image=? WHERE id=?";
        $this->db->query($sql, [$title,$link,$content, $project_image, $id]);
        return true;
    }
    
    public function delete_project($id){
        $this->db->delete('projects',['id'=>$id]);
        return true;
    }
    
    public function get_about(){
        $query = $this->db->get('about');
        return $query->result_array();
    }
    
    public function update_about($content, $coverImage, $coverHeading, $coverSubHeading, $id){
        $query = $this->db->get('about');
        $count = count($query);
               
        if($count<=0){
            $sql = "INSERT INTO about (`about_me`, `cover_image`, `cover_heading`, `cover_subheading`) VALUES (?,?,?,?)";
            $flag = $this->db->query($sql,[$content, $coverImage, $coverHeading, $coverSubHeading]);
            if($flag)
                return true;
            else
                return false;
        } else{
            $sql = "UPDATE about SET about_me=?, cover_image=?, cover_heading=?, cover_subheading=? WHERE id=?";
            $flag = $this->db->query($sql,[$content, $coverImage, $coverHeading, $coverSubHeading,$id]);
            if($flag){
                return true;
            }else{
                return false;
            }
        }
    }
    
    public function get_layouts(){
        $query = $this->db->get('layout');
        return $query->result_array();
    }
    
    public function create_layout($forPage,$coverImage,$coverHeading,$coverSubHeading){
        $sql = "SELECT * FROM layout WHERE for_page=?";
        $query = $this->db->query($sql, [$forPage]);
        if(count($query->result_array()) <= 0){
            $sql = "INSERT INTO layout (`for_page`, `cover_image`, `cover_heading`, `cover_subheading`) VALUES (?,?,?,?)";
            $this->db->query($sql, [$forPage,$coverImage,$coverHeading,$coverSubHeading]);
        }else{
            $sql = "UPDATE layout SET cover_image=?, cover_heading=?, cover_subheading=? WHERE for_page=?";
            $this->db->query($sql, [$coverImage,$coverHeading,$coverSubHeading,$forPage]);
        }
    }
    
    public function delete_layout($forPage){
        $this->db->delete('layout',['for_page'=>$forPage]);
    }
    
    public function get_contacts($status){
        $sql = "SELECT * FROM contacts WHERE status=?";
        $query = $this->db->query($sql, [$status]);
        return $query->result_array();
    }
    
    public function add_category($category, $sort){
        $sql = "INSERT INTO categories (name,sort) VALUES(?,?);";
        $query = $this->db->query($sql, [$category,$sort]);
    }
    
    public function get_categories(){
        $sql = "SELECT count(blogs.id) as total, categories.id as id, categories.name, categories.sort, blogs.id as blog_id from categories
left join blogs
on blogs.category_id = categories.id
group by categories.id;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function edit_category($category, $sort, $id){
        $sql = "UPDATE categories SET name=?, sort=? WHERE id=?";
        $this->db->query($sql, [$category, $sort, $id]);       
    }
    
    public function get_category_by_id($id){
        $sql = "SELECT * FROM categories WHERE id=?;";
        $query = $this->db->query($sql, [$id]);
        return $query->result_array();
    }

    public function get_products(){
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function get_product_by_id($id){
        $sql = "SELECT * FROM products WHERE id=?;";
        $query = $this->db->query($sql, [$id]);
        return $query->result_array();
    }

    public function create_product($name, $title, $tagLine, $description, $imageUrl, $status){
        $sql = "INSERT INTO `products` (name, title, tag_line, description, image_url, status) VALUES (?,?,?,?,?,?);";
        $this->db->query($sql, [$name, $title, $tagLine, $description, $imageUrl, $status]);
    }

    public function update_product($name, $title, $tagLine, $description, $imageUrl, $status, $id){
        $data = [
            'name'=>$name,
            'title'=>$title,
            'tag_line'=>$tagLine,
            'description'=>$description,
            'image_url'=>$imageUrl,
            'status'=>$status
        ];
        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    public function product_delete($id){
        $this->db->delete('products', ['id'=>$id]);
    }

    public function add_product_images($productId, $name, $src, $caption){
        $data = [
            'product_id'=>$productId,
            'name'=>$name,
            'src'=>$src,
            'caption'=>$caption
        ];

        $this->db->insert('product_images', $data);
    }

    public function get_customers_response(){
        $query = $this->db->get('customers');
        return $query->result_array();
    }

    public function map_user_blogs($userId, $blogId){
        $data = [
            'user_id' => $userId,
            'blog_id' => $blogId
        ];

        $this->db->insert('map_user_blogs', $data);

        if (count($this->db->affected_rows()) == 1)
            return true;
        else 
            return false;
    }

    ### Offers Related Queries

    public function getOfferDetails($offerId = null){
        $query = null;
        if (!empty($offerId)){
            $query = $this->db->get_where('offers', ['offer_id'=>$offerId]);
        } else{
            $query = $this->db->get('offers');
        }

        return $query->result_array();
    }

    public function saveData($data){
        $this->db->insert('offers',$data);
        $affectedRowsCount = $this->db->affected_rows();
        if ($affectedRowsCount == 1)
            return true;
        else
            return false;
    }
}
