
<?php
    session_start();
    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("conexao.php");

        $adm  = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = '/index.php'</script>";
    }
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <title> New Life | Calendario </title>
    <link rel='icon' href='/clinicaTestLogin/imagem/calendario-do-google.svg'/>  
    <link href='css/main.min.css' rel='stylesheet' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src='js/main.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='js/locales-all.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src='js/personalizado.js'></script>
    <link rel="stylesheet" href="css/personalizado.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <style>
        .visevent {
            display: block;
        }

        .formedit {
            display: none;
        }
        .alert-success {
    position: absolute;
    margin-left: 17.4rem;
    margin-bottom: 2rem;
    
        }
        body{
            margin: 0;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
    box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);
    border-top: 4px solid #fac863;
    background-color: #ab2727;
}
a {
    color: white;
    text-decoration: none;
    background-color: transparent;
    
  }
  .buttons-container a.cadastro {
    margin-left: 1rem;
    position: absolute;
    /* left: 5%; */
    /*bottom: 20px;*/
    /* width: 90%; */
    width: 90rem;
    height: 5rem;
    border-radius: 0rem 0rem 1rem 1rem;
    /* margin-right: 1.6rem; */
    font: 700 1rem Archivo;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: background 0.2s;
    color: white;
    margin: 28rem 50rem;
}

.buttons-container a.cadastro {
    background: #2c3e50;
    margin-right: 0;
    width:12rem;
}

.buttons-container a.cadastro:hover {
    background: #1a252f;
    color: #ab2727;;
}

.page-header .top-bar-container img {
    position: absolute;
    margin-left: 2rem;
    margin-top: 2rem;
    height: 2rem;
}

        
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
     <header class="page-header">
                <div class="top-bar-container">
                    <a href="/clinicaTestLogin/dashboard.php">
                        <?php
                            echo "<img src='/clinicaTestLogin/imagem/voltar.svg' alt='voltar'>";
                        ?>                     
                    </a>
               <!-- <img src="/imagem/cliente.png" alt="Cliente">Colocar uma uma imagem-->
                </div>
     </header>           
    <div class="buttons-container">
    <a class="cadastro" href="/clinicaTestLogin/cadastro.php" style="margin: 0rem 50rem;"> 
        <img src="" alt=""> Cadastrar de Pacientes </a>
    </div>
    <div class="linha"></div>
    <div id='calendar'></div>
    <div class="modal fade" id="vizualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Consulta Marcada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="visevent">
                        <dl class="row">
                            <dt class="col-sm-3">Código do Paciente</dt>
                            <dd class="col-sm-9" id="id"></dd>

                            <dt class="col-sm-3">Nome do Paciente</dt>
                            <dd class="col-sm-9" id="title"></dd>

                            <dt class="col-sm-3">Inicio da Consulta</dt>
                            <dd class="col-sm-9" id="start"></dd>

                            <!-- <dt class="col-sm-3">Código do Paciente</dt>
                        <dd class="col-sm-9" id="end"></dd>-->
                        </dl>
                        <button class="btn btn-warning btn-canc-vis">Editar</button>
                        <a href="" id="apagar_evento" class="btn btn-danger">Apagar</a>
                    </div>
                    <div class="formedit">
                        <span id="msg-edit"></span>
                        <form id="editevent" method="POST" enctype="multipart/form-data">
                            
                            <input type="hidden" name="id" id="id">
                        
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nome do Paciente</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Digite o nome do paciente" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Color</label>
                                <div class="col-sm-10">
                                    <select name="color" class="form-control" id="color">
                                        <option value="">Selecione</option>
                                        <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                        <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                        <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                        <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                        <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                        <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                        <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                        <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                        <option style="color:#228B22;" value="#228B22">Verde</option>
                                        <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Início da consulta </label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-primary btn-canc-edit">Cancelar</button>
                                        <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-warning">Salvar</button>                                    
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--------------------------Cadastro-------------------------------------->


    <div id='calendar'></div>
    <div class="modal fade" id="cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Marcar Consulta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <span id="msg-cad"></span>
                    <form id="addEvent" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nome do Paciente</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Digite o nome do paciente" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Color</label>
                            <div class="col-sm-10">
                                <select name="color" class="form-control" id="color">
                                    <option value="">Selecione</option>
                                    <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                    <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                    <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                    <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                    <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                    <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                    <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                    <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                    <option style="color:#228B22;" value="#228B22">Verde</option>
                                    <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Início da consulta </label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)" required>
                            </div>
                        </div>
                        <button type="submit" nome="cadEvent" id="cadEvent" class="btn btn-success" value="cadEvent">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>