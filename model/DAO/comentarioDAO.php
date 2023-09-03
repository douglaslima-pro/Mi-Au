<?php

class comentarioDAO{
    
    public function comentarAnimal($comentario){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

            $sql = "INSERT INTO comentarios_animal(idanimal,idusuario,texto,dataComentario) values(?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$comentario->getIdobjeto());
            $stmt->bindValue(2,$comentario->getIdusuario());
            $stmt->bindValue(3,$comentario->getTexto());
            $stmt->bindValue(4,$comentario->getDataComentario());
            $retorno = $stmt->execute();
            return $retorno;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function listarComentariosAnimal($idanimal){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

            $sql = "SELECT * FROM comentarios_animal WHERE idanimal=? and situacaoComentario=1 ORDER BY idcomentario DESC";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$idanimal);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function comentarDenuncia($comentario){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8','root','');

            $sql = 'INSERT INTO comentarios_denuncia(iddenuncia,idusuario,texto,dataComentario) values(?,?,?,?)';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$comentario->getIdobjeto());
            $stmt->bindValue(2,$comentario->getIdusuario());
            $stmt->bindValue(3,$comentario->getTexto());
            $stmt->bindValue(4,$comentario->getDataComentario());
            $retorno = $stmt->execute();

            return $retorno;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function listarComentariosDenuncia($iddenuncia){
        try{

            $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8','root','');

            $sql = 'SELECT * FROM comentarios_denuncia WHERE iddenuncia=? and situacaoComentario=1 ORDER BY idcomentario DESC';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$iddenuncia);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

?>