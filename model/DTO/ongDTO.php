<?php

class ongDTO{

    private $idong;
    private $nome;
    private $descricao;
    private $necessidades;
    private $foto;
    private $cnpj;
    private $estado;
    private $cidade;
    private $endereco;
    private $numero;
    private $complemento;
    private $telefone;
    private $email;
    private $dataCadastro;
    private $banco;
    private $agencia;
    private $conta;
    private $pix;

    public function __construct($nome,$descricao,$foto,$cnpj,$dataCadastro){
        $this->nome=$nome;
        $this->descricao=$descricao;
        $this->foto=$foto;
        $this->cnpj=$cnpj;
        $this->dataCadastro=$dataCadastro;
    }   

    //SETTERS
    function setIdong($ong){
        $this->ong=$ong;
    }
    function setNome($nome){
        $this->nome=$nome;
    }
    function setDescricao($descricao){
        $this->descricao=$descricao;
    }
    function setNecessidades($necessidades){
        $this->necessidades=$necessidades;
    }
    function setFoto($foto){
        $this->foto=$foto;
    }
    function setCnpj($cnpj){
        $this->cnpj=$cnpj;
    }
    function setEstado($estado){
        $this->estado=$estado;
    }
    function setCidade($cidade){
        $this->cidade=$cidade;
    }
    function setEndereco($endereco){
        $this->endereco=$endereco;
    }
    function setNumero($numero){
        $this->numero=$numero;
    }
    function setComplemento($complemento){
        $this->complemento=$complemento;
    }
    function setTelefone($telefone){
        $this->telefone=$telefone;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function setDataCadastro($dataCadastro){
        $this->dataCadastro=$dataCadastro;
    }
    function setBanco($banco){
        $this->banco = $banco;
    }
    function setAgencia($agencia){
        $this->agencia = $agencia;
    }
    function setConta($conta){
        $this->conta = $conta;
    }
    function setPix($pix){
        $this->pix = $pix;
    }

    //GETTERS
    function getIdong(){
        return $this->ong;
    }
    function getNome(){
        return $this->nome;
    }
    function getDescricao(){
        return $this->descricao;
    }
    function getNecessidades(){
        return $this->necessidades;
    }
    function getFoto(){
        return $this->foto;
    }
    function getCnpj(){
        return $this->cnpj;
    }
    function getEstado(){
        return $this->estado;
    }
    function getCidade(){
        return $this->cidade;
    }
    function getEndereco(){
        return $this->endereco;
    }
    function getNumero(){
        return $this->numero;
    }
    function getComplemento(){
        return $this->complemento;
    }
    function getTelefone(){
        return $this->telefone;
    }
    function getEmail(){
        return $this->email;
    }
    function getDataCadastro(){
        return $this->dataCadastro;
    }
    function getBanco(){
        return $this->banco;
    }
    function getAgencia(){
        return $this->agencia;
    }
    function getConta(){
        return $this->conta;
    }
    function getPix(){
        return $this->pix;
    }

}
?>