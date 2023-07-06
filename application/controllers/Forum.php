<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Africa/Nairobi');

class Forum extends CI_Controller {
    public function index() // afficher le formulaire d'insertion
    {
        if (!$this->session->userdata('iduser')) {
            redirect('login'); // Redirect to login page if user is not logged in
        }
        $id_user = $this->session->userdata('iduser');
        $this->load->model('Question_model');
    }
    public function addQuest(){
        if (!$this->session->userdata('iduser')) {
            redirect('login'); // Redirect to login page if user is not logged in
        }
        $this->load->model('Publication_model'); 
		$data['interet'] = $this->Publication_model->getInteret();
		$data['categorie'] = $this->Publication_model->getCategorie();
		$data['personne']=$this->Login_model->getpersonbyId($_SESSION['iduser']);
        $this->load->view('header');
        $this->load->view('insert_question',$data);
        $this->load->view('footer');
    }

    public function uploadImg($nom_image) {
        $config['upload_path'] = APPPATH . "../assets/img";
		$config['allowed_types'] = 'png|gif|jpg|jpeg|JPG|PNG|JPEG|GIF';
		$image="";
 
		$this->load->library('upload', $config);
 
		if (!$this->upload->do_upload($nom_image)) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('error', $error);
			$image=null;
		} else {
			$data = array('upload_data' => $this->upload->data());
			$d = $this->upload->data();
			$image = $d['file_name'];
		}
		return $image;
	}
    public function insertQuestion() {
        if (!$this->session->userdata('iduser')) {
            redirect('login'); // Redirect to login page if user is not logged in
        }
        $id_user =$_SESSION['iduser'];
		$texte = $this->input->post('texte');
		$id_categorie = $this->input->post('id_categorie');
		$images = $this->uploadImg('image');
        $this->load->model('Question_model');
        $id_user = $this->session->userdata("iduser");
        $insert = $this->Question_model->saveQuestion($id_user, $texte, $id_categorie,$images);
        if ($insert) {
            redirect(site_url('forum'));
        }
    }

    public function insertReponse(){
        if (!$this->session->userdata('iduser')) {
            redirect('login'); // Redirect to login page if user is not logged in
        }
        $id_user =$_SESSION['iduser'];
        
        $this->load->model('Reponse_model');

    }

    public function question($id_question){
        if (!$this->session->userdata('iduser')) {
            redirect('login'); // Redirect to login page if user is not logged in
        }
        $data =array(
            'texte' => $texte,
            'id_categorie' => $id_categorie
        );
        $this-> load ->model('Question_model');
        $question = $this -> Question_model -> findQuestionById($id_question);
        $reponses = $this -> Question_model -> getAllResponse($id_question);
        $this->load->view('header');
        $this->load->view('insert_question', $data);
        $this->load->view('footer');
    }
}
?>