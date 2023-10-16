function turmaExcluir(id_turma) {
    $.ajax({
        url: '../Cadastro/PDO/Excluir/turmaExcluir.php',
        method: 'POST',
        data: { id_turma: id_turma },
    }).done(function (result) {
        if (result == "Existe") {
            const modalNaoExecutada = document.getElementById('modalNaoExecutada')
            const myModalAlternative = bootstrap.Modal.getOrCreateInstance(modalNaoExecutada);
            myModalAlternative.show();
        } else {
            const toastLiveExample = document.getElementById('notificaoSucesso');
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
            toastBootstrap.show();
            listarTurma();
            listarNivelFiltro();
        }
    })
}