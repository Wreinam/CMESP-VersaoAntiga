function excluirMatricula(id_matricula, id_turma) {
    $.ajax({
        url: '../../Modulo - Lista de Espera/Cancelamento de Matricula/cancelaMatricula.php',
        method: 'POST',
        data: { id_matricula: id_matricula, id_turma:id_turma },
    }).done(function (result) {
        console.log(result);
        const toastLiveExample = document.getElementById('notificaoSucesso');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
        listarMatricula();
    })
}