let viewer = document.querySelector('.viewer-lateral');

let openViewer = document.querySelector('.open-viewer');
let closeViewer = document.querySelector('.close-viewer');

closeViewer.addEventListener('click', ()=>{
    viewer.classList.remove('viewer-open');
});
openViewer.addEventListener('click', ()=>{
    viewer.classList.add('viewer-open');

    //Action do formulário
    document.getElementById('form-ong').action="../control/cadastrarOngControl.php";
    //Titulo do Viewer - ONG
    document.getElementById('viewer-title').innerHTML = "Cadastro de ONG";

    //Foto
    document.getElementById('preview-foto').src="../images/usuarios/unset.png";
    //Nome
    document.getElementById('nome').value="";
    //Descrição
    document.getElementById('descricao').value="";
    //Necessidades
    document.getElementById('necessidades').value="";
    //CNPJ
    document.getElementById('cnpj').value="";
    //Estado
    document.getElementById('estado').value="";
    //Cidade
    document.getElementById('cidade').value="";
    //Endereço
    document.getElementById('endereco').value="";
    //Número
    document.getElementById('numero').value="";
    //Complemento
    document.getElementById('complemento').value="";
    //Telefone
    document.getElementById('telefone').value="";
    //E-mail
    document.getElementById('email').value="";
    //Banco
    document.getElementById('banco').value="";
    //Agência
    document.getElementById('agencia').value="";
    //Conta
    document.getElementById('conta').value="";
    //Pix
    document.getElementById('pix').value="";
    //Submit
    document.getElementById('submit').value="Cadastrar ONG";
    //Puclicar button
    document.querySelector('.pub-ong').style.display = "none";
    //Delete button
    document.querySelector('.deletar-ong').style.display = "none";
    
});