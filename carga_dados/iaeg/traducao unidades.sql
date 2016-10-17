select *
from dim_indicador

select *
from dim_meta





select *
from dim_ods

select *
from dim_valor_indicador i
where seq_dim_indicador = 2194


select distinct dsc_unidade from dim_indicador

update dim_indicador 
set dsc_frequencia = 'Anual'
where dsc_frequencia = 'Annual'

update dim_indicador set dsc_unidade = 'Percentual (Unidade)' where dsc_unidade = 'Percent (Units)';
update dim_indicador set dsc_unidade = 'Número (Unidade)' where dsc_unidade = 'Number (Units)';
update dim_indicador set dsc_unidade = 'USD (Milhões)' where dsc_unidade = 'USD (Millions)';
update dim_indicador set dsc_unidade = 'Número (Centenas)' where dsc_unidade ='Number (Thousands)';
update dim_indicador set dsc_unidade = 'Toneladas (Milhões)' where dsc_unidade ='Metric Tons (Millions)';
update dim_indicador set dsc_unidade = 'Toneladas (Unidade)' where dsc_unidade ='Metric Tons (Units)';
update dim_indicador set dsc_unidade = 'Quilogramas (Unidade)' where dsc_unidade ='Kilograms (Units)';
update dim_indicador set dsc_unidade = 'Não Aplicável (Unidade)' where dsc_unidade ='Not applicable (Units)';
update dim_indicador set dsc_unidade = 'Por população de 100.000 (Unidade)' where dsc_unidade ='Per 100,000 population (Units)';
update dim_indicador set dsc_unidade = 'USD (Unidade)' where dsc_unidade ='USD (Units)';
update dim_indicador set dsc_unidade = 'USD Constante (Bilhões)' where dsc_unidade ='Constant USD (Billions)';
update dim_indicador set dsc_unidade = 'Número (Milhões)' where dsc_unidade ='Number (Millions)';
update dim_indicador set dsc_unidade = 'USD Constante (Milhões)' where dsc_unidade ='Constant USD (Millions)';
update dim_indicador set dsc_unidade = 'USD (Bilhões)' where dsc_unidade ='USD (Billions)';
update dim_indicador set dsc_unidade = 'Por 100.000 nascidos vivos (Unidade)' where dsc_unidade ='Per 100,000 live births (Units)';
update dim_indicador set dsc_unidade = 'Por 1.000 nascidos vivos (Unidade)' where dsc_unidade ='Per 1,000 live births (Units)';
update dim_indicador set dsc_unidade = 'Por 1.000 população não infectada (Unidade)' where dsc_unidade ='Per 1,000 uninfected population (Units)';
update dim_indicador set dsc_unidade = 'Por 1.000 população (Unidade)' where dsc_unidade ='Per 1,000 population (Units)';
update dim_indicador set dsc_unidade = 'Litros de Álcool (Unidade)' where dsc_unidade ='Litres pure alcohol (Units)';
update dim_indicador set dsc_unidade = 'Relação (Unidade)' where dsc_unidade ='Ratio (Units)';
update dim_indicador set dsc_unidade = 'Megajoules por USD constante 2011 PPP GDP (Unidade)' where dsc_unidade ='Megajoules per USD constant 2011 PPP GDP (Units)';
update dim_indicador set dsc_unidade = 'USD Constante  (Unidade)' where dsc_unidade ='Constant USD (Units)';
update dim_indicador set dsc_unidade = 'kg CO2 equivalente por USD1 constantes de 2005 PPP PIB (Unidade)' where dsc_unidade ='kg CO2 equivalent per USD1 constant 2005 PPP GDP (Units)';
update dim_indicador set dsc_unidade = 'Por milhão de habitantes (Unidade)' where dsc_unidade ='Per million population (Units)';


metas inseridas
15.3
4.6
4.7
5.6
5.a
5.b
5.c
6.6
7.a
7.b
8.3
8.9
8.b
10.3
10.5
10.a
11.3
11.4
11.5
11.7
11.a
11.c
12.3
12.5
12.6
12.7
12.8
12.a
12.b
12.c
13.3
13.a
13.b
14.1
14.3
14.6
14.7
14.a
14.b
14.c
15.6
15.7
15.8
15.9
15.c
16.4
16.6
16.7
16.b
17.1
17.2
17.5
17.7
17.11
17.12
17.13
17.14
17.15
17.16
17.17









