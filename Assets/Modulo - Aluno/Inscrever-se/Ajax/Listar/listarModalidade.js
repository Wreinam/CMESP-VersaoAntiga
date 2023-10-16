function listarModalidadeSelect() {
    $.ajax({
        url: "../Inscrever-se/PDO/Listar/listarModalidade.php",
        method: 'POST',
        dataType: 'json'
    }).done(function (result) {
        var select = document.getElementById("select_id_modalidade");
        select.innerHTML = "";
        result.forEach((item) => {
            var option = document.createElement("option");
            option.value = item["id_modalidade"];
            option.textContent = item["nome_modalidade"];
            select.appendChild(option);
        });
        listarBairroSelect(result[0]["id_modalidade"])
    })
}
listarModalidadeSelect();