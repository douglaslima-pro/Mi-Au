<?php
class htmlDAO{
    
    function escreverHTML($name){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "SELECT * FROM html where name=?";

        $stmt= $conn->prepare($sql);
        $stmt->bindValue(1,$name);
        $stmt->execute();
        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
    }

}

?>