<?php 
    if(! defined('BASEPATH')) exit('No direct script access allowed');
    class Question_model extends CI_Model{
        public function saveQuestion($iduser, $texte, $id_categorie, $image) {
            $date = new DateTime();
            $time = $date -> format('Y-m-d H:i:s');
            $data = array(
                'id_user' => $iduser,
                'texte' => $texte,
                'id_categorie' => $id_categorie,
                'date_publication' => $time,
                'screenshoot' => $image
            );
            $this->db->insert('Question', $data);
            if ($this->db->affected_rows() > 0) {

                return true; // Suppression réussie
            } else {
                return false; // Aucune ligne affectée, la suppression a échoué
            }
        }

        public function getLastQuestion(){
            $sql = "SELECT * FROM Question ORDER BY date_publication DESC LIMIT 1";
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }

        public function getLastQuestions(){
            $sql = "SELECT * FROM Question ORDER BY date_publication DESC LIMIT 5";
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }

        public function findQuestionById($id_question){
            $sql = "SELECT * FROM Question WHERE id = ?";
            $query = $this->db->query($sql, array($id_question));
            $result = $query->row_array();
            return $result;
        }

        public function findAllQuestion(){
            $sql = "SELECT * FROM Question order by date_publication LIMIT ";
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }

        public function getAllResponse($id_question){
            $sql = 'SELECT * FROM Reponse where id_question = ?';
            $query = $this -> db -> query($sql, array($id_question));
            $reponses = $query -> result_array();
            return $reponses;
        }

        public function removeQuestion($id_question){
            $reponses = $this -> getAllResponse($id_question);
            $this -> load -> model('Response_model');

            $this -> db -> trans_begin();
            
            // supprimer les réponses une à une
            foreach($reponses as $reponse){
                $this->Reponse_model -> removeReponse($reponse['id']);
            }
            // supprimer la question
            $sql = 'DELETE FROM Question WHERE id = ?';
            $this -> db -> query($sql, array($id_question));

            if ($this -> db -> trans_status() === FALSE) {
                $this -> db -> trans_rollback();
                return false; // Transaction échouée
            } else {
                $this -> db -> trans_commit();
                return true; // Transaction réussie
            }
        }

        public function newReactQuestion($id_question, $id_user){
            $date = new DateTime();
            $time = $date -> format('Y-m-d H:i:s');
            $data = array(
                'id_user' => $id_user,
                'id_question' => $id_question,
                'date_publication' => $time
            );
            
            $this->db->insert('Rection_Question', $data);
            if ($this->db->affected_rows() > 0) {
                return true; // Insertion réussie
            } else {
                return false; // Aucune ligne affectée, l'insertion a échoué
            }
        }

        public function getReactQuestion($id_question, $id_user){
            $sql = "SELECT * FROM Reaction_Question where id_question = ? AND id_user = ?";
            $query = $this->db->query($sql, array($id_question, $id_user));
            $result = $query->row_array();
            return $result;
        }

        public function removeReactQuestion($id_reaction){        
            $sql = "DELETE FROM ReactResponse WHERE id = ?";
            $this->db->query($sql, array($id_reaction));
            
            if ($this->db->affected_rows() > 0) {
                return true; // Suppression réussie
            } else {
                return false; // Aucune ligne affectée, la suppression a échoué
            }
        }
        
        public function reactQuestion($id_question, $id_user){
            $reaction = $this -> getReactQuestion($id_question, $id_user);
            if($reaction == null)
                return $this -> newReactQuestion($id_question,$id_user);
            else
                return $this -> removeReactQuestion($reaction['id']);
        }

        public function signalerQuestion($id_question, $id_user, $id_motif){
            $data = array(
                'id_user' => $id_user,
                'id_motif' => $id_motif,
                'id_question' => $id_question
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