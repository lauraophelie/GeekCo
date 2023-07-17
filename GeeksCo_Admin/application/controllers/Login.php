<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {
        public function index() {
            $this->load->view('admin/login');
        }

        public function connect() {
            $admin = $this->input->post('nom');
            $mdp = $this->input->post('mdp');
            $check_login = $this->login_model->check_admin($admin, $mdp);

            if($check_login) {
                $this->session->set_userdata('admin', $admin);
                redirect("/utilisateur");
            } else {
                redirect("/login");
            }
        }
    }
?>