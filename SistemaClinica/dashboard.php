<?php require_once'validador_acesso.php'; ?>

<!DOCTYPE html>
<html lang="pt_br"><!-- Lang é um atributo -->
<head>
    <meta charset="UTF-8"><!-- meta defire tambem propriedade das  paginas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#8257E5">
    
    <title> NewLife | Tela inicial <?php echo $nome; ?></title> <!-- title muda o titulo da 
    pagina-->

   <!-- <link rel="shoutcut icon" href="/images/favicon.png" type="image/png">-->
   <?php
    echo "<link rel='icon' href='imagem/a.svg'/>";
   ?>
    <link rel="icon" href="css/a.svg"/>
    
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/partials/page-landing.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">

    


    <style>
/*-----------------------------------------------Estilo CSS------------------------------------------------------------ */
     .buttons-container a.ficha {
        background: #00ccf2;
        margin-right: 0;
    }
    .buttons-container a.ficha {
    margin-left: 1rem;
    position: absolute;
    /* left: 5%; */
    bottom: 20px;
    /* width: 90%; */
    width: 100rem;
    height: 10.4rem;
    border-radius: 0.8rem;
    /* margin-right: 1.6rem; */
    font: 700 2.4rem Archivo;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: background 0.2s;
    color: white;
}
.buttons-container a.ficha:hover {
    background: #151c48;
    color:#00ccf2;
}

.buttons-container a.cadastro:hover {
    
    color:black;
}
/*---------------------------------------------------------------------------------------------------------------- */

/*---------------------------------------------------------------------------------------------------------------- */
element.style {
    width: 53rem;
}

.buttons-container a.pesquisar {
    margin-top: 1rem;
    margin-left: 1rem;
    height: 10.4rem;
    border-radius: 0.8rem;
    margin-right: 1.6rem;
    font: 700 2.4rem Archivo;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: background 0.2s;
    color: white;
   
    position: absolute;
    margin: 13rem 7rem;
}

.buttons-container a.pesquisar {
        background: #04d361;
        margin-right: 0;
    }

.buttons-container a.pesquisar:hover {
    background: #151c48;
    color:#04d361;
}
/*---------------------------------------------------------------------------------------------------------------- */
element.style {
    width: 53rem;
}

.logo-container a.cadastro {
    
    height: 10.4rem;
    border-radius: 0.8rem;
    margin-right: 1.6rem;
    font: 700 2.4rem Archivo;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: background 0.2s;
    color: white;
    margin: 12rem 1rem 2rem;
}

.logo-container a.cadastro {
        background:  #b1e4f9;
        margin-right: 0;
        width:30rem;
        height:33rem;
    }

.logo-container a.cadastro:hover {
    background: #151c48;
    color: #ef8d1f;
}






/*---------------------------------------------------------------------------------------------------------------- */
element.style {
    position: absolute;
    width: 40rem;
    margin-top: 12rem;
    margin-left: 56.6rem;
}
.buttons-containers a.lista-ficha {
    background: white;
}
.buttons-container a.lista-ficha {
    margin-top: 1rem;
    margin-left: 1rem;
    height: 10.4rem;
    border-radius: 0.8rem;
    margin-right: 1.6rem;
    font: 700 2.4rem Archivo;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: background 0.2s;
    color: white;
}
.buttons-container a.lista-ficha {
        background:  #ffda44;
        margin-right: 0;
    }

.buttons-container a.lista-ficha:hover {
    background: #2488ff;
    color: #ffda44;
}
.buttons-container a.ficha {
    margin-left: 1rem;
    position: absolute;
    /* left: 5%; */
    bottom: 20px;
    /* width: 90%; */
    width: 90rem;
    height: 10.4rem;
    border-radius: 0.8rem;
    /* margin-right: 1.6rem; */
    font: 700 2.4rem Archivo;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: background 0.2s;
    color: white;
}
.buttons-container a.cadastro {
    margin-left: 1rem;
    position: absolute;
    /* left: 5%; */
    bottom: 20px;
    /* width: 90%; */
    width: 90rem;
    height: 10.4rem;
    border-radius: 0.8rem;
    /* margin-right: 1.6rem; */
    font: 700 2.4rem Archivo;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: background 0.2s;
    color: white;
}

.buttons-container a.cadastro {
    background: #b1e4f9;
    margin-right: 0;
    width:10rem;
}

    </style>
    
</head>
    <body id="page-landing"> <!--id e class e um atributo global | nome dentro do id nao pode se repetir-->
        <?php if($adm): ?>

    
            <div id="page-landing">
            <aside>
                <div class="logo-container">
                <!-- <img src="\imagem\logo.png" alt="inicial tela">--> 
               
                <a  class="cadastro"href="agenda/agenda.php">
                    <?php
                        echo "<img src='imagem/calendario.svg' alt='Agendamento' > ";
                        
                    ?>
                </a>
             <p>
                           
                           
                           Para agendamentos, pesquisa e cadastros clique no calendario!
                           
                            
                </p>                                   
                </div><img src='imagem/atencao.svg' alt='Aviso importante'style="    
                    margin-left: 21.6rem;
                    position: absolute;
                    margin-top: 48rem;" 
                    width='35px'>
            </aside>
                <a  class="sair"href="acoes/logout.php" style="width: 10rem; position: absolute;">
                        <?php
                            echo "<img src='imagem/saida.svg' alt='sair' style=' width: 8rem; margin-left:2rem;margin-top:1rem;'>";
                        ?>                     
                    </a>
            
            <!--<h1>Proffy</h1> <h1> e titulo do texto da pagina -->  
            <!--<p> </p>  <p> paragrafo -->
            <!--<img src="" alt="Logo"> --> <!--img e uma tag ultilizada para imagem | atributo "src" (source) e a origem da imagem | "alt" e uma alternativa caso a fonte da imagem seja alterada --> 
            <!--<button>Estudar</button> --button são botões
            <button>Dar Aula</button>-->
            <div class="buttons-container">
                <a class="pesquisar" href="pesquisar.php" style="width: 90rem;">
                    <img src="" alt=""> Pesquisar de Agendamento </a>
                


                <a class="pesquisar" href="busca.php" style="width: 90rem; margin: 1rem 7rem;
                
                ">
                    <img src="" alt=""> Lista de Agendamento </a>

                    <a class="ficha" href="pesquisar_ficha.php" style="margin: 12rem 7rem 24rem;">
                    <img src="" alt=""> Pesquisar de fichas de pacientes </a>



                <a class="ficha" href="busca-ficha.php" style="
                    
                    
                    
                    margin: 12rem 7rem 12rem;">
                    <img src="" alt=""> Lista de fichas de pacientes </a>
                    

                    <h2 style="
                        position: absolute;
                        margin:25rem 0rem 0rem 36rem;
                        font-size: 50px;
                        color: #dd636e;
                    ">Pagina Inical </h2>
                <a  class="ficha" href="ficha.php" style="margin: 12rem 7rem 0rem; "> 
                    <img src="" alt=""> Cadastro de Ficha </a>
               <!--  <a class="cadastro" href="cadastro.php" style="margin: 0rem 7rem;"> 
                    <img src="" alt=""> Cadastro de Pacientes </a>href fala pra onde vai enviar
                    <a class="cadastro" href="cadastro.php" style="margin: 0rem 0rem 33.1rem 88rem;"> 
                        
                            <img src='imagem/calendario-do-google.svg' alt='sair' style=' width: 8rem; margin-left: 2rem;'>
                                            
                    </a>-->

            
            </div>
        
            
        </div>
    
<?php endif; ?>
            
            

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
