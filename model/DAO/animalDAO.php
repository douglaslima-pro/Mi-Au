<?php

class animalDAO{

    public function cadastrarAnimal($idusuario,$animal){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

            $sql = "INSERT INTO animal(idusuario,especie,nome,descricao,sexo,porte,temperamento,img_animal,dataCadastro) values(?,?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$idusuario);
            $stmt->bindValue(2,$animal->getEspecie());
            $stmt->bindValue(3,$animal->getNome());
            $stmt->bindValue(4,$animal->getDescricao());
            $stmt->bindValue(5,$animal->getSexo());
            $stmt->bindValue(6,$animal->getPorte());
            $stmt->bindValue(7,$animal->getTemperamento());
            $stmt->bindValue(8,$animal->getFoto());
            $stmt->bindValue(9,$animal->getDataCadastro());
            $retorno = $stmt->execute();

            return $retorno;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function listarAnimais(){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");
    
            $sql = "SELECT * FROM animal ORDER BY idanimal DESC";
    
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function listarAnimaisCadastrados($idusuario){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");
    
            $sql = "SELECT * FROM animal WHERE idusuario=? ORDER BY idanimal DESC";
    
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$idusuario);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function pesquisarAnimal($idanimal){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

            $sql = "SELECT * FROM animal WHERE idanimal=?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$idanimal);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public function editarAnimal($animal){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

            $sql = "UPDATE animal SET especie=?,nome=?,descricao=?,sexo=?,porte=?,temperamento=?,img_animal=? WHERE idanimal=?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$animal->getEspecie());
            $stmt->bindValue(2,$animal->getNome());
            $stmt->bindValue(3,$animal->getDescricao());
            $stmt->bindValue(4,$animal->getSexo());
            $stmt->bindValue(5,$animal->getPorte());
            $stmt->bindValue(6,$animal->getTemperamento());
            $stmt->bindValue(7,$animal->getFoto());
            $stmt->bindValue(8,$animal->getIdanimal());
            $retorno = $stmt->execute();

            return $retorno;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function deletarAnimal($idanimal){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau',"root","");

            $sql = "DELETE FROM animal WHERE idanimal=?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$idanimal);
            $retorno = $stmt->execute();

            return $retorno;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>