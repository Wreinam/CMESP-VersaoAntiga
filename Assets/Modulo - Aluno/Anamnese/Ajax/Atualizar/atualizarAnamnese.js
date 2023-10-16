function atualizarAnamnese() {
    var formData = "";
    formData = new FormData($("#anamneseFormulario")[0]);
    if (document.getElementById("checkboxTermo").checked) {
        $.ajax({
            url: '../Anamnese/PDO/Atualizar/atualizarAnamnese.php',
            method: 'POST',
            data: formData,
            contentType: false, // Não definir o tipo de conteúdo
            processData: false,
        }).done(function () {
            const toastLiveExample = document.getElementById('notificaoSucesso');
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
            toastBootstrap.show();
            listarAnamnese();
            
        })
    }else{
        const toastLiveExample = document.getElementById('notificaoErro');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
    }

}