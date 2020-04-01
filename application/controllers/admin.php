<?php
class Admin extends My_controller
{
    public function index()
    {
        // $this->load->library('form_validation'); autoloaded in config > autoload.php
        $this->form_validation->set_rules('username', 'User Name', 'required|alpha');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[10]');
        if($this->form_validation->run())
        {
            $username = $this->input->post('username');  //here 'input' is class which used to get the data and post() is for from which method the data are coming it can be get/post
            $password = $this->input->post('password');  //same
            // echo "username: " . $username . " and" . " password: " . $password;
            
            $this->load->model('LoginModel');
            $id = $this->LoginModel->validate($username, $password);
            if($id)
            {
                // $this->load->library('session');  //here 'session' libraray is loaded (auto loaded in config > autoload.php)
                $this->session->set_userdata('id', $id);
                // $this->load->view('admin/dashboard');
                return redirect('admin/welcome');
            }
            else
            {
                echo "data is not there";
            }
        }
        else
        {
            $this->load->view('admin/login');
        }
    }
    public function welcome()
    {
        if(!$this->session->userdata('id'))
        return redirect('login');
        $this->load->model('LoginModel');
        $articles = $this->LoginModel->articleList();
        $this->load->view('admin/dashboard', ['articles'=>$articles]);
    }
    public function register()
    {
        $this->load->view('admin/register');
    }
    public function sendmail()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'required|alpha_numeric|valid_email');
        $this->form_validation->set_rules('username', 'User Name', 'required|alpha|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[10]');
        $this->form_validation->set_error_delimiters('<div class="text-danger"></div>');
        if($this->form_validation->run())
        {
            $this->load->library('email');
            $this->email->from(set_value('email'), set_value('name'));
            $this->email->to('dasdurga923@gmail.com');
            $this->email->message("thank you for registration");
            $this->email->set_newline("\n \n");
            $this->email->send();
            // (START) for sending admin a email informing about the new user
            if(!$this->email->send())
            {
                show_error($this->email->print_debugger());
            }
            else
            {
                echo "email has been sent";
            }
            // (END) for sending admin a email informing about the new user
            // $name = $this->input->post('name');
            // $email = $this->input->post('email');
            // $username = $this->input->post('username');
            // $password = $this->input->post('password');
            $this->load->model('LoginModel');

        }
        else
        {
            $this->load->view('admin/register');
        }
    }
    
}
?>