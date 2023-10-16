function cadastroMatricula(id_turma) {
    $.ajax({
        url: '../../Modulo - Lista de Espera/Nova Matricula/novaMatricula.php',
        method: 'POST',
        data: { id_turma: id_turma },
    }).done(function (result) {
        
        if (result == "Matriculado") {
            const toastLiveExample = document.getElementById('notificaoMatriculado');
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
            toastBootstrap.show();
        } else if(result == "Espera"){
            const toastLiveExample = document.getElementById('notificaoEspera');
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
            toastBootstrap.show();
            listarListaEspera();
        }else{
            const toastLiveExample = document.getElementById('notificaoSucesso');
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
            toastBootstrap.show();
            listarMatricula();
            
        }

    })
}