<?php

session_start();

include_once './conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// converter data e hora no formato pt-br para o formato do banco de dados

//$data_start = str_replace('/', '-', $dados['start']);
//$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));


$query_event = "UPDATE events SET title=:title, color=:color, start=:start WHERE id=:id";

$update_event = $conn->prepare($query_event);
$update_event->bindParam(':title', $dados['title']);
$update_event->bindParam(':color', $dados['color']);
$update_event->bindParam(':start', $dados['start']);
$update_event->bindParam(':id', $dados['id']);

//$insert_event->bindParam(':end', $data_end_conv);

if ($update_event->execute()) {
    $retorna = ['sit' => true, 'msg' =>
    '<div class="alert alert-success">
    Consulta editada com sucesso!
    </div>'];

    $_SESSION['msg'] =    
    '<div class="alert alert-success">
    Consulta editada com sucesso!
    </div>';
}else{
    $retorna = ['sit' => true, 'msg' =>
    '<div class="alert alert-danger">
    Ops... Erro ao editar a consltar!
    </div>'];
}



header('Content-Type: application/json');
echo json_encode($retorna);
