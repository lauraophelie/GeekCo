<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Event extends CI_Controller
{
    public function index()
    {
        $this->load->view('acceuil');
    }
    public function events()
    {
        $this->load->model('Login_model');
        $data['personne'] = $this->Login_model->getpersonbyId($_SESSION['iduser']);
        $this->load->model('Event_model');
        $data['event'] = $this->Event_model->getAllEvent();
        if ($data['event'] == NULL) {
            $message['personne'] = $this->Login_model->getpersonbyId($_SESSION['iduser']);
            $message['missing'] = "Aucune Evenement enregistrer pour le moment";
            $this->load->view('header', $data);
            $this->load->view('listevent', $message);
        } else {
            $this->load->view('header', $data);
            $this->load->view('listevent', $data);
        }
    }
    public function addevent()
    {
        $this->load->model('Login_model');
        $data['personne'] = $this->Login_model->getpersonbyId($_SESSION['iduser']);
        $this->load->view('insert_event', $data);
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
    public function insertevent()
    {
        $iduser = $_SESSION['iduser']; // session anle admin
        $photo_event = $this->upload_image('photo');
        $name_event = $this->input->post('name');
        $emplacement = $this->input->post('emplacement');
        $date_event = $this->input->post('date');
        $time_event = $this->input->post('time');
        $short_description_event = $this->input->post('short');
        $place_event = $this->input->post('place');
        $full_description_event = $this->input->post('full');
        $prix = $this->input->post('prix');
        $this->load->model('Event_model');
        $idevent = $this->Event_model->insert_event($iduser, $name_event, $emplacement, $date_event, $time_event, $short_description_event);
        $this->Event_model->insert_detailevent($idevent, $place_event, $photo_event['file_name'], $prix, $full_description_event);
        redirect('Event/events');
    }
    public function detailevent($idevent)
    {
        $this->load->model('Login_model');
        $data['personne'] = $this->Login_model->getpersonbyId($_SESSION['iduser']);
        $this->load->model('Event_model');
        $data['event'] = $this->Event_model->getEventbyId($idevent);
        $this->load->view('detailevent', $data);
    }
    public function avant_modif_event($idevent)
    {
        $this->load->model('Login_model');
        $data['personne'] = $this->Login_model->getpersonbyId($_SESSION['iduser']);
        $this->load->model('Event_model');
        $data['modif'] = $this->Event_model->getEventbyId($idevent);
        $this->load->view('modif_event', $data);
    }

    //ito tsy admin le user fa le olona manao reservation

    public function achatticket($idevent)
    {
        $iduser = $_SESSION['iduser'];
        $this->load->model('Login_model');
        $data['personne'] = $this->Login_model->getpersonbyId($_SESSION['iduser']);
        $prix = $this->input->post('prix');
        $isany = $this->input->post('isany');
        $this->load->model('Event_model');
        if ($isany >= 0) {
            $this->Event_model->reservation($idevent, $iduser, $isany, $prix);
            redirect('Event/detailevent/' . $idevent);
        }
        $data['event'] = $this->Event_model->getEventbyId($idevent);
        $data['error'] = "Vous avez entrez un nombre negatif";
        $this->load->view('detailevent', $data);
    }
    public function listesachat($idevent)
    {
        $this->load->model('Login_model');
        $data['personne'] = $this->Login_model->getpersonbyId($_SESSION['iduser']);
        $this->load->model('Event_model');
        $data['reserve'] = $this->Event_model->reservationlist($idevent);
        if ($data['reserve'] != NULL) {
            $this->load->view('listinscrit', $data);
        } else {
            $missing['id'] = $idevent;
            $missing['error'] = "Il n'a pas de reservation pour cet Evenement";
            $this->load->view('listinscrit', $missing);
        }
    }

    //ito tsy admin le user fa le olona manao reservation

    public function modif_event($idevent)
    {
        $iduser = $_SESSION['iduser']; // session anle admin
        $name_event = $this->input->post('name');
        $emplacement = $this->input->post('emplacement');
        $date_event = $this->input->post('date');
        $time_event = $this->input->post('time');
        $short_description_event = $this->input->post('short');
        $place_event = $this->input->post('place');
        $photo_event = $this->upload_image('photo');
        $prix = $this->input->post('prix');
        $full_description_event = $this->input->post('full');
        $this->load->model('Event_model');
        $this->Event_model->modif_event($idevent, $name_event, $emplacement, $date_event, $time_event, $short_description_event, $place_event, $photo_event['file_name'], $prix, $full_description_event);
        redirect('Event/detailevent/' . $idevent);
    }
    public function delete_event($idevent)
    {
        $iduser = $_SESSION['iduser']; // session anle admin
        $name_event = $this->input->post('name');
        $emplacement = $this->input->post('emplacement');
        $date_event = $this->input->post('date');
        $time_event = $this->input->post('time');
        $short_description_event = $this->input->post('short');
        $place_event = $this->input->post('place');
        $photo_event = $this->input->post('photo');
        $prix = $this->input->post('prix');
        $full_description_event = $this->input->post('full');
        $this->load->model('Event_model');
        $this->Event_model->delete_event($idevent, $iduser, $name_event, $emplacement, $date_event, $time_event, $short_description_event, $place_event, $photo_event, $prix, $full_description_event);
        redirect('Event/events');
    }
}
