<?php
include_once 'config.php';

function getHead(){
global $NOM_SISTEMA;
global $NOM_PROJETO;
global $NOM_PAGINA;

$DESC_SISTEMA = 'Catálogo de Dados';
$PALAVRAS_CHV = 'Catálogo, Dados, Monitoramento, Tabelas, Dimensões, Documentação, Comentários';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content='pt-BR' />
    <meta name="country" content="Brazil" />
    <meta name="geo.country" content="BR" />
    <meta content="4mti" name="author" />
    <meta name="robots" content="index, follow, noarchive" />
    <meta name="googlebot" content="noarchive" />
    <meta name="application-name" content="<? echo $NOM_SISTEMA; ?>"  />
    <link rel="shortcut icon" type="image/x-icon" href="img/logo_pq.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="img/logo_pq.png" />
    <link rel="apple-touch-icon" type="image/x-icon" href="img/logo_pq.png" />

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />

    <title><? echo $NOM_SISTEMA . ( isset($NOM_PAGINA) ? ' - ' . $NOM_PAGINA : '' ); ?></title>
    <meta name="description" content="<? echo $DESC_SISTEMA . ' do projeto ' . $NOM_PROJETO; ?>">
    <meta name="keywords" content="<? echo $PALAVRAS_CHV; ?>" />

    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<? echo $NOM_SISTEMA; ?>" />
    <meta property="og:title" content="<? echo $NOM_SISTEMA; ?>" />
    <meta property="og:description" content="<? echo $DESC_SISTEMA; ?>" />

    <link rel="stylesheet" type="text/css" media="screen" href="js/jquery-ui-1.12.1.custom/jquery-ui.min.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/genesis.css"/>

    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/brain.js"></script>
</head>
<?php
}

function getInicio(){
    global $NOM_SISTEMA;
    global $NOM_PROJETO;
    getHead();
?>
<body>
    <header>
        <i class="fa fa-database" aria-hidden="true"></i><span><?php echo $NOM_SISTEMA . ' - ' . $NOM_PROJETO; ?></span>
        <?php if( isset($_SESSION['catalogo']['nom_usuario']) ){ ?>
        <div class="usu">
            <span><?php echo $_SESSION['catalogo']['nom_usuario']; ?></span>
            <a class="sair" href="logar.php?acao=sair" title="Deslogar do sistema">Sair</a>
        </div>
        <?php } ?>
    </header>
    <div id="modal_script"></div>
    <div id="modal_filtro"></div>
    <div class="conteudo">
<?php
}

function getFim(){
?>
    </div>
</body>
</html>
<?php
}