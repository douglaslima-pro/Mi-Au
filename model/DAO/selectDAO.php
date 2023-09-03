<?php

class selectDAO{
    public function listarOptions($select){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");
    
            $sql = "SELECT * FROM ".$select;
    
            $stmt= $conn->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $retorno;
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>