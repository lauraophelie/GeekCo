<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{

	public function index()
	{
		$this->load->view('login');
	}
	public function error_login()
	{
		$data['errorl'] = 'Your Account is Invalid';
		$this->load->view('login', $data);
	}
	public function sign()
	{
		$this->load->model('Login_model');
		$data['prof'] = $this->Login_model->getprofession();
		$this->load->view('sign', $data);
	}
	public function error_sign()
	{
		$data['errors'] = 'Your Password is not the same';
		$this->load->model('Login_model');
		$data['prof'] = $this->Login_model->getprofession();
		$data['formData'] = $this->session->flashdata('error_sign_data');
		$this->load->view('sign', $data);
	}
	public function error_age()
	{
		$data['errors'] = 'You must be 14 years old';
		$this->load->model('Login_model');
		$data['prof'] = $this->Login_model->getprofession();
		$data['formData'] = $this->session->flashdata('error_age_data');
		$this->load->view('sign', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('iduser');
		redirect("login");
	}

	public function acceuil($id)
	{
		$this->load->model('Login_model');
		$this->load->model('Actualite_model');
		$data['personne'] = $this->Login_model->getpersonbyId($id);
		$data['actualite'] = $this->Actualite_model->getAllActualite();
		$data['offre'] = $this->Actualite_model->getOffreDispo();
		$data['commentaire'] = $this->Actualite_model->getAllCommentary();
		$this->load->view('header', $data);
		$this->load->view('actualite/index', $data);
	}

	public function upload_image($nom_image)
	{
		$config['upload_path'] = './asset/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload');
		$this->upload->initialize($config);
		$this->upload->do_upload($nom_image);
		return $file_info = $this->upload->data();
	}

	public function process_login()
	{
		$nom = $this->input->post('email');
		$mdp = $this->input->post('pass');
		$this->load->model('Login_model');
		$data = $this->Login_model->getdata();
		$d = verify_login($nom, $mdp, $data);
		if ($d != null) {
			$this->session->set_userdata('iduser', $d);
			redirect('login/acceuil/' . $d);
		} else {
			redirect('Login/error_login');
		}
	}
	public function process_sign_in()
	{
		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$date_naissance = $this->input->post('date_naissance');
		$age = verif_age($date_naissance);
		$idprofession = $this->input->post('idprofession');
		$pseudo = $this->input->post('pseudo');
		$image = $this->upload_image('image');
		$email = $this->input->post('email');
		$mdp = $this->input->post('pass');
		$mdp1 = $this->input->post('pass1');
		$this->load->model('Login_model');
		$d = verify_sign($mdp, $mdp1);
		if ($age == true) {
			$date_naissance = $this->input->post('date_naissance');
		} else {
			$this->session->set_flashdata('error_age_data', $this->input->post());
			redirect('Login/error_age');
		}
		if ($d == 0) {
			$this->Login_model->insert_person($nom, $prenom, $date_naissance, $idprofession, $pseudo, $image['file_name'], $email, $mdp);
			redirect('Login');
		} else {
			$this->session->set_flashdata('error_sign_data', $this->input->post());
			redirect('Login/error_sign');
		}
	}
}
