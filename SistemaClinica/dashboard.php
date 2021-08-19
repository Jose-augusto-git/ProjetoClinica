<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("acoes/conexao.php");

        $adm  = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = 'index.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewLife | Tela inicial <?php echo $nome; ?></title>
    <link rel="icon" href="imagem/a.svg" />

    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tela-principal.css">
    <link rel="stylesheet" href="css/parallax.css">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <!-- Text fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
</head>

<body class="overflow-hidden">

    <nav id="cor-menu" class="navbar navbar-expand-lg navbar-dark">
        <!-- Logo -->
        <div class="container-fluid">
            <a class=" fixed navbar-brand text-success ps-5">
                <h2>New<span class="text-danger">Life</span></h2>
            </a>

            <!---------------------->

            <!-- Botóes do menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>




            <div class="collapse navbar-collapse pe-5 " id="navbarNavDropdown">
                <ul class="navbar-nav text-center">
                    <li class="nav-item">
                        <a class="nav-link active buttons-container text-dark " aria-current="page" href="#">Tela Principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="buttons-container nav-link btn btn-outline-success border-0" href="ficha.php">Cadastro de Fichas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle buttons-container btn btn-outline-success border-0" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Fichas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item buttons-container" href="busca-ficha.php">Ficha de Pacientes</a></li>
                            <li><a class="dropdown-item buttons-container" href="busca.php">Ficha de Agendamento</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle buttons-container btn btn-outline-success border-0" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Buscar
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item buttons-container buttons-container" href="pesquisar_ficha.php">Busca de Pacientes</a></li>
                            <li><a class="dropdown-item buttons-container buttons-container" href="pesquisar.php">Busca de Agendamento</a></li>
                        </ul>
                    </li>
                    <li class="nav-item buttons-container">
                        <a id="sair" class="nav-link text-white  btn btn-outline-danger border-0" href="acoes/logout.php">Sair do Sistema</a>
                    </li>
                </ul>
            </div>
            <!-------------------------------------------------------------------------------------->
        </div>
    </nav>


    <div class="caixa1">
        <div class="conteudo-titulo">
            <a class="nav-link" href="agenda/agenda.php"><span class="titulo">Clique Aqui para Agendar no Calendario</span></a>
        </div>
    </div>



</body>

</html>

  <!--  <p class="total-connections"> Total de 200 conexeões ja realizadas
        <img src="/images/icons/purple-heart.svg" alt="Coração roxo">
    </p>-->
<!-- isso e uma tag <html> -->
<!-- Na tag <head> irá configurações do meu documento -->
<!-- Na tag <body> Todo conteúdo sera visível na página-->
<!--
    HTML

    HyperText
        HiperTexto

    Markup
        Marcação

    linguage
        linguagem

    html não e uma linguagem de programação, e uma marcação de texto
-->