function professorExcluir(id_professor) {
    $.ajax({
        url: '../Cadastro/PDO/Excluir/professorExcluir.php',
        method: 'POST',
        data: { id_professor: id_professor },
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
        listarTudoProfessor();
    })
}