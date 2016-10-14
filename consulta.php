<?php
include_once 'partes.php';
getHeader();
?>

    <!-- info data container -->
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">

            <!-- consulta container -->
            <div style="padding:30px 0 400px 0;">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active"><a href="#">Consulta</a></li>
                            <li role="presentation" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    Downloads <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" id="menu2" aria-labelledby="drop5">
                                    <li><a href="#">Mundo</a></li>
                                    <li><a href="#">América Latina</a></li>
                                    <li><a href="#">Brasil</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row" style="padding-top:30px;">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="drop5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                    Escolha um Território <span class="caret"></span> </a>
                                <ul class="dropdown-menu" id="menu2" aria-labelledby="drop5">
                                    <li><a href="#">Mundo</a></li>
                                    <li><a href="#">América Latina</a></li>
                                    <li><a href="#">Brasil</a></li>
                                </ul>
                            </li>

                            <li role="presentation"> <a role="button" aria-haspopup="true" aria-expanded="true" >
                                    <span data-toggle="modal" data-target=".bs-example-modal-lg">Escolha um Indicador <span class="caret"></span> </span>
                                </a>

                            </li>
                            <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="drop5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                    Escolha um Período <span class="caret"></span> </a>
                                <ul class="dropdown-menu" id="menu2" aria-labelledby="drop5">
                                    <li><a href="#">2014-2015</a></li>
                                    <li><a href="#">2013-2014</a></li>
                                    <li><a href="#">2012-2013</a></li>
                                    <li><a href="#">2011-2012</a></li>
                                    <li><a href="#">2010-2011</a></li>
                                    <li><a href="#">2009-2010</a></li>
                                    <li><a href="#">2008-2009</a></li>
                                    <li><a href="#">2007-2008</a></li>
                                    <li><a href="#">2006-2007</a></li>
                                    <li><a href="#">2005-2006</a></li>
                                    <li><a href="#">2004-2005</a></li>
                                    <li><a href="#">2003-2004</a></li>
                                    <li><a href="#">2002-2003</a></li>
                                    <li><a href="#">2001-2002</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- modal container -->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="border:0px;margin-bottom:-25px;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            </div>
                            <div class="modal-body" style="padding-bottom:40px;">
                                <table style="width:100%;">
                                    <tr style="border-bottom: 1px solid #ededed;">
                                        <th style="padding-bottom:10px;">
                                            Objetivos
                                        </th>
                                        <th>
                                            Metas
                                        </th>
                                        <th>
                                            Indicadores
                                        </th>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td style="width:33%;">
                                            <table class="consulta-table-grid" style="padding-top:10px;">
                                                <tr>
                                                    <td class="consulta-td-cell">1. Erradicação da Pobreza</td>
                                                </tr>
                                                <tr>
                                                    <td class="consulta-td-cell">2. Fome Zero e Agricultura Sustentável</td>
                                                </tr>
                                                <tr>
                                                    <td class="consulta-td-cell">3. Saúde e Bem-Estar</td>
                                                </tr>
                                                <tr>
                                                    <td class="consulta-td-cell">4. Educação de Qualidade
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="consulta-td-cell">5. Igualdade de Gênero
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td style="width:33%;">
                                            <table class="consulta-table-grid" style="padding-top:10px;">
                                                <tr >
                                                    <td class="consulta-td-cell">5.1) Acabar com todas as formas de discriminação contra todas as mulheres e meninas em toda parte</td>
                                                </tr>
                                                <tr>
                                                    <td class="consulta-td-cell">5.2) Eliminar todas as formas de violência contra todas as mulheres e meninas nas esferas públicas e privadas, incluindo o trafico e exploração sexual e de outros tipos</td>
                                                </tr>
                                                <tr>
                                                    <td class="consulta-td-cell">5.3) Eliminar todas as práticas nocivas, como os casamentos prematuros, forçados e de crianças e mutilações genitais femininas</td>
                                                </tr>
                                                <tr>
                                                    <td class="consulta-td-cell">5.4) Reconhecer e valorizar o trabalho de assistência e doméstico não remunerado, por meio da disponibilização de serviços públicos, infraestrutura e políticas de proteção social, bem como a promoção da responsabilidade compartilhada dentro do lar e da família, conforme os contextos nacionais
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="consulta-td-cell">5.5) Garantir a participação plena e efetiva das mulheres e a igualdade de oportunidades para a liderança em todos os níveis de tomada de decisão na vida política, econômica e pública
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td style="width:33%;">
                                            <table class="consulta-table-grid" style="padding-top:10px;">
                                                <tr>
                                                    <td class="consulta-td-cell">Proporção de material reciclado em atividades industriais</td>
                                                </tr>
                                                <tr>
                                                    <td class="consulta-td-cell">Investimento público em  infraestrutura como proporção do PIB</td>
                                                </tr>
                                                <tr>
                                                    <td class="consulta-td-cell">Intensidade de emissões do setor de infraestrutura: a razão entre o pib e as emissões de Gee dos setores de energia, transporte, resíduos sólidos e efluentes domésticos e industriais</td>
                                                </tr>
                                                <tr>
                                                    <td class="consulta-td-cell">Proporção de material reciclado em atividades industriais
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="consulta-td-cell">Investimento público em  infraestrutura como proporção do PIB
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./modal container -->
            </div>
            <!-- ./consulta container -->


        </div>
    </div>

<?php
getFooter();