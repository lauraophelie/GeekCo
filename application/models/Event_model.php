<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event_model extends CI_Model {

    public function getAllEvent(){
        $query = $this->db->query("select * from getallevent ");
        $tab = array();
        $i=0;
        foreach($query->result_array() as $row){
            $tab[$i]['idevent'] = $row['idevent'];
            $tab[$i]['iduser'] = $row['iduser'];
            $tab[$i]['name_event'] = $row['name_event'];
            $tab[$i]['emplacement'] = $row['emplacement'];
            $tab[$i]['date_event'] = $row['date_event'];
            $tab[$i]['time_event'] = $row['time_event'];
            $tab[$i]['short_description'] = $row['short_description'];
            $tab[$i]['nombreplace'] = $row['nombreplace'];
            $tab[$i]['photo'] = $row['photo'];
            $tab[$i]['prix'] = $row['prix'];
            $tab[$i]['description'] = $row['description'];            
            $tab[$i]['prenom'] = $row['prenom'];
            $i++;
        }
        return $tab;
    }
    public function getEventbyId($idevent){
        $query = $this->db->query("select * from getallevent where idevent=".$idevent);
        $tab = array();
        foreach($query->result_array() as $row){
            $tab['idevent'] = $row['idevent'];
            $tab['iduser'] = $row['iduser'];
            $tab['name_event'] = $row['name_event'];
            $tab['emplacement'] = $row['emplacement'];
            $tab['date_event'] = $row['date_event'];
            $tab['time_event'] = $row['time_event'];
            $tab['short_description'] = $row['short_description'];
            $tab['nombreplace'] = $row['nombreplace'];
            $tab['photo'] = $row['photo'];
            $tab['prix'] = $row['prix'];
            $tab['description'] = $row['description'];            
            $tab['prenom'] = $row['prenom'];
        }
        return $tab;
    }

    public function reservationlist($idevent){
        $query = $this->db->query("select * from reservationlist where idevent=".$idevent);
        $tab = array();
        $i=0;
        foreach($query->result_array() as $row){
            $tab[$i]['idevent'] = $row['idevent'];
            $tab[$i]['name_event'] = $row['name_event'];
            $tab[$i]['numero'] = $row['numero'];
            $tab[$i]['client'] = $row['client'];
            $tab[$i]['date'] = $row['date'];
            $tab[$i]['nombreplace'] = $row['nombreplace'];
            $tab[$i]['prix'] = $row['prix'];
            $i++;

        }
        return $tab;
    }

    public function reservation($idevent,$iduser,$nombreplace,$prix){
        if(!empty($prix) && !empty($nombreplace)){
            $prix_total = $prix*$nombreplace;
            $sql = "INSERT INTO reservation VALUES (default,'%s','%s','%s','%s',CURRENT_DATE)";
            $sql = sprintf($sql,$idevent,$iduser,$nombreplace,$prix_total);
            $this->db->query($sql);
            $sql = "UPDATE detailevent SET nombreplace = (select nombreplace-'%s' from detailevent  WHERE idevent = '%s') WHERE idevent = '%s'";
            $sql = sprintf($sql,$nombreplace,$idevent,$idevent);
            $this->db->query($sql);
        }
    }
    public function delete_event($idevent,$iduser,$name_event,$emplacement,$date_event,$time_event,$short,$place_event,$photo,$prix,$full){
        $sql = "INSERT INTO historique VALUES (default,'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
        $sql = sprintf($sql,$idevent,$iduser,$name_event,$emplacement,$date_event,$time_event,$short,$place_event,$photo,$prix,$full);
        $this->db->query($sql);
        $sql = "delete from reservation where idevent=".$idevent;
        $this->db->query($sql);
        $sql = "delete from detailevent where idevent=".$idevent;
        $this->db->query($sql);
        $sql = "delete from event where idevent=".$idevent;
        $this->db->query($sql);
    }

    public function modif_event($idevent,$name_event,$emplacement,$date_event,$time_event,$short,$place_event,$photo,$prix,$full){
        $sql = "UPDATE event SET name_event = '%s',emplacement = '%s', date_event = '%s' , time_event = '%s' , short_description = '%s' WHERE idevent = '%s'";
        $sql = sprintf($sql,$name_event,$emplacement,$date_event,$time_event,$short,$idevent);
        $this->db->query($sql);
        $sql = "UPDATE detailevent SET nombreplace = '%s',photo = '%s',prix = '%s' , description = '%s'  WHERE idevent = '%s'";
        $sql = sprintf($sql,$place_event,$photo,$prix,$full,$idevent);
        $this->db->query($sql);
    }

    public function insert_event($iduser,$name_event,$emplacement,$date_event,$time_event,$short){
        $sql = "INSERT INTO event VALUES (default,'%s','%s','%s','%s','%s','%s')";
        $sql = sprintf($sql,$iduser,$name_event,$emplacement,$date_event,$time_event,$short);
        $this->db->query($sql);
        $idevent = $this->db->insert_id();
        return $idevent;
    }
    public function insert_detailevent($idevent,$place_event,$photo,$prix,$full){
        $sql = "INSERT INTO detailevent VALUES (default,'%s','%s','%s','%s','%s')";
        $sql = sprintf($sql,$idevent,$place_event,$photo,$prix,$full);
        $this->db->query($sql);
    }
}