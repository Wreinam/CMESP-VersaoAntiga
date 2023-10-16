function atualizarEndereco() {
    var id_endereco = $('#idModalEditEnderecoInput').val();
    var novoBairro = $('#selectBairroEdit').val();
    var novoRua = $('#ruaEnderecoEditInput').val();
    var novoNomeLocal = $('#nomeLocalEnderecoEditInput').val();
    $.ajax({
        url: '../Cadastro/PDO/Atualizar/enderecoAtualizar.php',
        method: 'POST',
        data: { id_endereco: id_endereco, bairro: novoBairro, rua: novoRua, nome_local: novoNomeLocal},
    }).done(function () {
        const toastLiveExample = document.getElementById('notificaoSucesso');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
        listarTudoEndereco();
        listarTurma();
    })
}