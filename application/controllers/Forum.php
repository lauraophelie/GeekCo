<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Africa/Nairobi');

class Forum extends CI_Controller {
    public function index($texte=null, $id_categorie=null) // afficher le formulaire d'insertion
    {
        $data =array(
            'texte' => $texte,
            'id_categorie' => $id_categorie
        );
        $this->load->model('Question_model');
        $this->load->model('Reponse_model');
        $this->load->view('header');
        $this->load->view('insert_question', $data);
        $this->load->view('footer');
    }
    public function insertQuest($texte, $id_categorie) {
        $this->load->model('Question_model');
        $id_user = $this->session->id_user;
        $insert = $this->Question_model->saveQuestion($id_user, $texte, $id_categorie);
        if ($insert) {
            redirect(site_url('forum'));
        }
    }

    public function insertReponse($id_question, $texte){
        $this->load->model('Reponse_model');
    }

    public function question($id_question){
        $this-> load ->model('Question_model');
        $question = $this -> Question_model -> findQuestionById($id_question);
        $reponses = $this -> Question_model -> getAllResponse($id_question);
    
    }
}
?>