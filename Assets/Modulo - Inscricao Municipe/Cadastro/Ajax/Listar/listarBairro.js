function listarBairro() {
    $.ajax({
        url: "../Cadastro/PDO/Listar/listarBairro.php",
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        var select = document.getElementById("selectBairro");
        select.innerHTML = "";
        result.forEach((item) => {
            var option = document.createElement("option");
            option.value = item["nome_bairro"];
            option.textContent = item["nome_bairro"];
            select.appendChild(option);
        });
    })
}
listarBairro();