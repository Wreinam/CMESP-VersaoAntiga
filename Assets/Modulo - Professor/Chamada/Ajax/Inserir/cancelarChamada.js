function cancelarChamada(id_turma){
    $.ajax({
        url: '../Chamada/PDO/Inserir/cancelarChamada.php',
        method: 'POST',
        data: {id_turma:id_turma}
    }).done(function (result) {
        if(result == "Cancelado"){
            const toastLiveExample = document.getElementById('notificaoSucesso');
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
            toastBootstrap.show();
            listarTurmaPorProfessor()
        }else{
            const modalNaoExecutada = document.getElementById('modalNaoExecutada')
            const myModalAlternative = bootstrap.Modal.getOrCreateInstance(modalNaoExecutada);
            myModalAlternative.show();
        }
    })
}