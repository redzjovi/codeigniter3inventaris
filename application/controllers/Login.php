<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'required|alpha_numeric');
        $this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('login');
        }
        else
        {
            $valid_user = $this->User_Model->check_credential();

            if ($valid_user === FALSE)
            {
                $this->session->set_flashdata('error', 'Wrong Username / Password!');
                redirect('login');
            }
            else
            {
                $this->session->set_userdata('username', $valid_user->username);
                $this->session->set_userdata('nama_user', $valid_user->nama_user);
                $this->session->set_userdata('id_role', $valid_user->id_role);

                switch ($valid_user->id_role)
                {
                    case 1 : // user
                        redirect('user/home');
                        break;
                    case 2 : // admin
                        redirect('admin/home');
                        break;
                    case 3 :
                        redirect('direktur/home');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>