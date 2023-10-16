function listarAlunosChamada(id_turma) {
  $.ajax({
    url: '../Chamada/PDO/Listar/listarAlunosChamada.php',
    method: 'POST',
    dataType: 'JSON',
    data: { id_turma: id_turma }
  }).done(function (result) {
    $("#tabelaAlunosChamada").empty();
    var id = 0;
    result.forEach((element) => {
      id++
      $("#tabelaAlunosChamada").append(`
          <tr>
            <th>${id}</th>
            <td>${element["nome_aluno"]}</td>
            <td>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Presente" name="presenca${id}" id="presenca${id}" style="width: 28px; height: 28px;">
                <input type="hidden" name="id_matricula${id}" value="${element["id_matricula"]}">
              </div>
            </td>
            <td>
              <a type="button" class="me-4" data-bs-toggle="modal" data-bs-target="#modalAnamneseAluno"><i class="bi bi-info-square"></i> Anamnese</a>
            </td>
          </tr>
            `);
    });
    $("#tabelaAlunosChamada").append(`
      <input  type="hidden" name="total_aluno_chamada" value="${id}">
      <input  type="hidden" name="id_turma" value="${result[0]["id_turma"]}">
    `);
  })
}