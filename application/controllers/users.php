<?php
class Users extends My_controller
{
    public function index()
    {
        
        // $this->load->helper('html');
        $this->load->view('users/article_list');
    }
}
?>