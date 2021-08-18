<?php 
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
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

$result_usuario = "UPDATE agendamento SET  nome='$nome',telefone='$telefone',nascimento='$nascimento',dataHoje='$dataHoje',email='$email',profissao='$profissao',cidade='$cidade',
uf='$uf',endereco='$endereco',dataAgendamento='$dataAgendamento',das='$das',ate='$ate',modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query( $conn ,$result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:#addb31;font-size:3.0rem;max-width: 1000px;'>
    
    <img src='imagem/verifica.svg' alt='voltar' style='width: 4rem;'>Paciente editado com sucesso</p>";
	header("Location: busca.php");
}else{
	$_SESSION['msg'] = "<p style='color:red; font-size:3.0rem;max-width: 1000px;'>
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
    Dados do paciente  não foi cadastrado com sucesso
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>Usuário não foi editado com sucesso</p>";
	header("Location: edita_paciente.php?id=$id");
}


