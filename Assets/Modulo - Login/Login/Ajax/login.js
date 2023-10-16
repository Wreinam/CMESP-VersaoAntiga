function logar() {
    var formData = new FormData($("#loginForm")[0]);
    $.ajax({
        url: '../Login/PDO/login.php',
        method: 'POST',
        data: formData,
        contentType: false, // Não definir o tipo de conteúdo
        processData: false,
    }).done(function (result) {
        if (result == "Logado") {
            window.location.replace('../../Modulo - Aluno/Dashboard/aluno.php');
        } else if(result == "LogadoProfessor"){
            window.location.replace('../../Modulo - Professor/Dashboard/professor.php');
        }else{
            console.log("Erro em algum dado do login!!!")
        }

    })
}