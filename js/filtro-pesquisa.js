function filtrarEspecie(especie){
    document.getElementById(especie).setAttribute('selected','selected');
    document.getElementById('submit-filtro').click();
}