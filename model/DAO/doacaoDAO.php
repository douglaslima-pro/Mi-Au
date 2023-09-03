<?php

class doacaoDAO{

    public function publicarOng($doacao){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

            $sql = "INSERT INTO doacao(idong,idusuario,subtitulo,fotoFundador,descFundador,dataCriacao) values(?,?,?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$doacao->getIdong());
            $stmt->bindValue(2,$doacao->getIdusuario());
            $stmt->bindValue(3,$doacao->getSubtitulo());
            $stmt->bindValue(4,$doacao->getFotoFundador());
            $stmt->bindValue(5,$doacao->getDescFundador());
            $stmt->bindValue(6,$doacao->getDataCriacao());
            $retorno = $stmt->execute();

            return $retorno;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function ultimaDoacao(){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

            $sql = "SELECT * FROM doacao ORDER BY iddoacao DESC LIMIT 1";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

            return $retorno;
        
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function pesquisarDoacao($iddoacao){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

            $sql = "SELECT * FROM doacao WHERE iddoacao=?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$iddoacao);
            $stmt->execute();

            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

            return $retorno;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

?>