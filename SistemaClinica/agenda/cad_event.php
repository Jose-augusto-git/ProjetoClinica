<?php

session_start();

include_once './conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// converter data e hora no formato pt-br para o formato do banco de dados

//$data_start = str_replace('/', '-', $dados['start']);
//$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));


$query_event = "INSERT INTO events (title, color, start) VALUES (:title, :color, :start)";

$insert_event = $conn->prepare($query_event);
$insert_event->bindParam(':title', $dados['title']);
$insert_event->bindParam(':color', $dados['color']);
$insert_event->bindParam(':start', $dados['start']);
//$insert_event->bindParam(':end', $data_end_conv);

if ($insert_event->execute()) {
    $retorna = ['sit' => true, 'msg' =>
    '<div class="alert alert-success">
    Consulta marcada com sucesso!
    </div>'];

    $_SESSION['msg'] =    
    '<div class="alert alert-success">
    Consulta marcada com sucesso!
    </div>';
}else{
    $retorna = ['sit' => true, 'msg' =>
    '<div class="alert alert-danger">
    Ops... Erro ao marcar a consltar!
    </div>'];
}



header('Content-Type: application/json');
echo json_encode($retorna);
