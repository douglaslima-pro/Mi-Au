<?php

//usuarioDTO.php
class usuarioDTO{
    
    private $idusuario;
    private $nome;
    private $sobrenome;
    private $email;
    private $telefone;
    private $estado;
    private $cidade;
    private $senha;
    private $foto;
    private $perfil;
    private $situacaoUsuario;

    public function __construct($nome,$sobrenome,$email,$senha){
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->senha = $senha;
    }

    //SETTERS
    function setIdusuario($id){
        $this->idusuario=$id;
    }
    function setNome($nome){
        $this->nome=$nome;
    }
    function setSobrenome($sobrenome){
        $this->sobrenome=$sobrenome;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function setTelefone($telefone){
        $this->telefone=$telefone;
    }
    function setEstado($estado){
        $this->estado=$estado;
    }
    function setCidade($cidade){
        $this->cidade=$cidade;
    }
    function setSenha($senha){
        $this->senha=$senha;
    }
    function setFoto($foto){
        $this->foto=$foto;
    }
    function setPerfil($perfil){
        $this->perfil=$perfil;
    }
    function setSituacaoUsuario($situacaoUsuario){
        $this->situacaoUsuario=$situacaoUsuario;
    }


    //GETTERS
    function getIdusuario(){
        return $this->idusuario;
    }
    function getNome(){
        return $this->nome;
    }
    function getSobrenome(){
        return $this->sobrenome;
    }
    function getEmail(){
        return $this->email;
    }
    function getTelefone(){
        return $this->telefone;
    }
    function getEstado(){
        return $this->estado;
    }
    function getCidade(){
        return $this->cidade;
    }
    function getSenha(){
        return $this->senha;
    }
    function getFoto(){
        return $this->foto;
    }
    function getPerfil(){
        return $this->perfil;
    }
    function getSituacaoUsuario(){
        return $this->situacaoUsuario;
    }
}//FIM DA CLASSE usuarioDTO

?>