function cadastroEndereco(rua, nomeLocal, bairro) {
    $.ajax({
        url: '../Cadastro/PDO/Inserir/enderecoInserir.php',
        method: 'POST',
        data: { rua: rua, nomeLocal: nomeLocal, bairro: bairro},
    }).done(function () {
        document.getElementById("nomeRua").value = "";
        document.getElementById("nomeLocal").value = "";
        const toastLiveExample = document.getElementById('notificaoSucesso');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
        listarTudoEndereco();
    })
}