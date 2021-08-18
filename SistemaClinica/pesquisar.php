<?php
    session_start();
    include_once("conexao.php");
    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("acoes/conexao.php");

        $adm  = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = 'index.php'</script>";
    }
?>




<!DOCTYPE html>
<html lang="pt_br" style="
    background: #dd636e;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#8257E5">

    <title> New Life | Busca de Pacientes </title>
    <?php 
    echo "<link rel='icon' href='imagem/busca.svg'/>";
    ?>

    <link rel="icon" href="/public/imagem/busca.svg"/>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/partials/header.css">
    <link rel="stylesheet" href="css/partials/forms.css">
    <link rel="stylesheet" href="css/partials/busca.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <style>
    .input-block input, .select-block input{
    width: 30rem;
    height: 4.6rem;
    margin-top: 0.8rem;
    border-radius: 0.8rem;
    background: var(--color-input-background);
    border: 1px solid var(--color-line-in-white);
    outline: 0;
    padding: 0 1.6rem;
    font: 1.6rem Archivo;
}

 .select-block2 input{
    width: 20rem;
    height: 4.6rem;
    margin-top: 0.8rem;
    border-radius: 0.8rem;
    background: var(--color-input-background);
    border: 1px solid var(--color-line-in-white);
    outline: 0;
    padding: 0 1.6rem;
    font: 1.6rem Archivo;
}
    </style>
</head>
<body id="busca" style='font-size: 2rem;'>

    <div id="container" style="background:#dd636e">
        <header class="page-header" style="background-color: #3c87d0;">
            <div class="top-bar-container">
            <a href="dashboard.php">
                        <?php
                            echo "<img src='imagem/voltar.svg' alt='voltar'>";
                        ?>                     
            </a>
           
            
            </div>
            <div class="header-content">
                <div id="imagem">
                        <?php
                            echo "<img src='imagem/pesquisa.svg' alt='voltar'>";
                        ?>         
                    
                </div>
                <strong>Busca de agendamentos disponiveis </strong><!--strong vem com a fonte em negrito-->
                <p style='color:red; font-size:2.5rem'>Pesquise no campo abaixo no nome do paciente</p>
                <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                 ?>   
                <form id="busca-cliente" method="POST" action="">
                    <div class="select-block">
                        <label> Pesquisar Paciente </label>
                            <div class="select-block">
                        
                        
                            
                             <input id="subject" type="text" name="nome" placeholder="Digite o nome">
                           
                        
                        
                            </div>
                            

                           

                        
                    </div>          
                    <button name="SendPesqUser" type="submit" value="Pesquisar"> Pesquisar </button><!--submit quando um botao estiver no formulario o submit ira  envivar o formulario-->
                   
                    
                    
                    
                </form><!--form formulario-->

                
                
                
        </header>
            <main>
               <!-- <h1>{{title}}</h1> aqui faz o uso do objeto -->

                    
                

                <article class="item-cliente" style='font-size: 2rem;'>
                    <header>
                       <!-- <img 
                            src="{{paciente.avatar}}" 
                            alt="{{paciente.name}}"> -->
                        <div>
                            <h1 style='margin: 1.2rem 0 1.2rem 0'> Dados do Cliente</h1>
                            <?php
                            
                            $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
                            if($SendPesqUser){
                                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                                $result_usuario = "SELECT * FROM  agendamento WHERE nome LIKE '%$nome%'";
                                $resultado_usuario = mysqli_query($conn, $result_usuario);
                                while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
                                    echo '<h1> ID:<br></h1>' . $row_usuario['id'] . "<br><hr>";
                                    echo '<h1> Nome:<br></h1>' . $row_usuario['nome'] . " <br><hr>";
                                    echo '<h1> Telefone:<br></h1>'. $row_usuario['telefone'] . "<br><hr>";
                                    echo "<h1>Data de Nascimento:</h1>" . $row_usuario['nascimento'] . "<br><hr>";
                                    echo "<h1>Data do Cadastro:</h1>" . $row_usuario['dataHoje'] . "<br><hr>";
                                    echo "<h1>Email:</h1> " . $row_usuario['email'] . "<br><hr>";
                                    echo "<h1>Profissão: </h1>" . $row_usuario['profissao'] . "<br><hr>";
                                    echo "<h1>Cidade: </h1>" . $row_usuario['cidade'] . "<br><hr>";
                                    echo "<h1>Estado: </h1>" . $row_usuario['uf'] . "<br><hr>";
                                    echo "<h1>Endereço: </h1>" . $row_usuario['endereco'] . "<br><hr>";
                                    
                                    echo "<h1>Data de Agendamento: </h1>" . $row_usuario['dataAgendamento'] . "<br><hr>";
                                    
                                    echo "<h1>Horario de inicio: </h1>" . $row_usuario['das'] . "<br><hr>";
                                //    echo "<h1>Ate as:  </h1>" . $row_usuario['ate'] . "<br><hr>";  
                                    echo "<a style='background: none;
                                    border: 0;
                                    
                                    text-decoration:none;
                                    color: #a9a9a9;
                                    font: 700 2rem Archivo;
                                    cursor: pointer;' type='button' value='Imprimir' onClick='window.print()'> Imprimir |</a>";                     
                                    echo "<a style='background: none;
                                    border: 0;
                                    
                                    text-decoration:none;
                                    color:   #009c37;
                                    font: 700 2rem Archivo;
                                    cursor: pointer;'
                                    href='edita_paciente.php?id=" . $row_usuario['id'] . "'>| Editar Dados |</a>";
                                    echo "<a style='background: none;
                                    border: 0;
                                    
                                    text-decoration:none;
                                    color: red;
                                    font: 700 2rem Archivo;
                                    cursor: pointer;'
                                    href='apagar_paciente_busca.php?id=" . $row_usuario['id'] . "' 
                                    data-confirm='Tem certeza que deseja apagar esse paciente?'
                                    >| Apagar Dados</a><br><hr>";

                                    
                                }
                            }
                            

                            
                            ?>

                            

                            
                            
                        
                            
                            
                          <!--  <span>{{paciente.subject}}</span>-->
                        </div>
                    </header>
                
                    
                   <!-- <footer>
                        <p>Preço/hora<strong>R$ {{paciente.cost}}</strong>
                        </p>
                        <a href="https://api.whatsapp.com/send?1=pt_BR&phone=55{{paciente.whatsapp}}&text=Tenho interesse na sua aula de {{paciente.subject}} {{paciente.name}}"
                        class="button" target="_blank">
                            <img src="/images/icons/whatsapp.svg" alt="Whatsapp">Entrar em contato
                        </a>
                    </footer>-->
                </article>

            

            </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" ></script>
    
    <script src="js/personalizado.js"></script>
</body>
</html>
