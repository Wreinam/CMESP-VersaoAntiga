function atualizarProfessor() {
    var id_professor = $('#idModalEditProfessorInput').val();
    var novoNome = $('#nomeProfessorEditInput').val();
    $.ajax({
        url: '../Cadastro/PDO/Atualizar/professorAtualizar.php',
        method: 'POST',
        data: { id_professor: id_professor, nome_professor: novoNome},
    }).done(function () {
        const toastLiveExample = document.getElementById('notificaoSucesso');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
        listarTudoProfessor();
        listarTurma();
    })
}