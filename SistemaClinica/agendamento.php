<?php 
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$nascimento = $_POST ['nascimento'];
$dataHoje = $_POST ['dataHoje'];
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$profissao = filter_input(INPUT_POST, 'profissao', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$dataAgendamento = $_POST ['dataAgendamento'];
$das = $_POST ['das'];
$ate = $_POST ['ate'];

//echo "Nome: $nome <br> ";
//echo "E-mail: $email<br> ";

$result_usuario = "INSERT INTO agendamento (nome,telefone,nascimento,dataHoje,email,profissao,cidade,
uf,endereco,dataAgendamento,das,ate,modified) VALUES ('$nome','$telefone','$nascimento','$dataHoje','$email','$profissao','$cidade',
'$uf','$endereco','$dataAgendamento','$das','$ate',NOW())";
$resultado_usuario = mysqli_query( $conn ,$result_usuario);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style='color:#addb31;font-size:3.0rem;max-width: 1000px;'>
    
    <img src='imagem/verifica.svg' alt='voltar' style='width: 4rem;'>
    Paciente cadastrado
    </p>";
    header("Location: cadastro.php");
}else{
    $_SESSION['msg'] = "<p style='color:red; font-size:3.0rem;max-width: 1000px;'>
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
    Dados do paciente  não foi cadastrado com sucesso
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
    </p>";
    header("Location: busca.php");
}


