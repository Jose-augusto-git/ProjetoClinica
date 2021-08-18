<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$nascimento = $_POST['nascimento'];
$dataHoje = $_POST['dataHoje'];
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$profissao = filter_input(INPUT_POST, 'profissao', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);

$qp = filter_input(INPUT_POST, 'qp', FILTER_SANITIZE_STRING);
$qs = filter_input(INPUT_POST, 'qs', FILTER_SANITIZE_STRING);
$hma = filter_input(INPUT_POST, 'hma', FILTER_SANITIZE_STRING);
$exames = filter_input(INPUT_POST, 'exames', FILTER_SANITIZE_STRING);
$cirurgias = filter_input(INPUT_POST, 'cirurgias', FILTER_SANITIZE_STRING);
$menarca = filter_input(INPUT_POST, 'menarca', FILTER_SANITIZE_STRING);
$tireoide = filter_input(INPUT_POST, 'tireoide', FILTER_SANITIZE_STRING);
$estomago = filter_input(INPUT_POST, 'estomago', FILTER_SANITIZE_STRING);
$pancreas = filter_input(INPUT_POST, 'pancreas', FILTER_SANITIZE_STRING);
$coracao = filter_input(INPUT_POST, 'coracao', FILTER_SANITIZE_STRING);
$utero = filter_input(INPUT_POST, 'utero', FILTER_SANITIZE_STRING);
$prostata = filter_input(INPUT_POST, 'prostata', FILTER_SANITIZE_STRING);
$menopausa = filter_input(INPUT_POST, 'menopausa', FILTER_SANITIZE_STRING);
$rins = filter_input(INPUT_POST, 'rins', FILTER_SANITIZE_STRING);
$intestino = filter_input(INPUT_POST, 'intestino', FILTER_SANITIZE_STRING);
$pulmao = filter_input(INPUT_POST, 'pulmao', FILTER_SANITIZE_STRING);
$sono = filter_input(INPUT_POST, 'sono', FILTER_SANITIZE_STRING);
$figado = filter_input(INPUT_POST, 'figado', FILTER_SANITIZE_STRING);
$sintoma = filter_input(INPUT_POST, 'sintoma', FILTER_SANITIZE_STRING);
$osteopatia = filter_input(INPUT_POST, 'osteopatia', FILTER_SANITIZE_STRING);
$dhs = filter_input(INPUT_POST, 'dhs', FILTER_SANITIZE_STRING);
$microfisioterapia = filter_input(INPUT_POST, 'microfisioterapia', FILTER_SANITIZE_STRING);
$homeopatia = filter_input(INPUT_POST, 'homeopatia', FILTER_SANITIZE_STRING);
$sessao = filter_input(INPUT_POST, 'sessao', FILTER_SANITIZE_STRING);



$result_usuario = "INSERT INTO ficha (nome,telefone,nascimento,dataHoje,email,profissao,cidade,
uf,endereco,qp,qs,hma,exames,cirurgias,menarca,tireoide,estomago,pancreas,coracao,utero,prostata,menopausa,rins,intestino,pulmao,sono,figado,sintoma,osteopatia,dhs,microfisioterapia,homeopatia,sessao) VALUES ('$nome','$telefone','$nascimento','$dataHoje','$email','$profissao','$cidade',
'$uf','$endereco','$qp','$qs','$hma','$exames','$cirurgias','$menarca','$tireoide','$estomago','$pancreas','$coracao','$utero','$prostata','$menopausa','$rins','$intestino','$pulmao','$sono','$figado','$sintoma','$osteopatia','$dhs','$microfisioterapia','$homeopatia','$sessao')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_affected_rows($conn)) {
	$_SESSION['msg'] = "<p style='color:#addb31;font-size:3.0rem;max-width: 1000px;'>      
	<img src='imagem/verifica.svg' alt='voltar' style='width: 4rem;'>Usuário cadastrado com sucesso</p>";
	header("Location: ficha.php");
} else {
	$_SESSION['msg'] = "<p style='color:red; font-size:3.0rem;max-width: 1000px;'>
	<img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: ficha.php");
}