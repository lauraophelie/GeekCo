<?php
    if(! defined('BASEPATH')) exit('No direct script access allowed');
    class Login_model extends CI_Model {
        public function check_admin($admin, $mot_de_passe) {
            $sql = "SELECT * FROM administrateur WHERE(nom = '%s' and mot_de_passe = '%s')";
            $sql = sprintf($sql, $admin, $mot_de_passe);
            $query = $this->db->query($sql);
            $row = $query->row_array();

            if($row) {
                return true;
            }
            return false;
        }
    }
?>