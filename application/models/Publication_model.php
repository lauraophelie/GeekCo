<?php 
    if(! defined('BASEPATH')) exit('No direct script access allowed');
    class Publication_model extends CI_Model {

        function getInteret() {
            $sql = "SELECT * FROM Interet";
            $query = $this->db->query($sql);
            $resultat = array();
            $i=0;

            foreach($query->result_array() as $row) {
                $resultat[$i]['id'] = $row['id'];
                $resultat[$i]['designation'] = $row['designation'];
                $i++;
            }
            return $resultat;
        }

        function getCategorie() {
            $sql = "SELECT * FROM Categorie";
            $query = $this->db->query($sql);
            $resultat = array();
            $i=0;

            foreach($query->result_array() as $row) {
                $resultat[$i]['id'] = $row['id'];
                $resultat[$i]['id_interet'] = $row['id_interet'];
                $resultat[$i]['designation'] = $row['designation'];
                $i++;
            }
            return $resultat;
        }

        public function save($idusers, $categorie,$image,$datePublication,$texte) {
            $data = array(
                'id_utilisateur' => $idusers,
                'id_categorie' => $categorie,
                'path_image'=> $image,
                'date_publication' => $datePublication,
                'texte' => $texte
            );
            $this->db->insert('publication', $data);
        }

        public function getAllPublication() {
            $sql = "SELECT * FROM publication";
            $query = $this->db->query($sql);
            $result = $query->result_array(); 
            return $result;
        }

        public function delete($id) {
            $sql = "DELETE FROM publication WHERE id= ?";
            $this->db->query($sql,array($id));
        }

        public function getPubById($id) {
            $sql = "SELECT * FROM publication where id= ?";
            $query = $this->db->query($sql,array($id));
            $result = $query->row_array();
            return $result;
        }

        public function update($id,$image,$texte) {
            $sql = "UPDATE publication SET texte= ?,path_image=? where id= ?";
            $this->db->query($sql,array($texte,$image,$id));
        }

        public function update_sans_image($id,$texte) {
            $sql = "UPDATE publication SET texte= ? where id= ?";
            $this->db->query($sql,array($texte,$id));
        }
    }
?>