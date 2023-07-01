<?php 
    if(! defined('BASEPATH')) exit('No direct script access allowed');
    class Question_model extends CI_Model{
        public function saveQuestion($iduser, $texte) {
            $data = array(
                'id_user' => $iduser,
                'texte' => $texte
            );
            
            $this->db->insert('Question', $data);
        }
    }
?>