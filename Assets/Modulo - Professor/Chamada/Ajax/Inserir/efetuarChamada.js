
function efetuarChamada() {
    var formData = "";
    formData = new FormData($("#formularioChamada")[0]);
    $.ajax({
        url: '../Chamada/PDO/Inserir/efetuarChamada.php',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
    }).done(function (result) {
        if (result == "Sucesso") {
            const toastLiveExample = document.getElementById('notificaoSucesso');
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
            toastBootstrap.show();
            listarTurmaPorProfessor();
        } else {
            const modalNaoExecutada = document.getElementById('notificaoErro')
            const myModalAlternative = bootstrap.Modal.getOrCreateInstance(modalNaoExecutada);
            myModalAlternative.show();
        }

    })
}
