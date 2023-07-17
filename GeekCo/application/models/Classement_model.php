<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classement_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function classement_date($mois, $annee)
    {
        $this->db->select('id_utilisateur, SUM(nb_reaction) as total_reaction, pseudo');
        $this->db->from('v_datepublication_commentaire');
        $this->db->where('mois', $mois);
        $this->db->where('annee', $annee);
        $this->db->group_by('id_utilisateur,pseudo');
        $this->db->order_by('total_reaction', 'desc');
        
        $query = $this->db->get();
        $result = $query->result_array();
        
        return $result;
    }

}