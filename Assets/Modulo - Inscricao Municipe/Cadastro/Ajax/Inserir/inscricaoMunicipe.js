function inserirInscricaoMunicipe() {
    var formData = "";
    formData = new FormData($("#formularioInscricao")[0]);
    $.ajax({
        url: '../Cadastro/PDO/Inserir/inscricaoMunicipe.php',
        method: 'POST',
        data: formData,
        contentType: false, // Não definir o tipo de conteúdo
        processData: false,
    }).done(function (result) {
        if(result == "cpfExiste"){
            const erroCPFmodal = document.getElementById('existeCPFmodal')
            const myModalAlternative = bootstrap.Modal.getOrCreateInstance(erroCPFmodal);
            myModalAlternative.show();
        }else if(result == "cpfInvalido"){
            const erroCPFmodal = document.getElementById('invalidoCPFmodal')
            const myModalAlternative = bootstrap.Modal.getOrCreateInstance(erroCPFmodal);
            myModalAlternative.show();
        }else {
            window.location.replace('../../../index.php');
        }
    })
}