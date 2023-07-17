<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Utilisateur extends CI_Controller {
        public function index() {
            $this->load->model('admin/utilisateur_model');
            $data['liste_utilisateurs'] = $this->utilisateur_model->get_all_users();
            $this->load->view('admin/liste_utilisateurs', $data);
        }
        public function fiche_utilisateur($id) {
            $this->load->model('admin/utilisateur_model');
            $data['fiche_utilisateur'] = $this->utilisateur_model->find_user($id);
            $this->load->view('admin/fiche_utilisateur', $data);
        }
    }
?>