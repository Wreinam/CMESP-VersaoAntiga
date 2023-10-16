function cadastroModalidade() {
    var nome = $('#nomeModalidade').val();
    $.ajax({
        url: '../Cadastro/PDO/Inserir/modalidadeInserir.php',
        method: 'POST',
        data: { nome: nome},
    }).done(function () {
        document.getElementById("nomeModalidade").value = "";
        const toastLiveExample = document.getElementById('notificaoSucesso');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
        listarTudoModalidade();
    })
}