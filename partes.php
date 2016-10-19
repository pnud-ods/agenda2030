<?php
$OPCOES_MENU = array(
    array('label' => 'A Agenda 2030', 'link' => 'aagenda2030.php', 'title' => 'A Agenda 2030', 'side' => 'left'),
    array('label' => 'Indicadores', 'link' => 'consulta.php', 'title' => 'Consultar Indicador', 'side' => 'left'),
    array('label' => 'Biblioteca', 'link' => 'biblioteca.php', 'title' => 'Biblioteca de publicações', 'side' => 'left'),
    //array('label' => 'Quem Somos', 'link' => 'quem_somos.php', 'title' => '', 'side' => ''),
    array('label' => 'Perguntas Frequentes', 'link' => 'faq.php', 'title' => 'Perguntas frequentes', 'side' => 'right'),
    array('label' => 'Eventos', 'link' => 'eventos.php', 'title' => 'Calendário de eventos', 'side' => 'right'),
    array('label' => 'Contato', 'link' => 'contato.php', 'title' => 'Entre em contato', 'side' => 'right')
);

function getHeader($ehAbertura = false, $mostraODSs = true){
    global $OPCOES_MENU;
    global $NOME_PAGINA;
    $home = '.';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content='pt-BR' />
    <meta name="country" content="Brazil" />
    <meta name="geo.country" content="BR" />
    <title>Agenda 2030<?php if( isset($NOME_PAGINA) ) echo " - $NOME_PAGINA"; ?></title>
    <meta name="robots" content="index, follow, noarchive" />
    <meta name="googlebot" content="noarchive" />
    <meta name="description" content="Plataforma online da Agenda 2030 para o Desenvolvimento Sustentável">
    <meta name="keywords" content="ODS, Objetivos, Desenvolvimento, Sustetável, Agenda 2030, ODM, Metas, Indicadores, ONU, PNUD" />

    <meta name="application-name" content="Agenda 2030" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png" />
    <link rel="apple-touch-icon" type="image/x-icon" href="images/favicon.png" />

    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap337.css"/>

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/ods_colors.css"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Product+Sans:400|Roboto:300,400,700,900&amp;lang=en"
        rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <script type="text/javascript">
        function focaODS(){
            var pos = $('.ods-container').position().top;
            $('html, body').stop().animate({scrollTop:pos}, '1000', 'swing');
        }
    </script>
    <script type="text/javascript">
        window._urq = window._urq || [];
        _urq.push(['initSite', '72bd5dd6-2cac-4bf9-9c6f-33efed7a755f']);
        (function() {
            var ur = document.createElement('script'); ur.type = 'text/javascript'; ur.async = true;
            ur.src = ('https:' == document.location.protocol ? 'https://cdn.userreport.com/userreport.js' : 'http://cdn.userreport.com/userreport.js');
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ur, s);
        })();
    </script>
</head>
<body>
    <div class="top-menu-background top-menu-height">
        <div class="col-xs-12">
            <div class="navbar-header">
                <button aria-controls="bs-navbar" aria-expanded="true" class="navbar-toggle" data-target="#bsnavbar"
                        data-toggle="collapse" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
                <a target="_blank" href="http://www.undp.org/content/brazil/pt/home.html" title="Ir para o site do PNUD">
                    <img src="images/pnud_logo_white_bg.png" style="z-index:100;position:absolute;left:45px;">
                </a>
            </div>

            <div>
                <ul class="nav navbar-nav">
                    <?php
                        foreach($OPCOES_MENU as $opcao){
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
                        foreach($OPCOES_MENU as $opcao){
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
    <div class="header font-white">
        <div class="col-xs-12">
            <!-- logo ods -->
            <div class="col-xs-12 text-center">
                <a title="Página de abertura" href="<?php echo $home; ?>">
                    <img src="images/ods_logo.png" style="margin-top:-30px;">
                </a>
            </div>

            <!-- title -->
            <div class="col-xs-10 col-xs-offset-1 text-center">
                <h2 class="titulo">Plataforma Agenda 2030</h2>
                <?php if($ehAbertura){ ?>
                <p class="subtitle-font">A Agenda 2030 é um plano de ação global para em 2030 alcançarmos o desenvolvimento sustentável. A Plataforma provê acesso à dados, canais de participação e informações gerais para o acompanhamento das ações orientadas ao cumprimento dessa Agenda.</p>
                <?php } ?>
            </div>

            <?php if($ehAbertura){ ?>
            <div class="destaque">
                <div class="col-xs-4 text-center">
                    <a href="aagenda2030.php">
                        <img class="img-circle" src="images/info_icon_header.png" alt="" width="110" height="110">
                        <h2 class="header-icons">Conheça a Agenda 2030 e os ODS</h2>
                    </a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="consulta.php">
                        <img class="img-circle" src="images/data_icon_header.png" alt="" width="110" height="110">
                        <h2 class="header-icons">Acesse as metas e os indicadores globais da Agenda 2030</h2>
                    </a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="contato.php">
                        <img class="img-circle" src="images/interaction_icon_header.png" alt="" width="110" height="110">
                        <h2 class="header-icons">Contribua para a Agenda 2030</h2>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php if($ehAbertura and $mostraODSs){ ?>
        <div class="saber_mais">Para saber mais, selecione um ODS abaixo:</div>
    <?php
        }
        if($mostraODSs){
    ?>
    <!-- ./header -->
    <!-- ods container -->
    <div class="ods-container">
        <?php
            for($i = 1; $i <= 18; $i++){
                echo '<div class="ods-logo-container">';
                $numero = str_pad($i, 2, '0', STR_PAD_LEFT);
                if( $i < 18 ){
                    $alt   = "ODS $i";
                    $link  = "meta.php?ods=$i";
                    $title = "Detalhar ODS $i";
                }
                else{
                    $alt   = 'Logo';
                    $link  = "consulta.php";
                    $title = "Consultar indicadores";
                }
                echo "<a title=\"$title\" href=\"$link\"><img src=\"images/ods_icons/$numero.png\" alt=\"$alt\"></a>";
                echo '</div>' . "\n";
                if( $i == 9 ){
                    echo '<br/>';
                }
            }
        ?>
        <div class="clear"></div>
    </div>
<?php
    }
}

function getFooter(){
    global $OPCOES_MENU;
?>
    <div class="footer">
        <div style="float:left;">
            <div class="label_footer">Plataforma Agenda 2030</div>
            <ul class="list-unstyled" style="color:#a0abb5;font-size:10pt">
            <?php
                foreach($OPCOES_MENU as $opcao){
                    echo "<li><a title=\"{$opcao['title']}\" href=\"{$opcao['link']}\">{$opcao['label']}</a></li>";
                }
            ?>
            </ul>
        </div>
        <div class="logos">
            <div class="label_footer">Realização</div>
            <a href="http://www.undp.org/content/brazil/pt/home.html" target="_blank" title="Ir para o site do PNUD"><img src="images/pnud_logo_white_tg.png"/></a>
            <a href="http://www.ipea.gov.br/" target="_blank" title="Ir para o site do IPEA"><img src="images/ipea_logo_no_bg.png"></a>
            <div class="label_footer">Parceiros Institucionais</div>
            <div class="logosFooter">
            <a href="http://www.petrobras.com.br/" target="_blank" title="Ir para site da Petrobras"><img src="images/logo_patrocinadores/petrobras.jpg" style="width:150px;"  alt="Petrobras"></a>
            <a href="http://www.bnb.gov.br/" target="_blank" title="Ir para site do Banco do Nordeste"><img src="./images/logo_patrocinadores/banco_do_nordeste.jpg" style="width:110px;" alt="BNB"></a>
                <a href="http://www.sebrae.com.br/" target="_blank" title="Ir para site do Sebrae"><img src="./images/logo_patrocinadores/sebrae.jpg" style="width:85px;" alt="Sebrae"></a>
                <a href="http://www.furnas.com.br/" target="_blank" title="Ir para site de Furnas"><img src="./images/logo_patrocinadores/furnas.jpg" style="width: 64px;" alt="Furnas"></a>
            </div>

            <div class="label_footer">Apoio Institucional</div>
            <a href="http://www.bb.com.br/" target="_blank" title="Ir para o sitem do Banco do Brasil"><img src="./images/logo_apoiadores/banco_do_brasil.jpg" style="width:200px;" alt="BB"/></a>
            <a href="http://www.caixa.gov.br/" target="_blank" title="Ir para o sitem da Caixa"><img src="./images/logo_apoiadores/caixa.jpg" style="width:120px;" alt="Caixa"/></a>
            <a href="http://www.brasil.gov.br/" target="_blank" title="Ir para o sitem do Governo Federal"><img src="./images/logo_apoiadores/governo_federal.png" style="width:120px;" alt="Governo Federal"/></a>
        </div>
        <div class="clear"></div>
    </div>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-85959864-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>
<?php
}