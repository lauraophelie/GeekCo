<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Actualite_model extends CI_Model
{
    public function getAllActualite()
    {
        $compte = array();
        $request = "SELECT * FROM (
            SELECT 'publication' AS designation, id, idusers, pseudo, image_users, texte, path_image, date_publication, nb_reaction
            FROM v_publication
            UNION ALL
            SELECT designation, id, idusers, pseudo, image_users, texte, path_image, date_publication, NULL AS nb_reaction
            FROM v_publicite
        ) AS combined_data
        ORDER BY RANDOM();";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $compte[] = $row;
        }
        return $compte;
    }

    public function getAllCommentary()
    {
        $compte = array();
        $request = "SELECT * FROM v_commentaire";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $compte[] = $row;
        }
        return $compte;
    }

    public function getOffreDispo()
    {
        $compte = array();
        $request = "SELECT * FROM v_offres_dispos";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $compte[] = $row;
        }
        return $compte;
    }

    public function addCommentary($idusers, $idpublication, $texte)
    {
        $data = array(
            'id_publication' => $idpublication,
            'id_utilisateur' => $idusers,
            'texte' => $texte
        );
        $this->db->insert('commentaire', $data);
    }

    public function getAllUtilPub()
    {
        $compte = array();
        $request = "SELECT * FROM util_pub";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $compte[] = $row;
        }
        return $compte;
    }

    public function addReactionOnPublication($idutilisateur, $idpublication)
    {
        // Vérification si une réaction existe déjà pour la publication et l'utilisateur spécifiés
        $sql_check_reaction = "SELECT id FROM util_pub WHERE id_utilisateur = ? AND id_publication = ?";
        $result_check_reaction = $this->db->query($sql_check_reaction, array($idutilisateur, $idpublication));

        if ($result_check_reaction->num_rows() === 0) {
            // Début de la transaction
            $this->db->trans_start();

            // Requête pour incrémenter le nombre de réactions dans la table Publication
            $sql_increment_reaction = "UPDATE publication SET nb_reaction = nb_reaction + 1 WHERE id = ?";
            $this->db->query($sql_increment_reaction, $idpublication);

            // Requête pour enregistrer la réaction de l'utilisateur dans la table util_pub
            $sql_insert_reaction = "INSERT INTO util_pub (id_utilisateur, id_publication) VALUES (?, ?)";
            $this->db->query($sql_insert_reaction, array($idutilisateur, $idpublication));

            // Fin de la transaction
            $this->db->trans_complete();
        }
    }
}
