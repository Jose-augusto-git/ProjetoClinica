
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
<html lang="pt_br">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#8257E5">
        <title> Ficha do Paciente </title>
        <link rel="icon" href="imagem/cadastro.svg"/>
        <link rel="shoutcut icon" href="images/favicon.png" type="image/png">
        
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/partials/cadastro.css">
        <link rel="stylesheet" href="css/partials/header.css">
        <link rel="stylesheet" href="css/partials/forms.css">
        <style>
            .input-block input,
            .select-block select, 
            .textarea-block textarea {
                width: 100%;
                height: 5.6rem;
                margin-top: 0.8rem;
                border-radius: 0.8rem;
                background: #e8f7fe;
                border: 1px solid var(--color-line-in-white);
                outline: 0;/* tira a bordar preta de dentro da caixa de seleção*/
                padding: 0 1.6rem;
                font: 1.6rem Archivo;
            }

        </style>
        
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
        <script src="addField.js" defer></script>
    </head>
    <body id="cadastro" style='background-color: #15141a; '>
        <div id="container" >
            <header class="page-header" style='background-color: #271e3b;'>
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
                            echo "<img src='imagem/cadastros.svg' alt='cadastro'> ";
                        ?>  
                </div>
                <div class="header-content">
                <strong style='max-width: 1000px;'>FICHA DE ALAVIAÇÃO </strong>
                <!--strong vem com a fonte em negrito-->
                <p style='color:#ff637b; font-size:2.5rem'>Preencha os  campos importantes</p>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                    
            </header>
                <main>
                    <form class="form" action="formulario.php" method="POST"id="create-class" >
                    <fieldset>
                    <legend> Informações do paciente </legend>
                    <div class="input-block">  
                            <div>                            
                                <label for="nome"> Nome</label>                       
                                <input name="nome" id="nome" required>
                                <label for="telefone">Telefone</label>                      
                                <input type="telefone" name="telefone"required>
                                <label for="nascimento"> Data de Nascimento</label>
                                <input type="date" name="nascimento" required>
                            </div>
                        <div class="input-block">
                            <label for="dataHoje"> Data de Hoje</label>
                            <input type="date" name="dataHoje" required >
                        </div>
                                         
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
                            <legend> </legend>
                            <legend>   Outras Informações </legend>

							<label for="QP"> Q.P. </label>
                        	<input name="qp" id="QP" >

                            <label for="QS"> Q.S. </label>                            
                        	<input name="qs" id="QS" >

                                
                            <div class="textarea-block">
                                <label for="hma">H.M.A</label>
                                <textarea name="hma" id="hma"></textarea><!-- pode escrever varios textos em linha-->
                            </div>
                                                          
                            <label for="exames">Exames complementares</label>
                            <input name="exames" id="exames"></input><!-- pode escrever varios textos em linha-->
                            
                            <legend> </legend>
                             <legend>   Cirurgias </legend>

                            <label for="cirurgias"> Cirurgias </label>
                            <input name="cirurgias" id="cirurgias" >

                            <legend> </legend>
                            <legend>   Doenças Associadas </legend>

                            <label for="Menarca"> Menarca </label>
                            <input name="menarca" id="menarca" >

                            <label for="tireoide"> Tireóide </label>                            
                            <input name="tireoide" id="tireoide" >

                            <label for="estomago"> Estômago </label>
                            <input name="estomago" id="estomago" >

                            <label for="pancreas"> Pâncreas</label>
                            <input name="pancreas" id="pancreas" >

                            <label for="coracao"> Coração </label>                            
                            <input name="coracao" id="coracao" >

                            <label for="utero"> Útero </label>
                            <input name="utero" id="utero" >

                            <label for="prostata"> Próstata </label>
                            <input name="prostata" id="prostata" >

                            <label for="menopausa"> Menopausa </label>                            
                            <input name="menopausa" id="menopausa" >

                            <label for="rins">  Rins </label>
                            <input name="rins" id="rins" >

                            <label for="intestino"> Intestino</label>
                            <input name="intestino" id="intestino" >

                            <label for="pulmao"> Pulmão </label>                            
                            <input name="pulmao" id="pulmao" >

                            <label for="sono"> Sono </label>
                            <input name="sono" id="sono" >

                            <label for="figado"> Fígado EV.B. </label>
                            <input name="figado" id="figado" >
                            
                            

                            

                            <legend> </legend>
                             <legend>   Terapia </legend>
                                                        <label for="sintoma"> LEITURA DO SINTOMA / AUSCULTA </label>
                            <input name="sintoma" id="sintoma" >

                            <div class="textarea-block">
                                <label for="osteopatia">Osteopatia</label>
                                <textarea name="osteopatia" id="osteopatia"></textarea><!-- pode escrever varios textos em linha-->
                            </div>

                            <div class="textarea-block">
                                <label for="dhs">DHS</label>
                                <textarea name="dhs" id="dhs"></textarea><!-- pode escrever varios textos em linha-->
                            </div>

                            <div class="textarea-block">
                                <label for="micro">MICROFISIOTERAPIA</label>
                                <textarea name="microfisioterapia" id="micro"></textarea><!-- pode escrever varios textos em linha-->
                            </div>

                            <div class="textarea-block">
                                <label for="home">HOMEOPATIA</label>
                                <textarea name="homeopatia" id="home"></textarea><!-- pode escrever varios textos em linha-->
                            </div>
                            <legend> </legend>
                             <legend>   Avaliação Clinica  </legend>
                                  
                             <div class="textarea-block">
                                <label for="sessao">Sessões</label>
                                <textarea name="sessao" id="sessao" cols="45" rows="10" ></textarea><!-- pode escrever varios textos em linha-->
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