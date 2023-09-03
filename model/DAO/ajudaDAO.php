<?php

class ajudaDAO{

public function cadastrarAjuda($ajuda){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "INSERT INTO ajuda(iddoacao,idusuario,foto_comprovante,formAjuda,ajuda,dataAjuda) VALUES(?,?,?,?,?,?)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$ajuda->getIddoacao());
        $stmt->bindValue(2,$ajuda->getIdusuario());
        $stmt->bindValue(3,$ajuda->getFotoComprovante());
        $stmt->bindValue(4,$ajuda->getFormAjuda());
        $stmt->bindValue(5,$ajuda->getAjuda());
        $stmt->bindValue(6,$ajuda->getDataAjuda());
        $retorno = $stmt->execute();

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

}

?>