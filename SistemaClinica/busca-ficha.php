<?php require_once'validador_acesso.php'; ?>

<!DOCTYPE html>
<html lang="pt_br" style="
    background: black;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#8257E5">

    <title> New Life | Lista de ficha de pacientes </title>
    <?php 
    echo "<link rel='icon' href='imagem/lista.svg'/>";
    ?>

    <link rel="icon" href="/public/imagem/busca.svg"/>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/partials/header.css">
    <link rel="stylesheet" href="css/partials/forms.css">
    <link rel="stylesheet" href="css/partials/busca.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
</head>
<body id="busca" style='font-size: 2rem;'>

    <div id="container" style="background:black">
        <header class="page-header" style="background-color: #cb1d21;">
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
                            echo "<img src='imagem/icon-lista.svg' alt='lista'>";
                        ?>         
                    
                </div>
                <strong> Ficha de Pacientes Disponiveis </strong><!--strong vem com a fonte em negrito-->
                <p style='color:black; font-size:2.5rem'>Aqui esta uma lista com todos os pacientes</p>
                <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                 ?>   
                <form id="busca-cliente" method="POST" action="">
                 
                
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
                            //recebe o numero da pagina
                                $pagina_atual = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_NUMBER_INT);
                                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                            //setar a quantidade de item para

                            $qnt_result_pg = 1;

                            //calcular  o inicio da visualização

                            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

                                $result_usuarios = "SELECT *FROM ficha LIMIT $inicio,$qnt_result_pg";
                                $resultado_usuarios = mysqli_query($conn, $result_usuarios);
                                while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
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

                                    echo "<h1>Q.P. : </h1>" . $row_usuario['qp'] . "<br><hr>";
                                    echo "<h1>Q.S. : </h1>" . $row_usuario['qs'] . "<br><hr>";
                                    echo "<h1>H.M.A: </h1>" . $row_usuario['hma'] . "<br><hr>";
                                    echo "<h1>Exames complementares: </h1>" . $row_usuario['exames'] . "<br><hr>";
                                    echo "<h1>Cirurgias: </h1>" . $row_usuario['cirurgias'] . "<br><hr>";
                                    echo "<h1>Menarca: </h1>" . $row_usuario['menarca'] . "<br><hr>";
                                    echo "<h1>Tireóide: </h1>" . $row_usuario['tireoide'] . "<br><hr>";
                                    echo "<h1>Estômago: </h1>" . $row_usuario['estomago'] . "<br><hr>";
                                    echo "<h1>Pâncreas: </h1>" . $row_usuario['pancreas'] . "<br><hr>";
                                    echo "<h1>Coração: </h1>" . $row_usuario['coracao'] . "<br><hr>";
                                    echo "<h1>Útero: </h1>" . $row_usuario['utero'] . "<br><hr>";
                                    echo "<h1>Próstata: </h1>" . $row_usuario['prostata'] . "<br><hr>";
                                    echo "<h1>Menopausa: </h1>" . $row_usuario['menopausa'] . "<br><hr>";
                                    echo "<h1>Rins: </h1>" . $row_usuario['rins'] . "<br><hr>";
                                    echo "<h1>Intestino: </h1>" . $row_usuario['intestino'] . "<br><hr>";
                                    echo "<h1>Pulmão: </h1>" . $row_usuario['pulmao'] . "<br><hr>";
                                    echo "<h1>Sono: </h1>" . $row_usuario['sono'] . "<br><hr>";   
                                    echo "<h1>Fígado EV.B. : </h1>" . $row_usuario['figado'] . "<br><hr>";
                                    echo "<h1>LEITURA DO SINTOMA / AUSCULTA: </h1>" . $row_usuario['sintoma'] . "<br><hr>";
                                    echo "<h1>Osteopatia: </h1>" . $row_usuario['osteopatia'] . "<br><hr>";
                                    echo "<h1>DHS: </h1>" . $row_usuario['dhs'] . "<br><hr>";
                                    echo "<h1>MICROFISIOTERAPIA: </h1>" . $row_usuario['microfisioterapia'] . "<br><hr>";
                                    echo "<h1>HOMEOPATIA: </h1>" . $row_usuario['homeopatia'] . "<br><hr>";   
                                    echo "<h1>sessao: </h1>" . $row_usuario['sessao'] . "<br><hr>";   

                                             
                                    echo "<a style='background: none;
                                    border: 0;
                                    
                                    text-decoration:none;
                                    color:   #009c37;
                                    font: 700 2rem Archivo;
                                    cursor: pointer;'
                                    href='edita_ficha.php?id=" . $row_usuario['id'] . "'>Editar Dados </a>";

                                    echo "<a
                                    style='background: none;
                                    border: 0;
                                    
                                    text-decoration:none;
                                    color:   red;
                                    font: 700 2rem Archivo;
                                    cursor: pointer;'
                                    
                                    href='apagar_ficha.php?id=" . $row_usuario['id'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'> | Apagar Dados</a><br><hr>";
                                    
                                }

                                //Paginação - somar a quantidade de usuarios de

                                $result_pg = "SELECT COUNT(id) AS num_result FROM ficha";
                                $resultado_pg = mysqli_query($conn, $result_pg);
                                $row_pg = mysqli_fetch_assoc($resultado_pg);
                               //echo $row_pg['num_result'];

                               //quantidade de paginas
                               $quantidade_pg =  ceil($row_pg['num_result']/ $qnt_result_pg);

                               //limitar os link antes e depois
                                $max_links = 4;
                                echo"<a href='busca-ficha.php?pagina=1'

                                
                                
                                style='background: none;
                                
                                    border: 0;                                    
                                    color: black;
                                    font: 700 2rem Archivo;
                                    cursor: pointer;
                                    text-decoration:none'
                                
                                
                                > Inicio </a>";
                                for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
                                    if($pag_ant >= 1){
                                        echo"<a href='busca-ficha.php?pagina=$pag_ant'
                                        
                                        style='background: none;
                                        margin: 2rem;
                                        border: 0;                                    
                                        color: black;
                                        font: 700 2rem Archivo;
                                        cursor: pointer;
                                        text-decoration:none'

                                        
                                        > $pag_ant </a>";
                                    }
                                   
                                }
                                echo"$pagina";
                                for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){
                                    if($pag_dep <= $quantidade_pg){
                                        echo"<a href='busca-ficha.php?pagina=$pag_dep'
                                        
                                        style='background: none;
                                        margin: 2rem;
                                        border: 0;                                    
                                        color: black;
                                        font: 700 2rem Archivo;
                                        cursor: pointer;
                                        text-decoration:none'
                                        
                                        
                                        
                                        > $pag_dep </a>";
                                    }
                                    

                                }
                                echo"<a href='busca-ficha.php?pagina=$quantidade_pg'
                                
                                style='background: none;
                                    margin: 2rem;
                                    border: 0;                                    
                                    color: black;
                                    font: 700 2rem Archivo;
                                    cursor: pointer;
                                    text-decoration:none'
                                
                                
                                   
                                > Ultima </a>";
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="js/personalizado.js"></script>		
</body>
</html>
