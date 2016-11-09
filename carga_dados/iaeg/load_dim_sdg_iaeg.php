<?php
/**
* Código para carga das dimensões dos indicadores
*
* Origem dos dados: STAGEs
*/

//Insert na DIM_LOCALIDADE
$insert = "
insert into dim_localidade (dsc_localidade)
select distinct vsiis.Location
from vw_stg_indicadores_iaeg_sdg vsiis
where not exists (select 1 from dim_localidade dl where dl.dsc_localidade = vsiis.Location);
";

//Insert na DIM_GRUPO_IDADE
$insert = "
insert into dim_grupo_idade (dsc_grupo_idade)
select distinct vsiis.`Age Group`
from vw_stg_indicadores_iaeg_sdg vsiis
where not exists (select 1 from dim_grupo_idade dgi where dgi.dsc_grupo_idade = vsiis.`Age Group`);
";

//Insert na DIM_META
$insert = "
insert into dim_meta (seq_dim_ods, num_meta)
select distinct vsiis.Goal, vsiis.Target
from vw_stg_indicadores_iaeg_sdg vsiis
where not exists (select 1 from dim_meta dm where dm.seq_dim_ods = vsiis.Goal and dm.num_meta = vsiis.Target);
";

//Insert na DIM_INDICADOR
$insert = "
insert into dim_indicador (seq_dim_meta, nom_indicador_original, dsc_frequencia, dsc_unidade)
select r.* from (
    select (select seq_dim_meta
              from dim_meta dm
             where dm.num_meta = vsiis.Target
               and dm.seq_dim_ods = vsiis.Goal) as seq_dim_meta,
           vsiis.`Series Description` as nom_indicador,
           vsiis.Frequency as dsc_frequencia,
           vsiis.Unit as dsc_unidade
      from vw_stg_indicadores_iaeg_sdg vsiis
     group by vsiis.Target,
              vsiis.`Series Description`,
              vsiis.Frequency,
              vsiis.Unit
) r
where not exists (select 1 from dim_indicador di
                   where di.seq_dim_meta = r.seq_dim_meta
                     and di.nom_indicador_original = r.nom_indicador
                     and di.dsc_frequencia = r.dsc_frequencia
                     and di.dsc_unidade = r.dsc_unidade);
";

//Insert na DIM_VALOR_INDICADOR
//CARGA DOS VALORES DOS INDICADORES [variar o ano]
$insert = "
insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 1990 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.1990, ',', ''),
       vsiis.FN_1990
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 1991 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.1991, ',', ''),
       vsiis.FN_1991
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 1992 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.1992, ',', ''),
       vsiis.FN_1992
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 1993 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.1993, ',', ''),
       vsiis.FN_1993
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 1994 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.1994, ',', ''),
       vsiis.FN_1994
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 1995 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.1995, ',', ''),
       vsiis.FN_1995
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 1996 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.1996, ',', ''),
       vsiis.FN_1996
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 1997 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.1997, ',', ''),
       vsiis.FN_1997
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 1998 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.1998, ',', ''),
       vsiis.FN_1998
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 1999 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.1999, ',', ''),
       vsiis.FN_1999
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2000 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2000, ',', ''),
       vsiis.FN_2000
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2001 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2001, ',', ''),
       vsiis.FN_2001
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2002 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2002, ',', ''),
       vsiis.FN_2002
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2003 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2003, ',', ''),
       vsiis.FN_2003
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2004 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2004, ',', ''),
       vsiis.FN_2004
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2005 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2005, ',', ''),
       vsiis.FN_2005
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2006 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2006, ',', ''),
       vsiis.FN_2006
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2007 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2007, ',', ''),
       vsiis.FN_2007
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2008 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2008, ',', ''),
       vsiis.FN_2008
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2009 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2009, ',', ''),
       vsiis.FN_2009
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2010 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2010, ',', ''),
       vsiis.FN_2010
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2011 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2011, ',', ''),
       vsiis.FN_2011
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2012 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2012, ',', ''),
       vsiis.FN_2012
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2013 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2013, ',', ''),
       vsiis.FN_2013
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2014 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2014, ',', ''),
       vsiis.FN_2014
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2015 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2015, ',', ''),
       vsiis.FN_2015
  from vw_stg_indicadores_iaeg_sdg vsiis;

insert into dim_valor_indicador (seq_dim_indicador, seq_dim_tempo, seq_dim_tipo_dado, seq_dim_localidade, seq_dim_grupo_idade, seq_dim_territorio, ind_genero, vlr_indicador, dsc_fonte)
select (select di.seq_dim_indicador
          from dim_indicador di,
               dim_meta dm
         where di.seq_dim_meta = dm.seq_dim_meta
           and dm.seq_dim_ods = vsiis.Goal
           and dm.num_meta = vsiis.Target
           and di.nom_indicador_original = vsiis.`Series Description`
           and di.dsc_unidade_original = vsiis.Unit) as seq_dim_indicador,
       (select dt.seq_dim_tempo from dim_tempo dt where dt.num_ano = 2016 and dt.num_mes = 1 and dt.num_dia = 1),
       null,
       (select dl.seq_dim_localidade from dim_localidade dl where dl.dsc_localidade_original = vsiis.Location),
       (select dgi.seq_dim_grupo_idade from dim_grupo_idade dgi where dgi.dsc_grupo_idade_original = vsiis.`Age Group`),
       (select dte.seq_dim_territorio from dim_territorio dte where dte.nom_territorio = vsiis.`Country or Area`),
       vsiis.Sex,
       replace(vsiis.2016, ',', ''),
       vsiis.FN_2016
  from vw_stg_indicadores_iaeg_sdg vsiis;
";

