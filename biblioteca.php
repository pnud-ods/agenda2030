<?php
include_once 'partes.php';
include_once 'conectar.php';

getHeader();
?>
    <div class="row" style="background-color:#eeeeee">
        <div class="col-xs-10 col-xs-offset-1">
            <div style="padding-bottom:60px;">
                <div class="row" style="padding:40px;">
                    <div class="col-xs-12 text-center">
                        <h1 style="color:#187cad;">Biblioteca - ODS e Agenda 2030</h1>
                        <p>Veja abaixo algumas publicações que podem te ajudar a entender melhor os ODS e a Agenda 2030</p>
                    </div>
                </div>
                <div>
                    <?php
                    $sql = "select p.dsc_categoria,
                                   p.dsc_titulo,
                                   p.dsc_link,
                                   p.dsc_resumo,
                                   p.dsc_referencia,
                                   group_concat(t.nom_tag order by t.nom_tag SEPARATOR ', ') as tags
                              from publicacao p
                              left join tag_publicacao tp on p.id_publicacao = tp.id_publicacao
                              left join tag t on tp.id_tag = t.id_tag
                             group by p.dsc_categoria, p.dsc_titulo, p.dsc_link, p.dsc_resumo, p.dsc_referencia
                             order by p.dat_criacao desc";
                    $result = $conn->query($sql);
                    while( $row = $result->fetch_assoc() ){
                        echo '<div class="row" style="border-top: 1px solid #cecece;padding: 30px 0px; 10px 0px;">';
                        echo '<div class="col-xs-12 " style="color:#696969;">';
                        echo '<p>';
                        echo "<span class=\"label label-primary\" style=\"font-size:10pt;\">{$row['dsc_categoria']}</span>";
                        echo '</p>';
                        echo '<p style="font-size:14pt;color:#187cad;padding-top:10px;">';
                        echo $row['dsc_titulo'];
                        echo "<a class=\"btn btn-sm btn-success\" style=\"margin-left: 10px;margin-top: -8px;\" title=\"Download arquivo {$row['dsc_link']}\" target=\"_blank\" href=\"biblioteca/{$row['dsc_link']}\">";
                        echo '<span class="glyphicon glyphicon-download-alt"></span> Download';
                        echo '</a>';
                        echo '</p>';
                        echo "<p style=\"font-size:12pt;color:#444;\">{$row['dsc_resumo']}</p>";
                        echo '<div class="referencias">';
                        if( strlen($row['dsc_referencia']) > 0 ){
                            echo "<p>Referência: {$row['dsc_referencia']}</p>";
                        }
                        if( strlen($row['tags']) > 0 ){
                            echo "<p>Tags: {$row['tags']}</p>";
                        }
                        echo '</div>';
                        echo '</div>';
                        echo "</div>\n";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php
getFooter();
