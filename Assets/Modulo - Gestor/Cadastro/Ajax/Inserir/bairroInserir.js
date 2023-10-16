function cadastroBairro() {
    var nomeBairro = $('#nomeBairro').val();
    $.ajax({
        url: '../Cadastro/PDO/Inserir/bairroInserir.php',
        method: 'POST',
        data: { nomeBairro: nomeBairro},
    }).done(function () {
        document.getElementById("nomeBairro").value = "";
        const toastLiveExample = document.getElementById('notificaoSucesso');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
        listarBairro();
        listarBairroFiltro();
    })
}