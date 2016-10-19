<?php
$NOME_PAGINA = 'Eventos';
include_once 'partes.php';
getHeader();
?>
<script type="text/javascript">
    var data = new Date();
    function carregaMesAnt() {
        data.setMonth(data.getMonth() - 1)
        carregaMes();
    }
    function carregaMesProx(){
        data.setMonth(data.getMonth() + 1)
        carregaMes();
    }
    function carregaMes(){
        var eventos = $('#eventos');
        eventos.empty();
        var calendario = $('#calendario');
        calendario.empty();
        $.ajax({
            url: 'get_eventos.php?ano=' + data.getFullYear() + '&mes=' + (data.getMonth() + 1),
            dataType: 'json'
        }).done(function(retorno){
            eventos.append(retorno.eventos);
            calendario.append(retorno.calendario);
            $('#num_ano').html(retorno.ano);
            $('#nom_mes').html(retorno.mes);
        });
    }

    $( document ).ready(function(){
        carregaMes();
    })
</script>
<link rel="stylesheet" href="css/agenda.css">
<div class="row" style="background-color:#eeeeee">
    <div class="col-xs-10 col-xs-offset-1">

        <!-- calendar container -->
        <div>
            <div class="row" style="padding:40px;">
                <div class="col-xs-8 left-side-calendar-container">
                    <div class="month">
                        <ul>
                            <li class="prev"><a title="Exibir mês anterior" onclick="carregaMesAnt();">&#10094;</a></li>
                            <li class="next"><a title="Exibir próximo mês" onclick="carregaMesProx();">&#10095;</a></li>
                            <li class="text-center" style="font-weight: bold;">
                                <div id="nom_mes"></div>
                                <span id="num_ano" style="font-size:18px"></span>
                            </li>
                        </ul>
                    </div>

                    <ul class="weekdays">
                        <li>Seg</li>
                        <li>Ter</li>
                        <li>Qua</li>
                        <li>Qui</li>
                        <li>Sex</li>
                        <li>Sab</li>
                        <li>Dom</li>
                    </ul>
                    <ul id="calendario" class="days">
                    </ul>
                </div>
                <div class="col-xs-4" style="background-color:#264c5f;border-radius:0 10px 10px 0; margin-bottom:0px;height:550px;">
                    <div class="row" style="margin-top:30px;">
                        <div class="col-xs-12 text-center">
                            <span class="title-font" style="font-size:16pt;color:#ff9d1e;font-weight:bold;">Agenda de Eventos</span>
                            <div class="border-botton-events-list"></div>
                        </div>
                    </div>
                    <div id="eventos"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
getFooter();
