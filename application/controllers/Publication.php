<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Africa/Nairobi');

class Publication extends CI_Controller {

    public function index() {
        $this->load->model('Publication_model'); 
		$data['interet'] = $this->Publication_model->getInteret();
		$data['categorie'] = $this->Publication_model->getCategorie();
		$data['personne']=$this->Login_model->getpersonbyId($_SESSION['iduser']);	
		$this->load->view('header', $data);
        $this->load->view('publication_form', $data);
    }

    public function upload($nom_image) {
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

    public function savePublication() { // insertion dans la base
		$idusers =$_SESSION['iduser'];
		$texte = $this->input->post('pub');
		$categorie = $this->input->post('categorie');
		$images=$this->upload('image');
		$datePublication = date('Y-m-d H:i:s');
		$this->load->model('Publication_model');
		$this->Publication_model->save($idusers, $categorie,$images,$datePublication,$texte);

		redirect('Actualite/');
	}

    public function all_Publication() {
		$this->load->model('Publication_model');
		$data['pub'] = $this->Publication_model->getAllPublication();
		$this->load->view('publication',$data);
	}

	public function delete_pub($id) {
		$this->load->model('Publication_model');
		$this->Publication_model->delete($id);

		redirect('publication/all_Publication');
	}

	public function Redirect_update($id) {
		$this->load->model('Publication_model');
		$data['pub'] = $this->Publication_model->getPubById($id);
		$this->load->view('update_pub',$data);
	}

	public function updatePub($id) {
		$texte = $this->input->post('texte');
		$images=$this->upload('image');

		if($images == null) {
			$this->load->model('Publication_model');
			$this->Publication_model->update_sans_image($id,$texte);
			redirect('publication/all_Publication');
		}else{
			$this->load->model('Publication_model');
			$this->Publication_model->update($id,$images,$texte);
			redirect('publication/all_Publication');
		}
	}
}

?>