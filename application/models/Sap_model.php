<?php

class SAP_model extends CI_Model{
     public function __construct(){
        $this->load->database();
    }

    public function save_list($first_name, $last_name, $email, $password, $list_name){
        $date = date('Y-m-d');
        $time = date('h:i:s');
        $datetime = $date.' '.$time;
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => md5($password),
            'password' => $password,
            'list_name' => $list_name,
            'created_at' => $datetime
        ];

        $this->db->insert('couples_list', $data);
        $listId = $this->db->insert_id();

        return $listId;

    }

    public function save_list_item($list_id, $list_item){
        $date = date('Y-m-d');
        $time = date('h:i:s');
        $datetime = $date.' '.$time;

        $data = [
            'list_id' => $list_id,
            'list_item' => $list_item,
            'created_at' => $datetime
        ];

        $this->db->insert('couples_list_items', $data);

        return true;
    }

    public function getListItems($list_id){
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get_where('couples_list_items', ['list_id'=>$list_id]);
        return $query->result_array();
    }


}
