function listarBairroSelect(id_modalidade) {
    
    $.ajax({
        url: "../Inscrever-se/PDO/Listar/listarBairroPorModalidade.php",
        method: 'POST',
        dataType: 'json',
        data: { id_modalidade: id_modalidade},
    }).done(function (result) {
        var select = document.getElementById("select_nome_bairro");
        select.innerHTML = "";
        result.forEach((item) => {
            var option = document.createElement("option");
            option.value = item["bairro"];
            option.textContent = item["bairro"];
            select.appendChild(option);
        });
        listarTurmaSelect(result[0]["bairro"], id_modalidade);
    })
}