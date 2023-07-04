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
        $this->load->view('header');
        $this->load->view('actualite/index', $data);
    }

    public function addcommentary($idpublication)
    {
        $iduser = $this->session->has_userdata('iduser');
        $commentary = $this->input->get('commentary');
        $this->load->model('Actualite_model');
        $this->Actualite_model->addCommentary($iduser, $idpublication, $commentary);
        redirect('Actualite/index');
    }

    public function addreactiononpublication($idpublication)
    {
        $iduser = $this->session->has_userdata('iduser');
        $this->load->model('Actualite_model');
        $this->Actualite_model->addReactionOnPublication($iduser, $idpublication);
        redirect('Actualite/index');
    }
}
