<?php
$opcoes_menu = array(
    array('label' => 'A Agenda 2030', 'link' => 'aagenda2030.php', 'title' => '', 'side' => 'left'),
    array('label' => 'Indicadores', 'link' => 'consulta.php', 'title' => '', 'side' => 'left'),
    array('label' => 'Biblioteca', 'link' => 'publicacoes.php', 'title' => '', 'side' => 'left'),
    //array('label' => 'Quem Somos', 'link' => 'quem_somos.php', 'title' => '', 'side' => ''),
    array('label' => 'Perguntas Frequentes', 'link' => 'faq.php', 'title' => '', 'side' => 'right'),
    array('label' => 'Eventos', 'link' => 'eventos.php', 'title' => '', 'side' => 'right'),
    array('label' => 'Contato', 'link' => 'contato.php', 'title' => '', 'side' => 'right')
);

function getHeader($ehAbertura = false){
    global $opcoes_menu;
    $home = 'site.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agenda 2030</title>

    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/ods_colors.css">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Product+Sans:400|Roboto:300,400,700,900&amp;lang=en"
        rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
    <div class="row top-menu-background top-menu-height">
        <div class="col-xs-12">
            <div class="navbar-header">
                <button aria-controls="bs-navbar" aria-expanded="true" class="navbar-toggle" data-target="#bsnavbar"
                        data-toggle="collapse" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
                <a target="_blank" href="www.undp.org/content/brazil/pt/home.html" title="Ir para o site do PNUD">
                    <img src="images/pnud_logo_white_bg.png" style="position:absolute;left:60px;">
                </a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
                        foreach($opcoes_menu as $opcao){
                            if( $opcao['side'] != 'left')
                                continue;
                            echo '<li class="menu-list">';
                            echo "<a href=\"{$opcao['link']}\">{$opcao['label']}</a>";
                            echo '</li>' . "\n";
                        }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        foreach($opcoes_menu as $opcao){
                            if( $opcao['side'] != 'right')
                                continue;
                            echo '<li class="menu-list">';
                            echo "<a href=\"{$opcao['link']}\">{$opcao['label']}</a>";
                            echo '</li>' . "\n";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- header -->
    <div class="header row header-background font-white">
        <div class="col-xs-12">
            <!-- logo ods -->
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="<?php echo $home; ?>">
                        <img src="images/ods_logo.png" style="margin-top:-30px;">
                    </a>
                </div>
            </div>
            <!-- ./logo ods -->

            <!-- title -->
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 text-center" style="padding:0;">
                    <h2 class="title-font text-white-shadow">Plataforma Agenda 2030</h2>
                    <?php if($ehAbertura){ ?>
                    <p class="subtitle-font" style="padding-top:20px;font-size:16px;">Existe um plano de ação global para em 2030 alcançarmos o desenvolvimento sustentável: A Agenda 2030 e seus Objetivos de Desenvolvimento Sustentável (ODS). A plataforma Agenda 2030 provê acesso à dados, canais de participação e informações gerais para o acompanhamento das ações globais e nacionais orientadas ao cumprimento desse plano de ação, assinado por todos os membros das Nações Unidas. Um 2030 socialmente justo, economicamente inclusivo e ambientalmente sustentável depende de transparência, da sua colaboração e de nossa ação transformadora.<br/>Junte-se à nós!</p>
                    <?php } ?>
                </div>
            </div>
            <!-- ./title -->

            <?php if($ehAbertura){ ?>
            <div class="row destaque">
                <div class="col-xs-4 text-center">
                    <a href="aagenda2030.php">
                        <img class="img-circle" src="images/info_icon_header.png" alt="" width="110" height="110">
                        <h2 class="subtitle-font header-icons">Conheça mais sobre a Agenda 2030 e os ODS</h2>
                    </a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="consulta.php">
                        <img class="img-circle" src="images/data_icon_header.png" alt="" width="110" height="110">
                        <h2 class="subtitle-font header-icons">Acesse as metas e indicadores dos Brasil e Estados</h2>
                    </a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="contato.php">
                        <img class="img-circle" src="images/interaction_icon_header.png" alt="" width="110" height="110">
                        <h2 class="subtitle-font header-icons">Nos conte como seu projeto pode contribuir para a Agenda</h2>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php if($ehAbertura){ ?>
    <div class="row" style="min-height:40px;background-color: #408dcc;">
        <div class="col-xs-12 text-center font-white">
            <h4 style="font-weight:300;line-height:40px;">Para saber mais, selecione um ODS abaixo:</h4>
        </div>
    </div>
    <?php } ?>

    <!-- ./header -->
    <!-- ods container -->
    <div class="ods-container">
        <?php
            for($i = 1; $i <= 18; $i++){
                echo '<div class="ods-logo-container">';
                $numero = str_pad($i, 2, '0', STR_PAD_LEFT);
                if( $i < 18 ){
                    $alt = "ODS $i";
                    $link = "meta.php?ods=$i";
                }
                else{
                    $alt = 'Logo';
                    $link = "consulta.php";
                }
                echo "<a href=\"$link\"><img src=\"images/ods_icons/$numero.png\" alt=\"$alt\"></a>";
                echo '</div>' . "\n";
            }
        ?>
        <div class="clear"></div>
    </div>
<?php
}

function getContent(){
?>
        <!-- geo search row -->
        <div class="row" style="padding-top:30px;padding-bottom: 30px;">
            <div class="col-xs-12 col-xs-6 text-right" style="margin-top:8px;">
						<span class="label label-primary"
                              style="border-radius: 20px;padding:10px 20px;font-family:Arial, sans-serif;font-size:10pt;font-weight: 200;">
                                  Ou pesquise a situação do Brasil ou de algum estado
                        </span>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-4 text-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquisa">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Estado <span class="glyphicon glyphicon-triangle-bottom" style="font-size:8pt;"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <!-- ./geo search row -->
    </div>
<?php
}

function getFooter(){
    global $opcoes_menu;
?>
    <div class="footer row" style="background-color:#204762;min-height:200px;padding:40px 40px 40px 0; ">
        <div class="col-xs-5 col-xs-offset-1">
            <p style="color:#e4f0f7;font-weight:bold;font-size:12pt;">
                Plataforma Agenda 2030
            </p>
            <ul class="list-unstyled" style="color:#a0abb5;font-size:10pt">
            <?php
                foreach($opcoes_menu as $opcao){
                    echo "<li><a title=\"{$opcao['title']}\" href=\"{$opcao['link']}\">{$opcao['label']}</a></li>";
                }
            ?>
            </ul>
        </div>
        <div class="col-xs-6 text-right">
            <div style="display: inline-block;">
                <img src="images/pnud_logo_no_bg.png" style="padding:30px;">
                <img src="images/ipea_logo_no_bg.png" style="padding:30px;">
            </div>
        </div>
    </div>
</body>
</html>
<?php
}