function atualizarModalidade() {
    var id_modalidade = $('#idModalEditModalidadeInput').val();
    var novoNome = $('#nomeModalidadeEditInput').val();
    $.ajax({
        url: '../Cadastro/PDO/Atualizar/modalidadeAtualizar.php',
        method: 'POST',
        data: { id_modalidade: id_modalidade, nome_modalidade: novoNome},
    }).done(function () {
        const toastLiveExample = document.getElementById('notificaoSucesso');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
        listarTudoModalidade();
        listarTurma();
    })
}