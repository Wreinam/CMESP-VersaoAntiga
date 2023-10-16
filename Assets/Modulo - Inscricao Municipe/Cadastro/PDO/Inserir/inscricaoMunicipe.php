<?php
function validarCPF($cpf)
{
    // Remove caracteres não numéricos
    $cpf = str_replace(['.', '-'], '', $cpf);

    // Verifica se o CPF possui 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se todos os dígitos são iguais (ex: 111.111.111-11)
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Calcula o primeiro dígito verificador
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma += $cpf[$i] * (10 - $i);
    }
    $dv1 = ($soma % 11 < 2) ? 0 : 11 - ($soma % 11);

    // Calcula o segundo dígito verificador
    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += $cpf[$i] * (11 - $i);
    }
    $dv2 = ($soma % 11 < 2) ? 0 : 11 - ($soma % 11);

    // Verifica se os dígitos calculados são iguais aos dígitos informados
    return ($dv1 == $cpf[9] && $dv2 == $cpf[10]);
}

// Fazer validação de campos vazios via servidor
require('../../../../conexao.php');
//Pegar todas as Variaveis do Post verificando se ele existe

$id_parentesco = $_POST['id_parentesco'];
$nome_responsavel = $_POST['nome_responsavel'];
$rg_responsavel = $_POST['rg_responsavel'];
$cpf_responsavel = $_POST['cpf_responsavel'];
$imagem1Nome = $_FILES['imagem1']['name'];
$imagem2Nome = $_FILES['imagem2']['name'];
$nome_aluno = $_POST['nome_aluno'];
$nome_mae = $_POST['nome_mae'];
$nome_pai = $_POST['nome_pai'];
$data_nascimento = $_POST['data_nascimento'];
$idade = $_POST['idade'];
$cpf_aluno = $_POST['cpf_aluno'];
$rg_aluno = $_POST['rg_aluno'];
$imagem3Nome = $_FILES['imagem3']['name'];
$imagem4Nome = $_FILES['imagem4']['name'];
$telefone = $_POST['telefone'];
$telefone_emergencia = $_POST['telefone_emergencia'];
$email = $_POST['email'];
$nome_rua = $_POST['nome_rua'];
$bairro = $_POST['bairro'];
$nome_escola = $_POST['nome_escola'];
$id_serie = $_POST['id_serie']; //Mudar no html o campo serie e colocar um select
$periodo = $_POST['periodo'];
$senha = $_POST['senha'];
$confirma_senha = $_POST['confirma_senha']; //Encriptar senha

//Fazer validação do CPF, verificar se é verdadeiro.
if (validarCPF($cpf_aluno)) {
    // Fazer validação, se existe algum cadastro com os dados cpf ja cadastrados.
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM iscricao_tab WHERE iscricao_tab.cpf_aluno = :cpf_aluno;");
    $stmt->bindParam(':cpf_aluno', $cpf_aluno, PDO::PARAM_INT);
    $stmt->execute();
    $num_usos = 0;
    $num_usos = $stmt->fetchColumn();

    if ($num_usos >= 1) {
        echo "cpfExiste";
    } else {
        try {

            $query = "INSERT INTO iscricao_tab (id_parentesco, nome_responsavel, rg_responsavel,
        cpf_responsavel,rg_responsavel_frente, rg_responsavel_verso, nome_aluno, nome_mae, nome_pai, data_nascimento,
        idade, cpf_aluno, rg_aluno, rg_aluno_frente, rg_aluno_verso, telefone, telefone_emergencia, email, nome_rua,
        bairro, nome_escola, id_serie, periodo, senha) 
        VALUES (:id_parentesco, :nome_responsavel, :rg_responsavel, :cpf_responsavel, :rg_responsavel_frente, :rg_responsavel_verso,
        :nome_aluno, :nome_mae, :nome_pai, :data_nascimento, :idade, :cpf_aluno, :rg_aluno, :rg_aluno_frente, :rg_aluno_verso, 
        :telefone, :telefone_emergencia, :email, :nome_rua, :bairro, :nome_escola, :id_serie, :periodo, :senha)";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_parentesco', $id_parentesco);
            $stmt->bindParam(':nome_responsavel', $nome_responsavel);
            $stmt->bindParam(':rg_responsavel', $rg_responsavel);
            $stmt->bindParam(':cpf_responsavel', $cpf_responsavel);
            $stmt->bindParam(':rg_responsavel_frente', $imagem1Nome);
            $stmt->bindParam(':rg_responsavel_verso', $imagem2Nome);
            $stmt->bindParam(':nome_aluno', $nome_aluno);
            $stmt->bindParam(':nome_mae', $nome_mae);
            $stmt->bindParam(':nome_pai', $nome_pai);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':idade', $idade);
            $stmt->bindParam(':cpf_aluno', $cpf_aluno);
            $stmt->bindParam(':rg_aluno', $rg_aluno);
            $stmt->bindParam(':rg_aluno_frente', $imagem3Nome);
            $stmt->bindParam(':rg_aluno_verso', $imagem4Nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':telefone_emergencia', $telefone_emergencia);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':nome_rua', $nome_rua);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':nome_escola', $nome_escola);
            $stmt->bindParam(':id_serie', $id_serie);
            $stmt->bindParam(':periodo', $periodo);
            $stmt->bindParam(':senha', $senha);

            if ($stmt->execute()) {
                $diretorio_destino = '../../../Documentos/' . $cpf_aluno . '/';
                // Verifica se o diretório de destino existe, senão cria
                if (!is_dir($diretorio_destino)) {
                    mkdir($diretorio_destino, 0755, true);
                }
                // Loop para processar as quatro imagens enviadas
                for ($i = 1; $i <= 4; $i++) {
                    // Verifica se um arquivo foi enviado para este campo
                    if (isset($_FILES['imagem' . $i])) {
                        // Nome do arquivo e local temporário do arquivo enviado
                        $nome_arquivo = $_FILES['imagem' . $i]['name'];
                        $arquivo_temporario = $_FILES['imagem' . $i]['tmp_name'];
                        // Move o arquivo para o diretório de destino
                        $caminho_destino = $diretorio_destino . $nome_arquivo;
                        move_uploaded_file($arquivo_temporario, $caminho_destino);
                    }
                }
                echo "Sucesso ao enviar os Arquivos";
            } else {
                echo "Erro na hora de enviar os Arquivos";
            }
        } catch (PDOException $e) {
            echo "Erro na tentativa de fazer o cadastro: " . $e->getMessage();
        }
    }
} else {
    echo "cpfInvalido";
}
