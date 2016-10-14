<?php
include_once 'partes.php';

getHeader();
?>
    <link rel="stylesheet" href="css/agenda.css">
    <div class="row" style="background-color:#eeeeee">
        <div class="col-xs-10 col-xs-offset-1">

            <!-- calendar container -->
            <div>
                <div class="row" style="padding:40px;">
                    <div class="col-xs-8 left-side-calendar-container">
                        <div class="month">
                            <ul>
                                <li class="prev">&#10094;</li>
                                <li class="next">&#10095;</li>
                                <li class="text-center" style="font-weight: bold;">
                                    Outubro<br>
                                    <span style="font-size:18px">2016</span>
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

                        <ul class="days">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>
                            <li>6</li>
                            <li>7</li>
                            <li>8</li>
                            <li>9</li>
                            <li><span class="active">10</span></li>
                            <li>11</li>
                            <li>12</li>
                            <li>13</li>
                            <li>14</li>
                            <li>15</li>
                            <li>16</li>
                            <li>17</li>
                            <li>18</li>
                            <li>19</li>
                            <li>20</li>
                            <li>21</li>
                            <li>22</li>
                            <li>23</li>
                            <li>24</li>
                            <li>25</li>
                            <li><span class="active">26</span></li>
                            <li>27</li>
                            <li>28</li>
                            <li>29</li>
                            <li><span class="active">30</span></li>
                            <li>31</li>
                        </ul>

                    </div>
                    <div class="col-xs-4" style="background-color:#264c5f;border-radius:0 10px 10px 0; margin-bottom:0px;height:550px;">

                        <div class="row" style="margin-top:70px;">
                            <div class="col-xs-12 text-center">
											<span class="title-font" style="font-size:16pt;color:#ff9d1e;font-weight:bold;">
												Agenda de Eventos
											</span>
                                <div class="border-botton-events-list"></div>
                            </div>
                        </div>

                        <div class="row" style="margin-top:105px;">
                            <div class="col-xs-8 col-xs-offset-2 text-center">
											<span class="agenda-events-label">
												CONFERÊNCIA INTERNACIONAL DOS ODS
											</span>
                                <div class="border-botton-events-list"></div>
                            </div>
                        </div>


                        <div class="row"  style="margin-top:55px;">
                            <div class="col-xs-8 col-xs-offset-2 text-center">
											<span class="agenda-events-label">
												CONGRESSO DA ONU
											</span>
                                <div class="border-botton-events-list"></div>
                            </div>
                        </div>

                        <div class="row"  style="margin-top:55px;">
                            <div class="col-xs-8 col-xs-offset-2 text-center">
											<span class="agenda-events-label">
												CIDADES VERDES
											</span>
                                <div class="border-botton-events-list"></div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- ./calendar container -->

        </div>
    </div>
<?php
getFooter();
