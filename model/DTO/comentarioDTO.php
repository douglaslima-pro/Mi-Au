<?php

class comentarioDTO{

    private $idobjeto;
    private $nomeObjeto;
    private $idusuario;
    private $texto;
    private $situacaoComentario;
    private $dataComentario;

    public function __construct($idusuario,$texto,$dataComentario){

        $this->idusuario=$idusuario;
        $this->texto=$texto;
        $this->dataComentario=$dataComentario;

    }

    function setIdobjeto($idobjeto){
        $this->idobjeto=$idobjeto;
    }
    function setNomeObjeto($nomeObjeto){
        $this->nomeObjeto=$nomeObjeto;
    }
    function setIdusuario($idusuario){
        $this->idusuario=$idusuario;
    }
    function setTexto($texto){
        $this->texto=$texto;
    }
    function setSituacaoComentario($situacaoComentario){
        $this->situacaoComentario=$situacaoComentario;
    }
    function setDataComentario($dataComentario){
        $this->dataComentario=$dataComentario;
    }


    function getIdobjeto(){
        return $this->idobjeto;
    }
    function getNomeObjeto(){
        return $this->nomeObjeto;
    }
    function getIdusuario(){
        return $this->idusuario;
    }
    function getTexto(){
        return $this->texto;
    }
    function getSituacaoComentario(){
        return $this->situacaoComentario;
    }
    function getDataComentario(){
        return $this->dataComentario;
    }
}

?>