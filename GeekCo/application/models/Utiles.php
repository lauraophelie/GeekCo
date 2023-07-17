<?php
class Utiles extends CI_Model {
    public function gettypedonnees($nombre){
        if($nombre==1){
            return "publication";
        }else if($nombre==2){
            return "commentaire";
        }else if($nombre==3){
            return "utilisateur";
        }else if($nombre==4){
            return "offre";
        }
        return "erreur";
    }

    public function gettypebase($nombre){
        if($nombre =="publication"){
            return "signaler_publication";
        }else if($nombre=="commentaire"){
            return "signaler_commentaire";
        }else if($nombre=="utilisateur"){
            return "signaler_utilisateur";
        }else if($nombre=="offre"){
            return "signaler_offre";
        }
        return "erreur";
    }

    public function retournerErreur(){
        $this->load->view("errors/erreur");
    }

    public function erreurtypededonnees($libelle){
        $resultcom = strcmp($libelle, "commentaire");
        $resultpub = strcmp($libelle, "publication");
        if($resultcom!=0 && $resultpub!=0){ 
           $this->Utiles->retournerErreur();
           return true;
        }
        return false;
    }
}
