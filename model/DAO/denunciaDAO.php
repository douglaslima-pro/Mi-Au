<?php

class denunciaDAO{

    public function cadastrarDenuncia($denuncia){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

            $sql = "INSERT INTO denuncia(idusuario,estado,cidade,foto,titulo,descricao,dataCadastro) values(?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$denuncia->getIdusuario());
            $stmt->bindValue(2,$denuncia->getEstado());
            $stmt->bindValue(3,$denuncia->getCidade());
            $stmt->bindValue(4,$denuncia->getFoto());
            $stmt->bindValue(5,$denuncia->getTitulo());
            $stmt->bindValue(6,$denuncia->getDescricao());
            $stmt->bindValue(7,$denuncia->getDataCadastro());
            $retorno = $stmt->execute();

            return $retorno;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function listarDenuncias(){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

            $sql = "SELECT * FROM denuncia ORDER BY iddenuncia DESC";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

?>