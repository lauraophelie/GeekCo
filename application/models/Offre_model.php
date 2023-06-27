<?php 
    if(! defined('BASEPATH')) exit('No direct script access allowed');
    class Offre_model extends CI_Model{
        
        function getLieu() {
            $sql = "SELECT nom FROM lieu";
            $query = $this->db->query($sql);
            $result = array();
            $i=0;

            foreach($query->result_array() as $row) {
                $result[$i]['nom'] = $row['nom'];
                $i++;
            }
            return $result;
        }

        function getLieuIdByName($Lieu) {
            $sql = "SELECT id FROM lieu WHERE nom = ?";
            $query = $this->db->query($sql, array($Lieu));
            $row = $query->row();
        
            if ($row) {
                return $row->id;
            } else {
                return null;
            }
        }

        function getType() {
            $sql="SELECT nom FROM TypeOffre";
            $query = $this->db->query($sql);
            $result = array();
            $i=0;

            foreach($query->result_array() as $row) {
                $result[$i]['nom'] = $row['nom'];
                $i++;
            }
            return $result;
        }

        function getTypeIdByName($typeName) {
            $sql = "SELECT id FROM TypeOffre WHERE nom = ?";
            $query = $this->db->query($sql, array($typeName));
            $row = $query->row();
        
            if ($row) {
                return $row->id;
            } else {
                return null;
            }
        }

        public function save($idusers, $texte, $datePublication, $datefin, $lieu, $type) {
            $idLieu = $this->getLieuIdByName($lieu);
            $idType = $this->getTypeIdByName($type);
        
            $data = array(
                'idusers' => $idusers,
                'texte' => $texte,
                'datepublication' => $datePublication,
                'datedefinvalidite' => $datefin,
                'idlieu' => $idLieu,
                'idtypeoffre' => $idType
            );
            
            $this->db->insert('offre', $data);
        }

        public function getAll() {
            $sql = "SELECT * FROM offre";
            $query = $this->db->query($sql);
            $result = $query->result_array(); 
            return $result;
        }

        public function getAllOffreById($id) {
            $sql = "SELECT * FROM offre WHERE id = ?";
            $query = $this->db->query($sql, array($id));
            $result = $query->row_array();
            return $result;
        }

        public function delete($id) {
            $sql = "DELETE FROM offre WHERE id = ?";
            $this->db->query($sql, array($id));
        }

        public function update($id, $texte, $datePublication, $datefin, $lieu, $type) {
            $idLieu = $this->getLieuIdByName($lieu);
            $idType = $this->getTypeIdByName($type);
        
            $sql = "UPDATE offre SET texte = ?, datepublication = ?, datedefinvalidite = ?, idlieu = ?, idtypeoffre = ? WHERE id = ?";
            $this->db->query($sql, array($texte, $datePublication, $datefin, $idLieu, $idType, $id));
        }
    
    }
?>