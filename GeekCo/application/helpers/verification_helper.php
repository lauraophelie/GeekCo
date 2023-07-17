<?php 
    function verify_login ($email,$mdp,$data){
        for($i=0;$i<count($data);$i++){            
            if ($email == $data[$i]['email'] && $mdp == $data[$i]['mot_de_passe']){                
                return $data[$i]['id'];
            }
        }
        return 0;
    }
    function verify_sign ($pass,$mdp){
        if ($mdp == $pass){			
            return 0;
		}else {
            return 1;
		}
    }
    function verif_age($date_naissance) {
        $date_actuelle = new DateTime();
        $date_naissance = new DateTime($date_naissance);
        $difference = $date_naissance->diff($date_actuelle);
        $age = $difference->y;    
        if ($age >= 14) {
            return true;
        } else {
            return false;
        }
    }
?>