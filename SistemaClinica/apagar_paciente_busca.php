
<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM agendamento WHERE id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:#addb31;font-size:3.0rem;max-width: 1000px;'>
        
        <img src='imagem/verifica.svg' alt='voltar' style='width: 4rem;'>
        Dados do paciente apagado com sucesso
        </p>";
        header("Location: pesquisar.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red; font-size:3.0rem;max-width: 1000px;'>
        <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
        Dados do paciente  não foi apagado com sucesso
        <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
        </p>";
        header("Location: pesquisar.php");
	}
}else{	
    $_SESSION['msg'] = "<p style='color:red; font-size:3.0rem;max-width: 1000px;'>
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
    Selecione um paciente para apagar 
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'></p>";
    header("Location: pesquisar.php");
}
