<?php 
    if(! defined('BASEPATH')) exit('No direct script access allowed');
    class Reponse_model extends CI_Model{
        public function saveReponse($id_user, $id_question, $texte) {
            $date = new DateTime();
            $time = $date -> format('Y-m-d H:i:s');
            $data = array(
                'id_user' => $id_user,
                'texte' => $texte,
                'id_question' => $id_question,
                'date_publication' => $time
            );
            
            $this->db->insert('Reponse', $data);
        }

        public function reactReponse($id, $id_user){
            $date = new DateTime();
            $time = $date -> format('Y-m-d H:i:s');
            $data = array(
                'id_user' => $id_user,
                'id_reponse' => $id,
                'date_publication' => $time
            );
            
            $this->db->insert('Reponse', $data);
        }
    }
?>