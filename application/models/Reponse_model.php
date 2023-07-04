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
            if ($this->db->affected_rows() > 0) {
                return true; // Suppression réussie
            } else {
                return false; // Aucune ligne affectée, la suppression a échoué
            }
        }

        public function getReponse($id_reponse){
            $sql = 'SELECT * FROM Reponse WHERE id = ?';
            $query = $this -> db -> query($sql, array($id_reponse));
            $reponse = $query -> row_array();
            return $reponse;
        }

        public function updateReponse($id_reponse, $texte){
            $sql = "UPDATE Reponse SET texte = ? WHERE id = ?";
                $this ->db ->query($sql, array($texte, $id_reponse));
            
                if ($this->db->affected_rows() > 0) {
                    return true; // Suppression réussie
                } else {
                    return false; // Aucune ligne affectée, la suppression a échoué
                }
        }

        public function removeReponse($id_reponse){
            $removeReact = $this -> removeAllReactReponse($id_reponse);
            if($removeReact){
                $sql = "DELETE FROM Reponse WHERE id = ?";
                $this ->db ->query($sql, array($id_reponse));
            
                if ($this->db->affected_rows() > 0) {
                    return true; // Suppression réussie
                } else {
                    return false; // Aucune ligne affectée, la suppression a échoué
                }
            } else {
                return false;
            } 
        }

        public function removeAllReactReponse($id_reponse){
            $sql = "DELETE FROM ReactResponse WHERE id_reponse = ?";
            $this->db->query($sql, array($id_reponse));
            
            if ($this->db->affected_rows() > 0) {
                return true; // Suppression réussie
            } else {
                return false; // Aucune ligne affectée, la suppression a échoué
            }
        }

        public function newReactReponse($id_reponse, $id_user){
            $date = new DateTime();
            $time = $date -> format('Y-m-d H:i:s');
            $data = array(
                'id_user' => $id_user,
                'id_reponse' => $id_reponse,
                'date_publication' => $time
            );
            
            $this->db->insert('Reponse', $data);
            if ($this->db->affected_rows() > 0) {
                return true; // Insertion réussie
            } else {
                return false; // Aucune ligne affectée, l'insertion a échoué
            }
        }

        public function getReactReponse($id_reponse, $id_user){
            $sql = "SELECT * FROM Reaction_Reponse where id_reponse = ? AND id_user = ?";
            $query = $this->db->query($sql, array($id_reponse, $id_user));
            $result = $query->row_array();
            return $result;
        }

        public function removeReactResponse($id_reaction){        
            $sql = "DELETE FROM ReactResponse WHERE id = ?";
            $this->db->query($sql, array($id_reaction));
            
            if ($this->db->affected_rows() > 0) {
                return true; // Suppression réussie
            } else {
                return false; // Aucune ligne affectée, la suppression a échoué
            }
        }
        
        public function reactReponse($id, $id_user){
            $reaction = $this -> getReactReponse($id, $id_user);
            if($reaction == null)
                return $this -> newReactReponse($id,$id_user);
            else
                return $this -> removeReactResponse($reaction['id']);
        }

        public function signalerReponse($id_reponse, $id_user, $id_motif){
            $data = array(
                'id_user' => $id_user,
                'id_motif' => $id_motif,
                'id_question' => $id_reponse
            );
            $this->db->insert('Question', $data);
            if ($this->db->affected_rows() > 0) {
                return true; // Suppression réussie
            } else {
                return false; // Aucune ligne affectée, la suppression a échoué
            }
        }
    }
?>