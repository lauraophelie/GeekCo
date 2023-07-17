<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Abonnement extends CI_Controller {
        public function index() {
            $this->load->model('admin/abonnement_model');
            $data['liste_abonnements'] = $this->abonnement_model->get_abonnements();
            $this->load->view('admin/abonnement', $data);
        }
    }
?>