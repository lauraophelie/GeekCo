<?php
    if(! defined('BASEPATH')) exit('No direct script access allowed');
    class Abonnement_model extends CI_Model {
        public function get_abonnements() {
            $query = $this->db->query("select * from v_abonnements order by abonnement asc");
            $result = $query->result_array();
            return $result;
        }
        public function add_abonnement($utilisateur, $reference, $mois) {
            $sql = "INSERT INTO abonnement(id_utilisateur, reference, mois) VALUES('%s', '%s', %d)";
            $sql = sprintf($sql, $utilisateur, $reference, $mois);
            $this->db-query($sql);
        }
        public function get_prix_abonnement() {
            $query = $this->db->query("select * from prix_abonnement order by date_prix desc limit 1");
            $row = $query->row_array();
            return $row;
        }
        public function update_prix_abonnement($prix) {
            $sql = "INSERT INTO prix_abonnement(prix) VALUES(%d)";
            $sql = sprintf($sql, $prix);
            $this->db->query($sql);
        }
    }
?>