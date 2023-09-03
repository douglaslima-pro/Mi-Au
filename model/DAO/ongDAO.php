<?php

class ongDAO{

public function cadastrarOng($ong){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "INSERT INTO ong(nome,descricao,necessidades,foto,cnpj,estado,cidade,endereco,numero,complemento,telefone,email,dataCadastro,banco,agencia,conta,pix) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$ong->getNome());
        $stmt->bindValue(2,$ong->getDescricao());
        $stmt->bindValue(3,$ong->getNecessidades());
        $stmt->bindValue(4,$ong->getFoto());
        $stmt->bindValue(5,$ong->getCnpj());
        $stmt->bindValue(6,$ong->getEstado());
        $stmt->bindValue(7,$ong->getCidade());
        $stmt->bindValue(8,$ong->getEndereco());
        $stmt->bindValue(9,$ong->getNumero());
        $stmt->bindValue(10,$ong->getComplemento());
        $stmt->bindValue(11,$ong->getTelefone());
        $stmt->bindValue(12,$ong->getEmail());
        $stmt->bindValue(13,$ong->getDataCadastro());
        $stmt->bindValue(14,$ong->getBanco());
        $stmt->bindValue(15,$ong->getAgencia());
        $stmt->bindValue(16,$ong->getConta());
        $stmt->bindValue(17,$ong->getPix());
        $retorno = $stmt->execute();

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function editarOng($ong){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "UPDATE ong SET nome=?,descricao=?,necessidades=?,foto=?,cnpj=?,estado=?,cidade=?,endereco=?,numero=?,complemento=?,telefone=?,email=?,banco=?,agencia=?,conta=?,pix=? WHERE idong=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$ong->getNome());
        $stmt->bindValue(2,$ong->getDescricao());
        $stmt->bindValue(3,$ong->getNecessidades());
        $stmt->bindValue(4,$ong->getFoto());
        $stmt->bindValue(5,$ong->getCnpj());
        $stmt->bindValue(6,$ong->getEstado());
        $stmt->bindValue(7,$ong->getCidade());
        $stmt->bindValue(8,$ong->getEndereco());
        $stmt->bindValue(9,$ong->getNumero());
        $stmt->bindValue(10,$ong->getComplemento());
        $stmt->bindValue(11,$ong->getTelefone());
        $stmt->bindValue(12,$ong->getEmail());
        $stmt->bindValue(13,$ong->getBanco());
        $stmt->bindValue(14,$ong->getAgencia());
        $stmt->bindValue(15,$ong->getConta());
        $stmt->bindValue(16,$ong->getPix());
        $stmt->bindValue(17,$ong->getIdong());
        $retorno = $stmt->execute();

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function listarOngs(){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "SELECT * FROM ong";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function listarTopOngs(){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "SELECT * FROM ong LIMIT 4";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function pesquisarOng($idong){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "SELECT * FROM ong WHERE idong=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$idong);
        $stmt->execute();
        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function deletarOng($idong){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau',"root","");

        $sql = "DELETE FROM ong WHERE idong=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$idong);
        $retorno = $stmt->execute();

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

}

?>