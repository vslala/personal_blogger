<?php

class Sap extends CI_Controller{
    public function __construct() {
        parent::__construct();
    
        $this->load->helper('form_helper');
        $this->load->helper('html_helper');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->model('sap_model');
    }

    public function save_list(){
        $firstName = $this->input->post('first_name');
        $lastName = $this->input->post('last_name');
        $listName = $this->input->post('list_name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $listId = $this->sap_model->save_list($firstName, $lastName, $email, $password, $listName);
        if (! empty($listId)){
            redirect('site/couplesList/'.$listId);
        }

        redirect('site/couplesList');
    }

    public function save_list_item(){
        $listId = $this->input->post('list_id');
        $listItem = $this->input->post('list_item');
        var_dump($listItem);
        $flag = $this->sap_model->save_list_item($listId, $listItem);

        return $flag;
    }

    public function getListItems($list_id = null){
        $listItems = $this->sap_model->getListItems($list_id);
        $jListItems = json_encode($listItems);

        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->output->set_output($jListItems);
    }


















}