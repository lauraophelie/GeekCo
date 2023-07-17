<?php
    if(! defined('BASEPATH')) exit('No direct script access allowed');

    class Utilisateur_model extends CI_Model {
        public function get_all_users() {
            $query = $this->db->query("select * from v_utilisateurs order by id asc");

            $result = array();
            $i = 0;

            foreach ($query->result_array() as $row) {
                $result[$i]['id'] = $row['id'];
                $result[$i]['nom'] = $row['nom'];
                $result[$i]['prenom'] = $row['prenom'];
                $result[$i]['pseudonyme'] = $row['pseudonyme'];
                $result[$i]['age'] = $row['age'];
                $result[$i]['email'] = $row['email'];
                $result[$i]['profession'] = $row['profession'];
                $result[$i]['mot_de_passe'] = $row['mot_de_passe'];
                $result[$i]['date_inscription'] = $row['date_insertion'];
                $i++;
            }
            return $result;
        }
        public function find_user($id) {
            $sql = "SELECT * FROM v_utilisateurs WHERE id = '%s'";
            $sql = sprintf($sql, $id);
            $query = $this->db->query($sql);
            $row = $query->row_array();
            return $row;
        }
    }
?>