<?php
class animalDTO{

    private $idanimal;
    private $idusuario;
    private $especie;
    private $nome;
    private $descricao;
    private $sexo;
    private $porte;
    private $temperamento;
    private $situacao;
    private $foto;
    private $dataCadastro;

    public function __construct($especie,$nome,$descricao){
        $this->especie=$especie;
        $this->nome=$nome;
        $this->descricao=$descricao;
    }

    //SETTERS
    function setIdanimal($idanimal){
        $this->idanimal=$idanimal;
    }
    function setIdusuario($idusuario){
        $this->idusuario=$idusuario;
    }
    function setSexo($sexo){
        $this->sexo=$sexo;
    }
    function setPorte($porte){
        $this->porte=$porte;
    }
    function setTemperamento($temperamento){
        $this->temperamento=$temperamento;
    }
    function setSituacao($situacao){
        $this->situacao=$situacao;
    }
    function setFoto($foto){
        $this->foto=$foto;
    }
    function setDataCadastro($data){
        $this->dataCadastro=$data;
    }

    //GETTERS
    function getIdanimal(){
        return $this->idanimal;
    }
    function getIdusuario(){
        return $this->idusuario;
    }
    function getEspecie(){
        return $this->especie;
    }
    function getNome(){
        return $this->nome;
    }
    function getDescricao(){
        return $this->descricao;
    }
    function getSexo(){
        return $this->sexo;
    }
    function getPorte(){
        return $this->porte;
    }
    function getTemperamento(){
        return $this->temperamento;
    }
    function getSituacao(){
        return $this->situacao;
    }
    function getFoto(){
        return $this->foto;
    }
    function getDataCadastro(){
        return $this->dataCadastro;
    }
}
?>