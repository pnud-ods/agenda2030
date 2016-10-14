<?php
include_once 'partes.php';
if( !isset($mostraODSs) ){
    $mostraODSs = true;
}
getHeader(true, $mostraODSs);

//Mostrar informações da página "aagenda2030.php"
if( isset($mais_info) and $mais_info ){
?>
    <div style="background-color:#f6f6f6;">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1"  style="margin-top:30px;">
                <h2 class="text-center">A Agenda 2030 e os Objetivos de Desenvolvimento Sustentável (ODS)</h2>

                <p class="about-agenda-text" style="padding-top:30px;">
                    Durante a Conferência das Nações Unidas sobre Desenvolvimento Sustentável Rio + 20, acordou-se, no documento final da Conferência, que um conjunto de metas seria desenvolvido com vistas à promoção do desenvolvimento sustentável, com base nos avanços dos Objetivos de Desenvolvimento do Milênio (ODM) – cuja data limite para serem alcançados foi o final do ano de 2015. O documento afirma que os Objetivos de Desenvolvimento Sustentável (ODS) deveriam ter embasamento científico para a criação de metas e para a utilização de indicadores que aferem corretamente seu progresso. O texto determinou ainda a criação dos processos que estabeleceram estes objetivos.
                </p>
                <p class="about-agenda-text">
                    Após a Conferência, um amplo e inclusivo sistema de consulta foi empreendido sobre questões de interesse global. Muitas vozes informaram este debate, e valiosas contribuições foram efetuadas a partir de uma ampla gama de partes interessadas. Para citar algumas dessas contribuições, vale a pena lembrar os subsídios de grupos organizados da sociedade civil consolidados no relatório “Um milhão de vozes: o mundo que queremos”, a pesquisa online “Meu mundo”, as contribuições de líderes no âmbito de um Painel de Alto Nível sobre Sustentabilidade Global, recomendações de acadêmicos e cientistas convocados por meio da Rede de Soluções para o Desenvolvimento Sustentável, subsídios do setor privado consubstanciados no relatório do Pacto Global das Nações Unidas, bem como a experiência do Sistema da ONU apresentada em um relatório sobre a agenda de desenvolvimento pós-2015, tal qual por meio do apoio de uma equipe de suporte técnico.s
                </p>
                <p class="about-agenda-text">
                    A partir de destas múltiplas contribuições, chegou-se a uma proposta de objetivos e metas que, em setembro de 2015, na Cúpula das Nações Unidas sobre Desenvolvimento Sustentável, ocorrida durante a 70ª sessão da Assembleia Geral da ONU, foi adotada como parte central da Agenda 2030 para o Desenvolvimento Sustentável (A/RES/70/1) pelos  Estados-membro das Nações Unidas. A Agenda lista os 17 Objetivos de Desenvolvimento Sustentável, amparados sobre o tripé do desenvolvimento sustentável, que considera as dimensões social, ambiental e econômica de forma integrada e indivisível ao longo de todas as suas 169 metas. O horizonte temporal que os países acordaram para o cumprimento destas metas e objetivos é de 15 anos, sendo 2030 o ano final de vigência dos ODS.
                </p>
                <p class="text-center" style="margin:30px 0;">
                    <img src="images/5ps.png">
                </p>
            </div>
        </div>
    </div>
<?php } ?>


        <!-- about agenda -->
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 text-left" style="padding: 40px 0px 20px 120px;">
                        <h2>Entendendo a Agenda 2030</h2>
                    </div>
                </div>

                <div class="row" style="margin-top:30px;">
                    <div class="col-xs-4 text-center about-agenda-icon-background">
                        <span style="margin:auto;">
                            <img src="images/about_agenda/icon_01.png" alt="" width="90" height="90">
                        </span>
                    </div>
                    <div class="col-xs-8 about-agenda-text">
                        <span style="margin:auto;">
                            A Agenda 2030 foi criada para colocar o mundo em um caminho mais sustentável e resiliente. A Agenda é um plano de ação para as pessoas, o planeta e a prosperidade.
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 text-center about-agenda-icon-background">
                        <span style="margin:auto;">
                            <img src="images/about_agenda/icon_02.png" alt="" width="90" height="90">
                        </span>
                    </div>
                    <div class="col-xs-8 about-agenda-text">
                        <span style="margin:auto;">
                            Foi adotada por 193 países-membros das Nações Unidas, inclusive o Brasil, na Cúpula de Desenvolvimento Sustentável, em setembro de 2015. Mas ela foi definida em um amplo processo participativo lançado na Rio+20, em 2012.
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 text-center about-agenda-icon-background">
                        <span style="margin:auto;">
                            <img src="images/about_agenda/icon_03.png" alt="" width="90" height="90">
                        </span>
                    </div>
                    <div class="col-xs-8 about-agenda-text">
                        <span style="margin:auto;">
                            A Agenda consiste em uma Declaração, 17 Objetivos de Desenvolvimento Sustentável (os ODS) e suas 169 metas, bem como uma seção sobre meios de implementação e de parcerias globais, e um roteiro para acompanhamento e revisão. Os ODS e suas metas serão acompanhados por meio de indicadores.
                        </span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 text-center about-agenda-icon-background">
                    <span style="margin:auto;">
                        <img src="images/about_agenda/icon_04.png" alt="" width="90" height="90">
                    </span>
                </div>
                <div class="col-xs-8 about-agenda-text">
                    <span style="margin:auto;">Esses objetivos são integrados e indivisíveis, e mesclam, de forma equilibrada, as três dimensões do desenvolvimento sustentável: a econômica, a social e a ambiental. Eles deverão ser alcançados até o ano 2030, o que dá o nome a Agenda.</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 text-center about-agenda-icon-background" style="padding-bottom: 0px;">
                    <span style="margin:auto;">
                        <img src="images/about_agenda/icon_05.png" alt="" width="90" height="90">
                    </span>
                </div>
                <div class="col-xs-8 about-agenda-text">
                    <span style="margin:auto;">
                        A Plataforma Agenda 2030 vai ajudar a acompanhar o caminho que está sendo feito para alcançarmos esses objetivos, com vistas a melhorar a vida de todo(a)s e se ter um mundo melhor.
                    </span>
                </div>
            </div>

            <div class="row" style="margin:60px 0px;">
                <div class="col-xs-12 text-center">
                    <span class="blue-customized-button">
                        <a title="A Agenda 2030" href="aagenda2030.php">Entenda melhor a Agenda 2030</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- ./about agenda -->

    <!-- about ods -->
    <div style="background-color: #f8f8f8;padding-bottom: 50px;">
        <div class="row" style="padding:40px;">
            <div class="col-xs-12 text-center">
                <h2>Os 17 Objetivos, suas Metas e Indicadores</h2>
            </div>
        </div>
        <div class="row" style="background-color: #f8f8f8;">
            <div class="col-xs-5 col-xs-offset-1 text-left about-ods-text">
                <span style="margin:auto;">
                    <p>Com a experiência prévia dos Objetivos de Desenvolvimento do Milênio - ODM (em vigor de 2000 a 2015), aprendeu-se que o estabelecimento de objetivos é um eficiente mecanismo para alcançar melhores resultados de desenvolvimento, e que esses compromissos serão acompanhados pela ação. Objetivos claros geram resultados claros. Cada objetivo possui um conjunto de metas universalmente aplicáveis. Os indicadores são dados quantitativos e/ou qualitativos que, juntos, definirão se uma meta está sendo cumprida.
                    </p>
                    <p>Os ODS são a primeira agenda universal do mundo para o desenvolvimento sustentável, e isso significa que todas as nações – desenvolvidas e em desenvolvimento – serão convidadas a agir em seus próprios países.
                    </p>
                    <p style="padding-top:60px;">
                        <span class="blue-customized-button"><a title="Ir para os ODS" onclick="focaODS();">Comece selecionando um ODS</a></span>
                    </p>
                </span>
            </div>
            <div class="col-xs-6 text-center" style="display:flex;min-height:410px;">
                <span style="margin:auto;">
                    <img src="images/about_ods/infographic.png" alt="">
                </span>
            </div>
        </div>
    </div>
    <!-- ./about od -->
</div>

<?php
getFooter();
