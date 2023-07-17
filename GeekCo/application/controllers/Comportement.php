<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comportement extends CI_Controller {

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

    public function index(){
        $this->load->view('signaler');
    }

	public function allerAraison(){
		$type = $this->input->get('type');
		$idobjet = $this->input->get('idobjet');
		$nomtypededonnee = $this->Utiles->gettypedonnees($type);
		$valider = $this->Utiles->erreurtypededonnees($nomtypededonnee);
		if($valider == false){
			$retour['type'] = $nomtypededonnee;
			$retour['idobjet'] = $idobjet;
			$retour["raisons"] = $this->Generalisation->SelectFromTable("motif");
			$this->load->view("raison", $retour);
		}
	}

	public function EnregistrerSignalement(){
		date_default_timezone_set('Africa/Nairobi');
		$type = $this->input->post('type');
		$idobjet = $this->input->post('idobjet');
		$nombase = $this->Utiles->gettypebase($type);
		$idraison = $this->input->post('idraison');
		$currentDateTime = date('Y-m-d H:i:s');


		
		$data = "(default,".$idraison.", '".$idobjet."', '".$_SESSION['iduser']."', '".$currentDateTime."')";
		//echo $data;

		$this->Generalisation->inserting($nombase, $data);

		// $this->Generalisation->InsertInTable('detailsignalement', $data)
		redirect('Actualite');
	}
		
}
