<?php require_once'validador_acesso.php'; ?>

<!DOCTYPE html>
<html lang="pt_br">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#8257E5">
        <title> Pagina de Cadastro</title>
        <link rel="icon" href="imagem/cadastro.svg"/>
        <link rel="shoutcut icon" href="images/favicon.png" type="image/png">
        
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/partials/cadastro.css">
        <link rel="stylesheet" href="css/partials/header.css">
        <link rel="stylesheet" href="css/partials/forms.css">
        
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
        <script src="addField.js" defer></script>
    </head>
    <body id="cadastro">
        <div id="container">
            <header class="page-header">
                <div class="top-bar-container">
                    <a href="agenda/agenda.php">
                        <?php
                            echo "<img src='imagem/voltar.svg' alt='voltar'>";
                        ?>                     
                    </a>
               <!-- <img src="/imagem/cliente.png" alt="Cliente">Colocar uma uma imagem-->
                </div>
                <div id="imagem">
                        <?php
                            echo "<img src='imagem/cadastros.svg' alt='cadastro'> ";
                        ?>  
                </div>
                <div class="header-content">
                <strong style='max-width: 1000px;'>Formulario de cadastro </strong>
                <!--strong vem com a fonte em negrito-->
                <p style='color:#ff637b; font-size:2.5rem'>Preencha todos os campos</p>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                    
            </header>
                <main>
                    <form class="form" action="agendamento.php" method="POST"id="create-class" >
                    
                        <fieldset>
                            <legend> Cadastro do Cliente </legend><!--todo fieldset precisa de um ledend e o legend e uma agrupamento de dados-->
                        <div class="input-block">
                            <label for="nome"> Nome</label>                       
                            <input name="nome" id="nome" required>           
                        </div>
                        <div class="input-block">
                            <label for="telefone"> Telefone <small>(somente números)</small></label>
                            <input name="telefone" id="telefone" type="number" required>
                        </div>
                        <div class="input-block">
                            <label for="nascimento"> Data de Nascimento</label>
                            <input type="date" name="nascimento" value="nascimento" required>
                        </div>
                        <div class="input-block">
                            <label for="dataHoje"> Data de Hoje</label>
                            <input type="date" name="dataHoje" required >
                        </div>
                        </fieldset>     
                    <fieldset>
                        <legend>Outros Dados Cadastrais</legend>
                       <div class="select-block">   
    
                        <div class="input-block">
                            <label for="email"> Email </label>
                            <input type="email" id="email" name="email" required>
                        </div>
    
                        <div class="input-block">
                            <label for="profissao"> Profissão </label>
                            <input name="profissao" id="profissao" required>
                        </div>  
                        <div class="input-block">
                            <label for="cidade"> Cidade </label>
                            <input name="cidade" id="cidade" required>
                        </div>
    
                        <div class="select-block">          
                        <div class="input-block">
                            <label for="uf"> Estado </label>
                            <input name="uf" id="uf" required>
                        </div>
                        </div>
    
                        <div class="input-block">
                            <label for="address"> Endereço</label> <!--Address e endereço em ingles-->
                            <input name="endereco" id="address" required>
                        </div>
                </fieldset> 
                <fieldset id="schedule-items">
                    <legend>Agendar Horários
                     <!--   <button type="button" id="add-time">+ Novo Horário</button>-->
                    </legend>
                    <div class="schedule-item">
                        <div class="select-block">
                            <label for="weekday">Marcar Agendamento</label>
                            <div class="input-block">                              
                                <input type="date" name="dataAgendamento" required>
                            </div>
                        </div>
                        <div class="input-block">
                            <label for="time_from"> Hora Das</label>
                            <input type="time" name="das" required width="100%">
                        </div>    
                    </div>
                </fieldset>
                   </form>
                   <footer>
                       <p>
                           <?php
                            echo "<img src='imagem/aviso.svg' alt='Aviso importante' width='60px'>";
                           ?>
                           
                           Importante! <br>
                           Preencha todos os dados
                       </p>
                       <button type="submit" form="create-class" value="cadastro">Salvar cadastro</button><!-- form="create-class" envia o formulario sem precisar estar dento da tag form-->
                   </footer>
                </main>
        </div>

    </body>
</html>