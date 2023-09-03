<?php
class denunciaDTO{
    private $iddenuncia;
    private $idusuario;
    private $foto;
    private $estado;
    private $cidade;
    private $titulo;
    private $descricao;
    private $situacaoDenuncia;
    private $dataCadastro;
    
    public function __construct($idusuario,$titulo, $descricao, $foto)
    {
        $this->idusuario=$idusuario;
        $this->titulo=$titulo;
        $this->descricao=$descricao;
        $this->foto=$foto;
    }
    
    public function getIddenuncia()
    {
        return $this->iddenuncia;
    }

    public function setIddenuncia($iddenuncia)
    {
        $this->iddenuncia = $iddenuncia;

        return $this;
    }

    public function getIdusuario()
    {
        return $this->idusuario;
    }
    
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    public function getSituacaoDenuncia()
    {
        return $this->situacaoDenuncia;
    }

    public function setSituacaoDenuncia($situacaoDenuncia)
    {
        $this->situacaoDenuncia = $situacaoDenuncia;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }
}