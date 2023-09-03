<?php

class doacaoDTO{

    private $iddoacao;
    private $idong;
    private $idusuario;
    private $subtitulo;
    private $fotoFundador;
    private $descFundador;
    private $dataCriacao;

    public function __construct($idong,$idusuario,$dataCriacao){
        $this->idong=$idong;
        $this->idusuario=$idusuario;
        $this->dataCriacao=$dataCriacao;
    }

    function setIddoacao($iddoacao){
        $this->iddoacao=$iddoacao;
    }
    function setIdong($idong){
        $this->idong=$idong;
    }
    function setIdusuario($idusuario){
        $this->idusuario=$idusuario;
    }
    function setSubtitulo($subtitulo){
        $this->subtitulo=$subtitulo;
    }
    function setFotoFundador($fotoFundador){
        $this->fotoFundador=$fotoFundador;
    }
    function setDescFundador($descFundador){
        $this->descFundador=$descFundador;
    }
    function setDataCriacao($dataCriacao){
        $this->dataCriacao=$dataCriacao;
    }

    function getIddoacao(){
        return $this->iddoacao;
    }
    function getIdong(){
        return $this->idong;
    }
    function getIdusuario(){
        return $this->idusuario;
    }
    function getSubtitulo(){
        return $this->subtitulo;
    }
    function getFotoFundador(){
        return $this->fotoFundador;
    }
    function getDescFundador(){
        return $this->descFundador;
    }
    function getDataCriacao(){
        return $this->dataCriacao;
    }

}

?>