<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Actualite extends CI_Controller
{
    public function index()
    {
        $this->load->model('Actualite_model');
        $data['actualite'] = $this->Actualite_model->getAllActualite();
        $data['offre'] = $this->Actualite_model->getOffreDispo();
        $data['commentaire'] = $this->Actualite_model->getAllCommentary();
		$data['personne']=$this->Login_model->getpersonbyId($_SESSION['iduser']);
        $this->load->view('header', $data);
        $this->load->view('actualite/index', $data);
    }

    public function addcommentary($idpublication)
    {
        $iduser = $_SESSION['iduser'];
        $commentary = $this->input->get('commentary');
        $this->load->model('Actualite_model');
        $this->Actualite_model->addCommentary($iduser, $idpublication, $commentary);
        redirect('Actualite/index/' . $iduser);
    }

    public function addreactiononpublication($idpublication)
    {
        $iduser = $_SESSION['iduser'];
        $this->load->model('Actualite_model');
        $this->Actualite_model->addReactionOnPublication($iduser, $idpublication);
        redirect('Actualite/index/' . $iduser);
    }

    public function signalcommentaire($idpublication, $idcommentaire)
    {
        $iduser = $_SESSION['iduser'];
        // $this->load->model('Actualite_model');
        // $this->Actualite_model->signal($iduser, $idpublication);
        redirect('Actualite/index/' . $iduser);
    }

    public function signalactualite($idpublication)
    {
        $iduser = $_SESSION['iduser'];
        // $this->load->model('Actualite_model');
        // $this->Actualite_model->signal($iduser, $idpublication);
        redirect('Actualite/index/' . $iduser);
    }
}
