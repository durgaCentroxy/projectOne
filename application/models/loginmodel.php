<?php
class LoginModel extends CI_Model
{
    public function validate($username, $password)
    {
        // $this->load->library('database);   //this is commented cz of { $autoload['libraries'] = array('database') }

        // $this->db->get('users');
        // $uname = $this->db->where('user_name','$username');
        // $pass = $this->db->where('password','$password');

        $data = $this->db->where(['user_name'=>$username, 'password'=>$password])
                         ->get('users');
        // if(($uname) && ($password) == TRUE)
        
        
        if($data->num_rows())
        {
            return $data->row()->id;
        }
        else
        {
            return false;
        }
    }
    public function articleList()
    {
        // $this->load->library('session');
        $id = $this->session->userdata('id');
        $data = $this->db->select(['article_title', 'article_body'])
                 ->from('articles')
                 ->where(['user_id'=>$id])
                 ->get();
        return $data->result();
    }
    public function validateRegister()
    {
        
    }
}
?>