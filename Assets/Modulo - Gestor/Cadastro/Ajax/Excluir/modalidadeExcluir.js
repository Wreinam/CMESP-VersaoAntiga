function modalidadeExcluir(id_modalidade) {
    $.ajax({
        url: '../Cadastro/PDO/Excluir/modalidadeExcluir.php',
        method: 'POST',
        data: { id_modalidade: id_modalidade },
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
        listarTudoModalidade();
    })
}