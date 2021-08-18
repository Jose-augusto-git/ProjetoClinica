<?php 

session_start();
include_once('conexao.php');
$id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM ficha WHERE id = '$id'";
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
        <link rel="stylesheet" href="css/personalizar.css">
        <link rel="stylesheet" href="css/partials/cadastro.css">
        <link rel="stylesheet" href="css/partials/header.css">
        <link rel="stylesheet" href="css/partials/forms.css">
        
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
       <!-- <script src="/scripts/addField.js" defer></script>-->
       <style>
        .textarea-block textarea {
            padding: 1.2rem 1.6rem;
            height: 16rem;
            resize: vertical;
            background: #daf5e6;
        }
        .input-block input{
            background: #daf5e6;
        }
        
       </style>
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
                    <form class="form" action="edita_ficha_paciente.php" method="POST"id="create-class" >
                    
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
                        <div class="input-block">
                            <label for="qp"> Q.P.</label> <!--Address e endereço em ingles-->
                            <input name="qp" id="qp" value="<?php 
                            echo $row_usuario['qp'];
                            
                            ?>">
                        </div>
                        <div class="input-block">
                            <label for="qs"> Q.S.</label> <!--Address e endereço em ingles-->
                            <input name="qs" id="qs" value="<?php 
                            echo $row_usuario['qs'];
                            
                            ?>">
                        </div>
                        <div class="textarea-block">
                            <label for="hma"> H.M.A </label> <!--Address e endereço em ingles-->
                            <textarea name="hma" id="hma"><?php 
                            echo $row_usuario['hma'];?></textarea>
                        </div>
                        <div class="input-block">
                            <label for="exames"> Exames complementares </label> <!--Address e endereço em ingles-->
                            <input name="exames" id="exames" value="<?php 
                            echo $row_usuario['exames'];
                            
                            ?>">
                        </div>
                        <legend> </legend>
                        <legend>   Cirurgias </legend>

                        <div class="input-block">
                            <label for="cirurgias"> Cirurgias </label> <!--Address e endereço em ingles-->
                            <input name="cirurgias" id="cirurgias" value="<?php 
                            echo $row_usuario['cirurgias'];
                            
                            ?>">
                        </div>

                        <legend> </legend>
                        <legend>   Doenças Associadas </legend>

                        <div class="input-block">
                            <label for="menarca"> Menarca </label> <!--Address e endereço em ingles-->
                            <input name="menarca" id="menarca" value="<?php 
                            echo $row_usuario['menarca'];
                            
                            ?>">
                        </div>
                        <div class="input-block">
                            <label for="tireoide"> Tireóide </label> <!--Address e endereço em ingles-->
                            <input name="tireoide" id="tireoide" value="<?php 
                            echo $row_usuario['tireoide'];
                            
                            ?>">
                        </div>
                        <div class="input-block">
                            <label for="estomago"> Estômago </label> <!--Address e endereço em ingles-->
                            <input name="estomago" id="estomago" value="<?php 
                            echo $row_usuario['estomago'];
                            
                            ?>">
                        </div>
                        <div class="input-block">
                            <label for="pancreas"> Pâncreas </label> <!--Address e endereço em ingles-->
                            <input name="pancreas" id="pancreas" value="<?php 
                            echo $row_usuario['pancreas'];
                            
                            ?>">
                        </div>
                        <div class="input-block">
                            <label for="coracao"> Coração </label> <!--Address e endereço em ingles-->
                            <input name="coracao" id="coracao" value="<?php 
                            echo $row_usuario['coracao'];
                            
                            ?>">
                        </div>
                        <div class="input-block">
                            <label for="utero"> Útero </label> <!--Address e endereço em ingles-->
                            <input name="utero" id="utero" value="<?php 
                            echo $row_usuario['utero'];
                            
                            ?>">
                        </div>
                        <div class="input-block">
                            <label for="prostata"> Próstata </label> <!--Address e endereço em ingles-->
                            <input name="prostata" id="prostata" value="<?php 
                            echo $row_usuario['prostata'];
                            
                            ?>">
                        </div>
                        <div class="input-block">
                            <label for="menopausa"> Menopausa </label> <!--Address e endereço em ingles-->
                            <input name="menopausa" id="menopausa" value="<?php 
                            echo $row_usuario['menopausa'];
                            
                            ?>">
                        </div>
                        <div class="input-block">
                            <label for="rins"> Rins </label> <!--Address e endereço em ingles-->
                            <input name="rins" id="rins" value="<?php 
                            echo $row_usuario['rins'];
                            
                            ?>">
                        </div>
                        <div class="input-block">
                            <label for="intestino"> Intestino </label> <!--Address e endereço em ingles-->
                            <input name="intestino" id="intestino" value="<?php 
                            echo $row_usuario['intestino'];
                            
                            ?>">
                        </div>
                        <div class="input-block">
                            <label for="pulmao"> Pulmão </label> <!--Address e endereço em ingles-->
                            <input name="pulmao" id="pulmao" value="<?php 
                            echo $row_usuario['pulmao'];
                            
                            ?>">
                        </div>
                        <div class="input-block">
                            <label for="sono"> Sono </label> <!--Address e endereço em ingles-->
                            <input name="sono" id="sono" value="<?php 
                            echo $row_usuario['sono'];?>">
                        </div>
                        <div class="input-block">
                            <label for="figado"> Fígado EV.B. </label> <!--Address e endereço em ingles-->
                            <input name="figado" id="figado" value="<?php 
                            echo $row_usuario['figado'];
                            
                            ?>">
                        </div>

                        <legend> </legend>
                        <legend>   Terapia </legend>

                        <div class="input-block">
                            <label for="sintoma"> LEITURA DO SINTOMA / AUSCULTA </label> <!--Address e endereço em ingles-->
                            <input name="sintoma" id="sintoma" value="<?php 
                            echo $row_usuario['sintoma'];
                            
                            ?>">
                        </div>

                        <div class="textarea-block">
                            <label for="osteopatia"> Osteopatia </label> <!--Address e endereço em ingles-->
                            <textarea name="osteopatia" id="osteopatia" ><?php 
                            echo $row_usuario['osteopatia'];?></textarea>
                        </div>
                        
                        <div class="textarea-block">
                            <label for="dhs"> DHS </label> <!--Address e endereço em ingles-->
                            <textarea name="dhs" id="dhs"><?php 
                            echo $row_usuario['dhs'];?></textarea>
                        </div>
                        
                        <div class="textarea-block">
                            <label for="microfisioterapia"> MICROFISIOTERAPIA </label> <!--Address e endereço em ingles-->
                            <textarea name="microfisioterapia" id="microfisioterapia"><?php 
                            echo $row_usuario['microfisioterapia'];
                            
                            ?></textarea>
                        </div>
                        <div class="textarea-block">
                            <label for="homeopatia"> HOMEOPATIA </label> <!--Address e endereço em ingles-->
                            <textarea style="background: #daf5e6" name="homeopatia" id="homeopatia"><?php 
                            echo $row_usuario['homeopatia'];
                            
                            ?></textarea>
                        </div>
                        <legend> </legend>
                        <legend>   Avaliação Clinica  </legend>
                        <div class="textarea-block">
                            <label for="sessao"> Sessões </label> <!--Address e endereço em ingles-->
                            <textarea name="sessao" id="sessao"><?php 
                            echo $row_usuario['sessao'];
                            
                            ?></textarea>
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
                       <button type="submit" form="create-class" value="Editar">Salvar Edição</button><!-- form="create-class" envia o formulario sem precisar estar dento da tag form-->
                   </footer>
                </main>
        </div>

    </body>
</html>