function cadastroProfessor(nome_professor, usuario, senha) {
    $.ajax({
        url: '../Cadastro/PDO/Inserir/professorInserir.php',
        method: 'POST',
        data: { nome_professor: nome_professor, usuario: usuario, senha: senha},
    }).done(function () {
        document.getElementById("nomeProfessor").value = "";
        document.getElementById("usuarioProfessor").value = "";
        document.getElementById("senhaProfessor").value = "";
        const toastLiveExample = document.getElementById('notificaoSucesso');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
        listarTudoProfessor();
    })
}