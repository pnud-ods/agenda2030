<?php
include_once 'partes.php';
getHeader();
?>
<script type="text/javascript">
    function ver(){
        var campo = $("#contato input[name='nome']");
        if( campo.val().length == 0 ){
            alert('Antes informe seu nome.');
                campo.focus();
            return false;
        }
        campo = $("#contato input[name='email']");
        if( campo.val().length == 0 ){
            alert('Antes informe seu e-mail.');
            campo.focus();
            return false;
        }
        campo = $("#contato textarea[name='msg']");
        if( campo.val().length == 0 ){
            alert('Antes informe a mensagem.');
            campo.focus();
            return false;
        }
        return true;
    }

    function enviar(){
        var form = $('#contato');
        $.ajax({
            url: 'set_contato.php',
            data: form.serialize(),
            dataType: 'json'
        }).done(function(retorno){
            if(retorno.status == 'ok'){
                form.html('Sua mensagem foi enviada com sucesso!<br/>Agradecemos o contato.');
            }
            else{
                form.append('Falha no envio da mensagem, tente novamente depois.');
            }
        });
    }
</script>
<div class="row" style="background-color:#eeeeee">
    <div class="col-xs-12">
        <!-- contato container -->
        <div style="padding-bottom:30px;">
            <div class="row" style="padding:40px;">
                <div class="col-xs-8 parceiros_text" >
                    <h1 style="color:#205a8c;">Participação</h1>
                    <p style="padding-top:20px;">
                        Um dos principais aprendizados do processo de municipalização dos Objetivos de Desenvolvimento do Milênio, os ODM foi a importância de participação social na disseminação e implementação dessa agenda internacional. Esse fator foi tão importante que uma das principais diretrizes adotadas na Conferência Rio+20 definiu que a Agenda 2030 seria construída “de baixo para cima” e em consulta com sociedade civil sobre as suas prioridades.
                    </p>
                    <p>
                        Como resultado desse processo no Brasil se formou uma ampla rede de organizações de sociedade civil incluindo 5 grandes redes nacionais a saber:
                    </p>
                    <p class="text-center parceiros_text_container"></p>
                    <div class="thumbnail" style="padding:20px;">
                        <a href="http://www.odsnospodemos.org/" target="_blank">
                            <img src="images/logo_parceiros/movimento_ods.jpg" style="height:100px;">
                        </a>
                    </div>

                    <p>
                        Movimento Nacional ODS Nós Podemos – movimento nacional que promove conscientização dos setores público, privado e da sociedade civil sobre Agenda 2030 e Objetivos de Desenvolvimento Sustentável. Movimento foi criado em 2004 para promover os Objetivos de Desenvolvimento do Milênio e após a adoção da Agenda 2030 mudou o foco para ODS
                    </p>
                    <p>
                        <a href="http://www.odsnospodemos.org/">http://www.odsnospodemos.org/</a>
                    </p>
                    <p class="text-center parceiros_text_container"></p>
                    <div class="thumbnail" style="padding:20px;">
                        <a href="https://brasilnaagenda2030.org/" target="_blank">
                            <img src="images/logo_parceiros/obrasil.png" style="height:100px;">
                        </a>
                    </div>

                    <p>
                        Grupo de Trabalho - Agenda 2030. O Grupo de Trabalho da Sociedade Civil para a Agenda 2030 de Desenvolvimento Sustentável no Brasil foi articulado pela Abong em preparação para Conferência Rio+20 e posterior negociação sobre Objetivos de Desenvolvimento Sustentável (ODS) entendendo que esse processo deve levar em conta o acúmulo das Organizações da Sociedade Civil que vêm trabalhando diretamente na defesa de direitos, no combate à desigualdade e no respeito aos limites do planeta. Atualmente o GT - Agenda 2030 está trabalhando com o tema de participação social no monitoramento de implementação da Agenda 2030 no âmbito nacional.
                    </p>
                    <p>
                        <a href="https://brasilnaagenda2030.org/">https://brasilnaagenda2030.org/</a>
                    </p>
                    <p class="text-center parceiros_text_container"></p>
                    <div class="thumbnail" style="padding:20px;">
                        <a href="http://www.cidadessustentaveis.org.br/" target="_blank">
                            <img src="images/logo_parceiros/cidades_sustentaveis.png" style="height:100px;">
                        </a>
                    </div>

                    <p>
                        Cidades Sustentáveis – O Programa Cidades Sustentáveis promove a proposta de desenvolvimento sustentável entre gestores públicos com foco em sustentabilidade urbana. O Programa oferece como ferramenta a Plataforma Cidades Sustentáveis - uma agenda para a sustentabilidade das cidades que aborda as diferentes áreas da gestão pública, e incorpora de maneira integrada as dimensões social, ambiental, econômica, política e cultural em 12 eixos temáticos alinhados aos ODS. A cada um destes eixos estão associados indicadores, casos exemplares e referências nacionais e internacionais a serem perseguidas pelos municípios.
                    </p>
                    <p>
                        <a href="http://www.cidadessustentaveis.org.br/">http://www.cidadessustentaveis.org.br/</a>
                    </p>
                    <p class="text-center parceiros_text_container"></p>
                    <div class="thumbnail" style="padding:10px;">
                        <a href="https://www.facebook.com/redeods.br/" target="_blank">
                            <img src="images/logo_parceiros/rede_ods.png" style="height:100px;">
                        </a>
                    </div>

                    <p>
                        Rede ODS – Uma rede de de instituições públicas e privadas, organizações da sociedade civil, movimentos sociais, povos originários, povos e comunidades tradicionais  que promove diálogo inter-setorial sobre processo de desenvolvimento pautado em direitos humanos e Objetivos de Desenvolvimento Sustentável.
                    </p>
                    <p>
                        <a href="https://www.facebook.com/redeods.br/">https://www.facebook.com/redeods.br/</a>
                    </p>

                    <p class="text-center parceiros_text_container"></p>
                    <div class="thumbnail" style="padding:20px;">
                        <a href="http://www.estrategiaods.org.br/" target="_blank">
                            <img src="images/logo_parceiros/estrategia_ods.png" style="height:100px;">
                        </a>
                    </div>

                    <p>
                        Estratégia ODS – uma coalizão inter-setorial de entidades interessadas em promover debate sobre meios de implementação dos Objetivos de Desenvolvimento Sustentável e busca pelas soluções de impacto para o seu alcance.
                    </p>
                    <p>
                        <a href="http://www.estrategiaods.org.br/">http://www.estrategiaods.org.br/</a>
                    </p>
                </div>

                <div class="col-xs-4">
                    <div class="panel" style="padding-bottom:30px;">
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-1" style="padding:30px 10px;">
                                <table>
                                    <tr style="vertical-align: middle;">
                                        <td>
                                            <img src="images/ods_logo.png" style="height:40px;">
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <span style="font-size:16pt;font-weight: bold;">Contato</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-1">
                                <form id="contato" action="javascript:enviar();" onsubmit="return ver();">
                                    <div class="form-group">
                                        <label>Seu nome</label>
                                        <input name="nome" type="text" class="form-control contato-form-no-border" placeholder="Escreva seu nome">
                                    </div>
                                    <div class="form-group">
                                        <label>Seu e-mail</label>
                                        <input name="email" type="email" class="form-control  contato-form-no-border" placeholder="Escreva seu email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Sua mensagem:</label>
                                        <textarea name="msg" class="form-control contato-form-no-border" rows="5"></textarea>
                                    </div>
                                    <div class="row" style="margin-top:30px;">
                                        <div class="col-xs-12">
                                            <a title="Enviar mensagem" onclick="$('#contato').submit();" class="blue-customized-button">Enviar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
getFooter();
