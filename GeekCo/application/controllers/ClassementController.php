<?php

class ClassementController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    //classement mois et annee par defaut
    public function index() {

        $periode = date('Y-m-d H:i:s');
        $mois = date('m', strtotime($periode));
        $annee = date('Y', strtotime($periode));

        // Charger le modèle pour accéder aux fonctions de base de données
        $this->load->model('Classement_model');
        
        // Appeler la fonction all_pub() du modèle pour récupérer les publications
        $data['classement'] = $this->Classement_model->classement_date($mois, $annee);
        
		$data['personne']=$this->Login_model->getpersonbyId($_SESSION['iduser']);
        
        // Charger la vue avec les données
        $this->load->view('header', $data);
        $this->load->view('Aff_classement', $data);
    }

    //classement avec choix du mois et de l'annee
    public function classement_periode_choisie(){
        
        $mois = $this->input->post('mois');
        $annee = $this->input->post('mois');

        $this->load->model('Classement_model');
        
        // Appeler la fonction all_pub() du modèle pour récupérer les publications
        $data['classement'] = $this->Classement_model->classement_date(6, 2023);
		$data['personne']=$this->Login_model->getpersonbyId($_SESSION['iduser']);
        
        // Charger la vue avec les données
        $this->load->view('header', $data);
        $this->load->view('Aff_classement', $data);

    }

}