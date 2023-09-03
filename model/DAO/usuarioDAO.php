<?php

class usuarioDAO{

public function cadastrarUsuario($usuario){
    try{
        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "INSERT INTO usuarios(nome,sobrenome,email,telefone,estado,cidade,senha) values(?,?,?,?,?,?,?)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$usuario->getNome());
        $stmt->bindValue(2,$usuario->getSobrenome());
        $stmt->bindValue(3,$usuario->getEmail());
        $stmt->bindValue(4,$usuario->getTelefone());
        $stmt->bindValue(5,$usuario->getEstado());
        $stmt->bindValue(6,$usuario->getCidade());
        $stmt->bindValue(7,$usuario->getSenha());
        $retorno = $stmt->execute();
        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function logar($usuario){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "SELECT * FROM usuarios WHERE email=? and senha=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$usuario->getEmail());
        $stmt->bindValue(2,$usuario->getSenha());
        $stmt->execute();
        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function listarUsuarios(){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "SELECT * FROM usuarios";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function pesquisarUsuario($id){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "SELECT * FROM usuarios WHERE idusuario=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function editarUsuario($usuario){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "UPDATE usuarios SET nome=?,sobrenome=?,email=?,telefone=?,estado=?,cidade=?,img_usuario=? WHERE idusuario=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$usuario->getNome());
        $stmt->bindValue(2,$usuario->getSobrenome());
        $stmt->bindValue(3,$usuario->getEmail());
        $stmt->bindValue(4,$usuario->getTelefone());
        $stmt->bindValue(5,$usuario->getEstado());
        $stmt->bindValue(6,$usuario->getCidade());
        $stmt->bindValue(7,$usuario->getFoto());
        $stmt->bindValue(8,$usuario->getIdusuario());
        $retorno = $stmt->execute();
        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function alterarSenha($usuario){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "UPDATE usuarios SET senha=? WHERE idusuario=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$usuario->getSenha());
        $stmt->bindValue(2,$usuario->getIdusuario());
        $retorno = $stmt->execute();

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function procurarEmail($email){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "SELECT * FROM usuarios WHERE email=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$email);
        $stmt->execute();
        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function checarChave($email,$chave){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "SELECT * FROM usuarios WHERE email=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$email);
        $stmt->execute();
        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

        if($retorno){
            $chaveCorreta = sha1($retorno["idusuario"].$retorno["senha"]);
            if($chave == $chaveCorreta){
                return $retorno["idusuario"];
            }
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function deletarUsuario($idusuario){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau',"root","");

        $sql = "DELETE FROM usuarios WHERE idusuario=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$idusuario);
        $retorno = $stmt->execute();

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

//Alteração feita pelo ADM!!
public function alterarUsuario($usuario){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau;charset=utf8',"root","");

        $sql = "UPDATE usuarios SET nome=?,email=?,situacaoUsuario=?,perfil=? WHERE idusuario=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$usuario->getNome());
        $stmt->bindValue(2,$usuario->getEmail());
        $stmt->bindValue(3,$usuario->getSituacaoUsuario());
        $stmt->bindValue(4,$usuario->getPerfil());
        $stmt->bindValue(5,$usuario->getIdusuario());
        $retorno = $stmt->execute();

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function deletarObjetoFilho($objeto,$idusuario){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=projetomiau',"root","");

        $sql = "DELETE FROM $objeto WHERE idusuario=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$idusuario);
        $retorno = $stmt->execute();

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

}


?>