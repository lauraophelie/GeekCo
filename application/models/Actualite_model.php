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
        $utilpub = $this->getAllUtilPub();
        var_dump($utilpub);
        if (count($utilpub) != 0) {
            for ($i = 0; $i < count($utilpub); $i++) {
                if ($utilpub[$i]['id_utilisateur'] != $idutilisateur || $utilpub[$i]['id_publication'] != $idpublication) {
                    $request = "UPDATE publication SET nb_reaction = nb_reaction + 1 WHERE id = '%s'";
                    $request2 = "INSERT INTO util_pub VALUES ('%s', '%s')";

                    $this->db->query(sprintf($request, $idpublication));
                    $this->db->query(sprintf($request2, $idutilisateur, $idpublication));
                }
                break;
            }
        } else {
            $request = "UPDATE publication SET nb_reaction = nb_reaction + 1 WHERE id = '%s'";
            $request2 = "INSERT INTO util_pub VALUES ('%s', '%s')";

            $this->db->query(sprintf($request, $idpublication));
            $this->db->query(sprintf($request2, $idutilisateur, $idpublication));
        }
    }
}
