<?php 

session_start();
include_once('conexao.php');
$id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM agendamento WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn,$result_usuario);
$row_usuario =  mysqli_fetch_assoc($resultado_usuario);


?>
<?php require_once'validador_acesso.php'; ?>
<!DOCTYPE html>
<html lang="pt_br">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#8257E5">
        <title> Pagina de Edição</title>
        <link rel="icon" href="imagem/editar.svg"/>
        <link rel="shoutcut icon" href="images/favicon.png" type="image/png">
        
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/partials/cadastro.css">
        <link rel="stylesheet" href="css/partials/header.css">
        <link rel="stylesheet" href="css/partials/forms.css">
        
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
       <!-- <script src="/scripts/addField.js" defer></script>-->
    </head>
    <body id="cadastro">
        <div id="container">
            <header class="page-header">

                <div class="top-bar-container">
                    <a href="dashboard.php">
                        <?php
                            echo "<img src='imagem/voltar.svg' alt='voltar'>";
                        ?>                     
                    </a>
               <!-- <img src="/imagem/cliente.png" alt="Cliente">Colocar uma uma imagem-->
                </div>
                <div id="imagem">
                        <?php
                            echo "<img src='imagem/editar2.svg' alt='editar'> ";
                        ?>  
                </div>
                <div class="header-content">
                    <strong>Editar Cadastro </strong><!--strong vem com a fonte em negrito-->  
                    <p>Edite os dado do paciente que esteja errado</p>
                    <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                    
            </header>
                <main>
                    <form class="form" action="edita_agendamento.php" method="POST"id="create-class" >
                    
                        <fieldset>
                            <legend> Cadastro do Cliente </legend><!--todo fieldset precisa de um ledend e o legend e uma agrupamento de dados-->
                        
                            <input type="hidden" name="id"value="<?php 
                            echo $row_usuario['id'];
                            
                            ?>" required>                                   
                        <div class="input-block">
                            <label for="nome"> Nome</label>                       
                            <input name="nome" id="nome" value="<?php 
                            echo $row_usuario['nome'];                           
                            ?>" required>           
                        </div>
                        <div class="input-block">
                            <label for="telefone"> Telefone <small>(somente números)</small></label>
                            <input name="telefone" id="telefone" type="number" value="<?php 
                            echo $row_usuario['telefone'];
                            
                            ?>" required>
                        </div>
                        <div class="input-block">
                            <label for="nascimento"> Data de Nascimento</label>
                            <input type="date" name="nascimento" 
                            value="<?php 
                            echo $row_usuario['nascimento'];
                            
                            ?>"                            
                            required>
                        </div>
                        <div class="input-block">
                            <label for="dataHoje"> Data de Hoje</label>
                            <input type="date" name="dataHoje"value="<?php 
                            echo $row_usuario['dataHoje'];
                            
                            ?>" required >
                        </div>
                        </fieldset>     
                    <fieldset>
                        <legend>Outros Dados Cadastrais</legend>
                       <div class="select-block">   
    
                        <div class="input-block">
                            <label for="email"> Email </label>
                            <input type="email" id="email" name="email" value="<?php 
                            echo $row_usuario['email'];
                            
                            ?>"required>
                        </div>
    
                        <div class="input-block">
                            <label for="profissao"> Profissão </label>
                            <input name="profissao" id="profissao"value="<?php 
                            echo $row_usuario['profissao'];
                            
                            ?>" required>
                        </div>  
                        <div class="input-block">
                            <label for="cidade"> Cidade </label>
                            <input name="cidade" id="cidade"value="<?php 
                            echo $row_usuario['cidade'];
                            
                            ?>" required>
                        </div>
    
                        <div class="select-block">          
                        <div class="input-block">
                            <label for="uf"> Estado </label>
                            <input name="uf" id="uf"value="<?php 
                            echo $row_usuario['uf'];
                            
                            ?>" required>
                        </div>
                        </div>
    
                        <div class="input-block">
                            <label for="address"> Endereço</label> <!--Address e endereço em ingles-->
                            <input name="endereco" id="address" value="<?php 
                            echo $row_usuario['endereco'];
                            
                            ?>"required>
                        </div>
                </fieldset> 
                <fieldset id="schedule-items">
                    <legend>Agendar Horários
                    
                    </legend>
                    <div class="schedule-item">
                        <div class="select-block">
                            <label for="weekday">Marcar Agendamento</label>
                            <div class="input-block">                              
                                <input type="date" name="dataAgendamento" value="<?php 
                            echo $row_usuario['dataAgendamento'];
                            
                            ?>"required>
                            </div>
                        </div>
                        <div class="input-block">
                            <label for="time_from"> Hora Das</label>
                            <input type="time" name="das"value="<?php 
                            echo $row_usuario['das'];
                            
                            ?>" required>
                        </div>    
                     <!--   <div class="input-block">
                            <label for="time_to"> Até</label>
                            <input type="time" name="ate" value="<?php 
                            //echo $row_usuario['ate'];
                            
                            ?>"required>
                        </div>-->
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
                       <button type="submit" form="create-class" value="Editar">Salvar Edição</button><!-- form="create-class" envia o formulario sem precisar estar dento da tag form-->
                   </footer>
                </main>
        </div>

    </body>
</html>