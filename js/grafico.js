function getGrafico(id_ind, data){
    var margin = {top: 20, right: 20, bottom: 30, left: 50},
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;

    var formatDate = d3.time.format("%d-%b-%y");

    var x = d3.time.scale()
        .range([0, width]);

    var y = d3.scale.linear()
        .range([height, 0]);

    var xAxis = d3.svg.axis()
        .scale(x)
        .orient("bottom");

    var yAxis = d3.svg.axis()
        .scale(y)
        .orient("left");

    var line = d3.svg.line()
        .x(function (d) {
            return x(d.date);
        })
        .y(function (d) {
            return y(d.close);
        });

    var svg = d3.select('#' + id_ind + ' td.dados').append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

        if (error) throw error;

        x.domain(d3.extent(data, function (d) {
            return d.date;
        }));
        y.domain(d3.extent(data, function (d) {
            return d.close;
        }));

    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis)
        .append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", 6)
        .attr("dy", ".71em")
        .style("text-anchor", "end")
        .text("Price ($)");

    svg.append("path")
        .datum(data)
        .attr("class", "line")
        .attr("d", line);

    function type(d) {
        d.date = formatDate.parse(d.date);
        d.close = +d.close;
        return d;
    }
}

function showGrafico(dados){
    var localeFormatter = d3.locale({
        "decimal": ",",
        "thousands": ".",
        "grouping": [3],
        "currency": ["R$", ""],
        "dateTime": "%d/%m/%Y %H:%M:%S",
        "date": "%d/%m/%Y",
        "time": "%H:%M:%S",
        "periods": ["AM", "PM"],
        "days": ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
        "shortDays": ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
        "months": ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        "shortMonths": ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"]
    });

    var arrayLinhas = [];
    arrayLinhas.push(['x'].concat(dados.rotulos.split(",")));
    var rotulos = {};
    for( var cont = 0; cont < dados.indicadores.length; cont++ ){
        arrayLinhas.push([cont].concat(dados.indicadores[cont].valores.split(",")));
        eval("var rot = {" + cont + ":'" + dados.indicadores[cont].nome + "'};");
        $.extend(rotulos, rot);
    }
    c3.generate({
        bindto:'#grafico',
        data:{
            x:'x',
            columns: arrayLinhas,
            names: rotulos
        },
        axis:{
            x:{
                label: {
                    position: 'outer-center',
                    text: 'Ano'
                }
            },
            y:{
                label: {
                    position: 'outer-middle',
                    text: dados.unidade
                }
            }
        },
        legend:{
            position: 'right'
        },
        tooltip:{
            format:{
                title: function (d) { return 'Ano ' + d; },
                value:function(value){
                    return localeFormatter.numberFormat(',.')(value) + ' ' + dados.unidade;
                }
            }
        }
    });
}