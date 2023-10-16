function listarTurmaPorProfessor() {
  $.ajax({
    url: '../Chamada/PDO/Listar/listarTurmaPorProfessor.php',
    method: 'POST',
    dataType: 'JSON',
  }).done(function (result) {
    var dataHoje = new Date().toLocaleDateString('pt-BR');
    $("#chamadaTurma").empty();
    
    $("#dataHojeChamada").text(`Chamadas do dia ${dataHoje}.`);
    result.forEach((element) => {
      if (element["status"] == "Efetuada") {
        $("#chamadaTurma").append(`
        <div class="card text-bg-light mb-3" style="max-width: 18rem; min-width: 15rem;">
            <div class="card-header pb-0 d-flex justify-content-between">
              <p class="fs-5">${element["nome_modalidade"]}</p>
            </div>

            <div class="card-body">
              <p class="card-text mb-2 fs-6">Nivél: ${element["nivel"]}</p>
              <p class="card-text mb-2 fs-6">Horario: ${element["horario_inicio"]} ás ${element["horario_termino"]}</p>
              <p class="card-text mb-2 fs-6">Bairro: ${element["bairro"]}</p>
              <p class="card-text mb-2 fs-6">Rua: ${element["rua"]}</p>
              <p class="card-text mb-2 fs-6">Nome Local: ${element["nome_local"]}</p>
              <button type="button" class="btn btn-primary" disabled>Chamada Efetuada</button>
            </div>
          </div>
        `);
      } else if (element["status"] == "Cancelada") {
        $("#chamadaTurma").append(`
        <div class="card text-bg-light mb-3" style="max-width: 18rem; min-width: 15rem;">
            <div class="card-header pb-0 d-flex justify-content-between">
              <p class="fs-5">${element["nome_modalidade"]}</p>
            </div>

            <div class="card-body">
              <p class="card-text mb-2 fs-6">Nivél: ${element["nivel"]}</p>
              <p class="card-text mb-2 fs-6">Horario: ${element["horario_inicio"]} ás ${element["horario_termino"]}</p>
              <p class="card-text mb-2 fs-6">Bairro: ${element["bairro"]}</p>
              <p class="card-text mb-2 fs-6">Rua: ${element["rua"]}</p>
              <p class="card-text mb-2 fs-6">Nome Local: ${element["nome_local"]}</p>
              <button type="button" class="btn btn-secondary" disabled>Chamada cancelada</button>
            </div>
          </div>
        `);
      } else {
        $("#chamadaTurma").append(`
        <div class="card text-bg-light mb-3" style="max-width: 18rem; min-width: 15rem;">
          <div class="card-header pb-0 d-flex justify-content-between">
            <p class="fs-5">${element["nome_modalidade"]}</p>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelarChamadaModal${element["id_turma"]}" aria-label="Close" style="height: 40px">Cancelar</button>
          </div>

          <div class="card-body">
            <p class="card-text mb-2 fs-6">Nivél: ${element["nivel"]}</p>
            <p class="card-text mb-2 fs-6">Horario: ${element["horario_inicio"]} ás ${element["horario_termino"]}</p>
            <p class="card-text mb-2 fs-6">Bairro: ${element["bairro"]}</p>
            <p class="card-text mb-2 fs-6">Rua: ${element["rua"]}</p>
            <p class="card-text mb-2 fs-6">Nome Local: ${element["nome_local"]}</p>
            <button type="button" class="btn btn-primary" onclick="listarAlunosChamada(${element["id_turma"]})" data-bs-toggle="modal" data-bs-target="#modalChamadaLista">Efetuar Chamada</button>
          </div>

          <div class="modal fade" id="cancelarChamadaModal${element["id_turma"]}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Cancelar Chamada "09/10/2023"</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Deseja realmente cancelar está chamada?
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="cancelarChamada(${element["id_turma"]})" class="btn btn-danger" data-bs-dismiss="modal">Sim</button>
                  <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Não</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        `);
      }
    });
  })
}
listarTurmaPorProfessor();