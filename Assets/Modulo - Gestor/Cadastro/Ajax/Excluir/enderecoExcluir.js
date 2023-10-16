function enderecoExcluir(id_endereco) {
    $.ajax({
        url: '../Cadastro/PDO/Excluir/enderecoExcluir.php',
        method: 'POST',
        data: { id_endereco: id_endereco},
    }).done(function (item) {
        
        if (item == "false") {
            const modalNaoExecutada = document.getElementById('modalNaoExecutada')
            const myModalAlternative = bootstrap.Modal.getOrCreateInstance(modalNaoExecutada);
            myModalAlternative.show();
        } else {
            const toastLiveExample = document.getElementById('notificaoSucesso');
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
            toastBootstrap.show();
        }
        listarTudoEndereco();

    })
}