<?php

define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'celke');


$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

try{
    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $erro){
    echo "Ocorreu um erro de conexao: {$erro->getMessage()}";
    $conn = null;
}