<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

    public function getdata(){
        $query = $this->db->query("select * from Utilisateur");
        $tab = array();
        $i=0;
        foreach($query->result_array() as $row){
            $tab[$i]['id'] = $row['id'];
            $tab[$i]['nom'] = $row['nom'];
            $tab[$i]['prenom'] = $row['prenom'];
            $tab[$i]['date_naissance'] = $row['date_naissance'];
            $tab[$i]['id_profession'] = $row['id_profession'];
            $tab[$i]['pseudo'] = $row['pseudo'];
            $tab[$i]['path_image'] = $row['path_image'];
            $tab[$i]['email'] = $row['email'];
            $tab[$i]['mot_de_passe'] = $row['mot_de_passe'];
            $i++;
        }
        return $tab;
    }

    public function getpersonbyId($id){
        $query = $this->db->query("select * from Utilisateur where id='".$id."'");
        $tab = array();
        foreach($query->result_array() as $row){
            $tab['id'] = $row['id'];
            $tab['nom'] = $row['nom'];
            $tab['prenom'] = $row['prenom'];
            $tab['date_naissance'] = $row['date_naissance'];
            $tab['id_profession'] = $row['id_profession'];
            $tab['pseudo'] = $row['pseudo'];
            $tab['path_image'] = $row['path_image'];
            $tab['email'] = $row['email'];
            $tab['mot_de_passe'] = $row['mot_de_passe'];
        }
        return $tab;
    }

    public function getprofession(){
        $query = $this->db->query("select * from profession");
        $tab = array();
        $i=0;
        foreach($query->result_array() as $row){
            $tab[$i]['id'] = $row['id'];
            $tab[$i]['designation'] = $row['designation'];
            $i++;
        }
        return $tab;
    }

    public function insert_person($nom,$prenom,$date,$profession,$pseudo,$path_image,$email,$mdp){
        $sql = "INSERT INTO Utilisateur VALUES (default,'%s','%s','%s','%s','%s','%s','%s','%s')";
        $sql = sprintf($sql,$nom,$prenom,$date,$profession,$pseudo,$path_image,$email,$mdp);
        $this->db->query($sql);
    }
}