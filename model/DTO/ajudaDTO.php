<?php

class ajudaDTO{

    private $idajuda;
    private $iddoacao;
    private $idusuario;
    private $fotoComprovante;
    private $formAjuda;
    private $ajuda;
    private $dataAjuda;
    private $situacaoAjuda;

    public function __construct($iddoacao,$idusuario,$dataAjuda){
        $this->iddoacao=$iddoacao;
        $this->idusuario=$idusuario;
        $this->dataAjuda=$dataAjuda;
    }

    function setIdajuda($idajuda){
        $this->idajuda = $idajuda;
    }
    function setIddoacao($iddoacao){
        $this->iddoacao = $iddoacao;
    }
    function setIdusuario($idusuario){
        $this->idusuario = $idusuario;
    }
    function setFotoComprovante($fotoComprovante){
        $this->fotoComprovante=$fotoComprovante;
    }
    function setFormAjuda($formAjuda){
        $this->formAjuda = $formAjuda;
    }
    function setAjuda($ajuda){
        $this->ajuda = $ajuda;
    }
    function setDataAjuda($dataAjuda){
        $this->dataAjuda = $dataAjuda;
    }
    function setSituacaoAjuda($situacaoAjuda){
        $this->situacaoAjuda = $situacaoAjuda;
    }

    function getIdajuda(){
        return $this->idajuda;
    }
    function getIddoacao(){
        return $this->iddoacao;
    }
    function getIdusuario(){
        return $this->idusuario;
    }
    function getFotoComprovante(){
        return $this->fotoComprovante;
    }
    function getFormAjuda(){
        return $this->formAjuda;
    }
    function getAjuda(){
        return $this->ajuda;
    }
    function getDataAjuda(){
        return $this->dataAjuda;
    }
    function getSituacaoAjuda(){
        return $this->situacaoAjuda;
    }

}

?>