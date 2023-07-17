<?php
class Generalisation extends CI_Model {
    public function SelectFromTable($NomTable){
        $query = $this->db->get($NomTable); // Remplacez 'table_name' par le nom de votre table PostgreSQL
		$result = $query->result(); // Récupération des résultats
        $raisons = array();
        $i = 0;
		foreach ($result as $row) {
			$raisons[$i]=$row; // Remplacez 'column_name' par le nom de la colonne que vous souhaitez afficher
            $i+=1;
		}
        return $raisons;
    }

    function inserting($table, $values){
        $sql = sprintf( 'insert into %s values%s',$table, $values);
       $this->db->query($sql);
    }

    public function SelectSpecifiedFromTable($NomTable, $colonnes, $conditions ){
        $this->db->select($colonne); // Select specific columns
        $this->db->from($NomTable); // Specify the table name

        // Add WHERE conditions
        $MesConditions = explode("//", $conditions);
        foreach ($conditions as $MesConditions) {
            $separer  = explode(", ", $conditions);
            $this->db->where($separer[0], $separer[1]);
        }

        $query = $this->db->get(); // Execute the query

        if ($query->num_rows() > 0) {
            // Data found, process it
            foreach ($query->result() as $row) {
                // Access the values using column names
                echo $row->column1;
                echo $row->column2;
                echo $row->column3;
            }
        } else {
            // No data found
            echo "No records found.";
        }


    }

    public function InsertInTable($NomTable, $data){
        // $data = array(
        //     'column1' => 'value1',
        //     'column2' => 'value2',
        //     'column3' => 'value3'
        // );
        
        $this->db->insert($NomTable, $data);

        // if ($this->db->affected_rows() > 0) {
        // } else {
        // }
    }
}
