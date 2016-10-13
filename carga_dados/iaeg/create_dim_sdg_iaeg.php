<?php
/**
 * Código para criação das DIMENSÕEs como os dados dos indicadores globais
 *
 * Origem dos dados: STAGEs
 */

//Criação da tabela DIM_GRUPO_IDADE
$create_stg = "
CREATE TABLE IF NOT EXISTS `dim_grupo_idade` (
  `seq_dim_grupo_idade` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Sequencial da dimensão.',
  `dsc_grupo_idade` varchar(100) NOT NULL COMMENT 'Descrição do grupo de idade.',
  PRIMARY KEY (`seq_dim_grupo_idade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dimensão de tipagem para os possíveis grupos de idade para um indicador global.';
";

//Criação da tabela DIM_INDICADOR
$create_stg = "
CREATE TABLE IF NOT EXISTS `dim_indicador` (
  `seq_dim_indicador` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Sequencial da dimensão.',
  `seq_dim_meta` int(11) NOT NULL COMMENT 'Referência a meta a qual o indicador esta vinculado.',
  `nom_indicador` varchar(500) NOT NULL COMMENT 'Descrição do indicador.',
  `nom_indicador_original` varchar(500) NOT NULL,
  `dsc_cod_serie` varchar(100) NOT NULL,
  `dsc_frequencia` varchar(100) NOT NULL COMMENT 'Frequencia que os dados do indicador são coletados.',
  `dsc_unidade` varchar(100) NOT NULL COMMENT 'Unidade na qual o valor do indicador é medido.',
  `dsc_fonte` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`seq_dim_indicador`),
  KEY `FK_INDICADOR_META` (`seq_dim_meta`),
  CONSTRAINT `FK_DIM_INDICADOR_DIM_META` FOREIGN KEY (`seq_dim_meta`) REFERENCES `dim_meta` (`seq_dim_meta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dimensão com os indicadores globais relacionados com sua meta.';
";

//Criação da tabela DIM_LOCALIDADE
$create_stg = "
CREATE TABLE IF NOT EXISTS `dim_localidade` (
  `seq_dim_localidade` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Sequencial da dimensão de localidades.',
  `dsc_localidade` varchar(100) NOT NULL COMMENT 'Descrição da localidade.',
  PRIMARY KEY (`seq_dim_localidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Possíveis localidades para um indicador.';
";

//Criação da tabela DIM_META
$create_stg = "
CREATE TABLE IF NOT EXISTS `dim_meta` (
  `seq_dim_meta` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Sequencial da dimensão de metas.',
  `seq_dim_ods` int(11) NOT NULL COMMENT 'Referência o ODS ao qual a meta esta vinculada.',
  `num_meta` varchar(10) NOT NULL COMMENT 'Número da meta.',
  `nom_meta` varchar(100) NOT NULL COMMENT 'Nome da meta.',
  `dsc_meta` varchar(1000) NOT NULL COMMENT 'Descrição da meta.',
  PRIMARY KEY (`seq_dim_meta`),
  KEY `FK_META_ODS` (`seq_dim_ods`),
  CONSTRAINT `FK_DIM_META_DIM_ODS` FOREIGN KEY (`seq_dim_ods`) REFERENCES `dim_ods` (`seq_dim_ods`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena as metas dos ODS.';
";

//Criação da tabela DIM_ODS
$create_stg = "
CREATE TABLE IF NOT EXISTS `dim_ods` (
  `seq_dim_ods` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Sequencial da dimensão de ODS.',
  `nom_ods` varchar(100) NOT NULL COMMENT 'Nome do ODS.',
  `dsc_ods` varchar(2000) NOT NULL COMMENT 'Descrição do ODS.',
  `dsc_agencias_coordenadoras` varchar(100) NOT NULL,
  `dsc_agencias_participantes` varchar(200) NOT NULL,
  PRIMARY KEY (`seq_dim_ods`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena informações referentes aos ODS (Objetivo para o Desenvolvimento Sustentável).';
";

//Criação da tabela DIM_TEMPO
$create_stg = "
CREATE TABLE IF NOT EXISTS `dim_tempo` (
  `seq_dim_tempo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Sequencial da dimensão de tempo (AAAMMDD).',
  `num_dia` int(11) NOT NULL COMMENT 'Referência o dia.',
  `num_mes` int(11) NOT NULL COMMENT 'Referência o mês.',
  `num_ano` int(11) NOT NULL COMMENT 'Referência o ano.',
  PRIMARY KEY (`seq_dim_tempo`),
  KEY `seq_dim_tempo` (`seq_dim_tempo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dimensão de tipagem para vincular ao tempo.';
";

//Criação da tabela DIM_TERRITORIO
$create_stg = "
CREATE TABLE IF NOT EXISTS `dim_territorio` (
  `seq_dim_territorio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Sequencial da dimensão.',
  `nom_territorio` varchar(200) NOT NULL COMMENT 'Nome do território.',
  `nom_territorio_ptbr` varchar(200) NOT NULL,
  PRIMARY KEY (`seq_dim_territorio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Territórias para onde os indicadores são verificados.';
";

//Criação da tabela DIM_TIPO_DADO
$create_stg = "
CREATE TABLE IF NOT EXISTS `dim_tipo_dado` (
  `seq_dim_tipo_dado` char(5) NOT NULL DEFAULT 'X' COMMENT 'Sequencial da dimensão de tipo de dado.',
  `dsc_tipo_dado` varchar(500) NOT NULL COMMENT 'Descrição do tipo de dado.',
  PRIMARY KEY (`seq_dim_tipo_dado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Dimensão de tipagem para os tipos de dados monitorados para um ODS.';
";

//Criação da tabela DIM_VALOR_INDICADOR
$create_stg = "
CREATE TABLE IF NOT EXISTS `dim_valor_indicador` (
  `seq_dim_indicador` int(11) NOT NULL COMMENT 'Referência o indicador.',
  `seq_dim_tempo` int(11) NOT NULL COMMENT 'Referência o tempo para o valor do indicador.',
  `seq_dim_tipo_dado` char(5) DEFAULT NULL COMMENT 'Referência o tipo do dado para o valor do indicador.',
  `seq_dim_localidade` int(11) NOT NULL COMMENT 'Referência a localidade para o valor do indicador.',
  `seq_dim_grupo_idade` int(11) NOT NULL COMMENT 'Referência o grupo de idade para o valor do indicador.',
  `seq_dim_territorio` int(11) NOT NULL,
  `ind_genero` varchar(50) NOT NULL COMMENT 'Indica o gênero para o valor do indicador.',
  `vlr_indicador` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Valor do indicador.',
  `dsc_fonte` varchar(500) NOT NULL DEFAULT '0.00',
  KEY `FK_DIM_VALOR_INDICADOR_DIM_INDICADOR` (`seq_dim_indicador`),
  KEY `FK_DIM_VALOR_INDICADOR_DIM_TEMPO` (`seq_dim_tempo`),
  KEY `FK_DIM_VALOR_INDICADOR_DIM_TIPO_DADO` (`seq_dim_tipo_dado`),
  KEY `FK_DIM_VALOR_INDICADOR_DIM_GRUPO_IDADE` (`seq_dim_grupo_idade`),
  KEY `FK_DIM_VALOR_INDICADOR_DIM_LOCALIDA` (`seq_dim_localidade`),
  KEY `FK_DIM_VALOR_INDICADOR_DIM_TERRITORIO` (`seq_dim_territorio`),
  CONSTRAINT `FK_DIM_VALOR_INDICADOR_DIM_TERRITORIO` FOREIGN KEY (`seq_dim_territorio`) REFERENCES `dim_territorio` (`seq_dim_territorio`),
  CONSTRAINT `FK_DIM_VALOR_INDICADOR_DIM_GRUPO_IDADE` FOREIGN KEY (`seq_dim_grupo_idade`) REFERENCES `dim_grupo_idade` (`seq_dim_grupo_idade`),
  CONSTRAINT `FK_DIM_VALOR_INDICADOR_DIM_INDICADOR` FOREIGN KEY (`seq_dim_indicador`) REFERENCES `dim_indicador` (`seq_dim_indicador`),
  CONSTRAINT `FK_DIM_VALOR_INDICADOR_DIM_LOCALIDA` FOREIGN KEY (`seq_dim_localidade`) REFERENCES `dim_localidade` (`seq_dim_localidade`),
  CONSTRAINT `FK_DIM_VALOR_INDICADOR_DIM_TEMPO` FOREIGN KEY (`seq_dim_tempo`) REFERENCES `dim_tempo` (`seq_dim_tempo`),
  CONSTRAINT `FK_DIM_VALOR_INDICADOR_DIM_TIPO_DADO` FOREIGN KEY (`seq_dim_tipo_dado`) REFERENCES `dim_tipo_dado` (`seq_dim_tipo_dado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena os valores monitorados para os indicadores em cada momento do tempo.\r\nGerado a partir da STG_INDICADORES_GLOBAIS.';
";
