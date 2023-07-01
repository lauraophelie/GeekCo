<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Africa/Nairobi');

class Offre extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
    public function index() // afficher le formulaire d'insertion
    {
        $this->load->model('Offre_model'); 
        $data['lieux'] = $this->Offre_model->getLieu();
		$data['types'] = $this->Offre_model->getType();
        $this->load->view('offre', $data);
    }

	public function saveOffre() { // insertion dans la base
		$idusers = 1;
		$texte = $this->input->post('offre');
		$lieu = $this->input->post('lieu');
		$type = $this->input->post('type');
		$datePublication = date('Y-m-d H:i:s'); // Obtient la date et l'heure actuelles
		$datefin = $this->input->post('dateFin');
	
		$this->load->model('Offre_model');
		$this->Offre_model->save($idusers, $texte, $datePublication, $datefin, $lieu, $type);

		redirect('offre/GetAllOffre');
	}

	public function GetAllOffre() { //afficher tous les offres
		$this->load->model('Offre_model');
		$data['offres'] = $this->Offre_model->getAll();
		$this->load->view('affichage_offre', $data);
	}

	public function Affichage_UpdateOffre($id) { //afficher la formulaire de modification
		$this->load->model('Offre_model');
		$data['lieux'] = $this->Offre_model->getLieu();
		$data['types'] = $this->Offre_model->getType();
		$data['offre'] = $this->Offre_model->getAllOffreById($id); // Récupérer les détails de l'offre par ID
		$this->load->view('update_offre', $data);
	}

	public function deleteOffre($id) { 
		$this->load->model('Offre_model');
		$this->Offre_model->delete($id);
	
		redirect('offre/GetAllOffre'); // Redirection vers la méthode GetAllOffre() du contrôleur Offre
	}

	public function updateOffre($id) {
		$texte = $this->input->post('offre');
		$lieu = $this->input->post('lieu');
		$type = $this->input->post('type');
		$datePublication = date('Y-m-d H:i:s'); // Obtient la date et l'heure actuelles
		$datefin = $this->input->post('dateFin');

		$this->load->model('Offre_model');
		$this->Offre_model->update($id, $texte, $datePublication, $datefin, $lieu, $type);
	
		redirect('offre/GetAllOffre');
	}
}