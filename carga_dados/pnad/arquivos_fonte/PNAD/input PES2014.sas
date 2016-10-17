/*     PROGRAMA DE LEITURA EM SAS DO ARQUIVO DE MICRODADOS DE PESSOAS
    DA PNAD 2014 - PESQUISAS B�SICA E SUPLEMENTARES DE ACESSO � INTERNET E � TELEVIS�O
                              E INCLUS�O PRODUTIVA	*/
				   
/* Obs.: As duas primeiras posi��es de V0102 (N�mero de controle)
        s�o o c�digo da UF (Unidade da Federa��o).
   Obs.2: Ajuste o endere�o do arquivo PES2014.TXT no comando INFILE */


DATA PES2014;
INFILE '...\dados\PES2014.TXT'  LRECL=821 MISSOVER;
INPUT   
@00001          V0101          $4.          /*Ano de refer�ncia*/
@00005          UF          $2.          /*Unidade da Federa��o*/
@00005          V0102          $8.          /*N�mero de controle*/
@00013          V0103          $3.          /*N�mero de s�rie*/
@00016          V0301          $2.          /*N�mero de ordem*/
@00018          V0302          $1.          /*Sexo*/
@00019          V3031          $2.          /*Dia de nascimento*/
@00021          V3032          $2.          /*M�s de nascimento*/
@00023          V3033          $4.          /*Ano de nascimento*/
@00027          V8005          3.          /*Idade do morador na data de refer�ncia*/
@00030          V0401          $1.          /*Condi��o na unidade domiciliar*/
@00031          V0402          $1.          /*Condi��o na fam�lia*/
@00032          V0403          $1.          /*N�mero da fam�lia*/
@00033          V0404          $1.          /*Cor ou ra�a*/
@00034          V0405          $1.          /*Tem m�e viva*/
@00035          V0406          $1.          /*M�e mora no domic�lio*/
@00036          V0407          2.          /*N�mero de ordem da m�e */
@00038          V0408          $1.          /*Tem registro de nascimento*/
@00039          V0409          $1.          /*Principal motivo de morar neste dom�cilio com outra(s) fam�lia(s)*/
@00040          V0410          $1.          /*Inten��o de se mudar e constituir outro domic�lio*/
@00041          V4111          $1.          /*Vive em companhia de c�njuge ou companheiro(a)*/
@00042          V4112          $1.          /*Natureza da uni�o*/
@00043          V4011          $1.          /*Estado civil*/
@00044          V0412          $1.          /*O informante desta parte foi*/
@00045          V0501          $1.          /*Nasceu no munic�pio de resid�ncia*/
@00046          V0502          $1.          /*Nasceu na Unidade da Federa��o de resid�ncia*/
@00047          V5030          $2.          /*Lugar de nascimento*/
@00049          V0504          $1.          /*Morou em outra Unidade da Federa��o ou pa�s estrangeiro*/
@00050          V0505          $1.          /*Morava na Unidade da Federa��o na data de refer�ncia */
@00051          V5061          $1.          /*Tinha at� 4 anos ininterruptos de resid�ncia na Unidade da Federa��o*/
@00052          V5062          $1.          /*Tempo de resid�ncia na Unidade da Federa��o (at� 4 anos)*/
@00053          V5063          $1.          /*Tinha de 5 a 9 anos ininterruptos de resid�ncia na Unidade da Federa��o*/
@00054          V5064          $1.          /*Tempo de resid�ncia na Unidade da Federa��o (de 5 a 9 anos)*/
@00055          V5065          $1.          /*Tinha 10 anos ou mais de resid�ncia na Unidade da Federa��o*/
@00056          V0507          $1.          /*Morava na Unidade da Federa��o h� 5 anos da data de refer�ncia*/
@00057          V5080          $2.          /*Lugar de resid�ncia h� 5 anos da data de refer�ncia*/
@00059          V5090          $2.          /*Lugar de resid�ncia anterior*/
@00061          V0510          $1.          /*Morava no munic�pio na data de refer�ncia*/
@00062          V0511          $1.          /*Morou em outro munic�pio na Unidade da Federa��o*/
@00063          V5121          $1.          /*Tinha at� 4 anos ininterruptos de resid�ncia no munic�pio*/
@00064          V5122          $1.          /*Tempo de resid�ncia no munic�pio (at� 4 anos)*/
@00065          V5123          $1.          /*Tinha de 5 a 9 anos ininterruptos de resid�ncia no munic�pio*/
@00066          V5124          $1.          /*Tempo de resid�ncia no munic�pio (de 5 a 9 anos)*/
@00067          V5125          $1.          /*Tinha 10 anos ou mais de resid�ncia no munic�pio*/
@00068          V5126          $1.          /*O informante desta parte foi*/
@00069          V0601          $1.          /*Sabe ler e escrever*/
@00070          V0602          $1.          /*Frequenta escola ou creche*/
@00071          V6002          $1.          /*Rede de ensino*/
@00072          V6020          $1.          /*�rea da rede p�blica de ensino*/
@00073          V6003          $2.          /*Curso que frequenta*/
@00075          V6030          $1.          /*Dura��o do ensino fundamental*/
@00076          V0604          $1.          /*O curso que frequenta � seriado*/
@00077          V0605          $1.          /*S�rie que frequenta*/
@00078          V0606          $1.          /*Anteriormente frequentou escola ou creche*/
@00079          V6007          $2.          /*Curso mais elevado que frequentou anteriormente*/
@00081          V6070          $1.          /*Dura��o do ensino fundamental que frequentou anteriormente*/
@00082          V0608          $1.          /*Este curso que frequentou anteriormente era seriado*/
@00083          V0609          $1.          /*Concluiu, com aprova��o, pelo menos a 1� s�rie deste curso que frequentou anteriormente*/
@00084          V0610          $1.          /*�ltima s�rie conclu�da com aprova��o, neste curso que frequentou anteriormente*/
@00085          V0611          $1.          /*Concluiu este curso que frequentou anteriormente*/
@00086          V06111          $1.          /*Nos �ltimos tr�s meses, utilizou a Internet em algum local*/
@00087          V061111          $1.          /*Nos �ltimos doze meses, utilizou a Internet em algum local*/
@00088          V061112          $1.          /*O acesso � Internet foi feito atrav�s de microcomputador*/
@00089          V061113          $1.          /*O acesso � Internet foi feito atrav�s de telefone celular*/
@00090          V061114          $1.          /*O acesso � Internet foi feito atrav�s de tablet*/
@00091          V061115          $1.          /*O acesso � Internet foi feito atrav�s de tv*/
@00092          V061116          $1.          /*O acesso � Internet foi feito atrav�s de outro equipamento eletr�nico*/
@00093          V06112          $1.          /*Tem telefone m�vel celular para uso pessoal*/
@00094          V0612          $1.          /*O informante desta parte foi*/
@00095          V0701          $1.          /*Teve algum trabalho no per�odo de refer�ncia de 365 dias*/
@00096          V0702          $1.          /*Exerceu tarefas em cultivo, pesca ou cria��o de animais, destinados � pr�pria alimenta��o das pessoas moradoras no domic�lio, no per�odo de refer�ncia de 365 dias*/
@00097          V0703          $1.          /*Exerceu tarefas em constru��o de pr�dio, c�modo, po�o ou outras obras de constru��o, destinadas ao pr�prio uso das pessoas moradoras no domic�lio, no per�odo de refer�ncia de 365 dias*/
@00098          V0704          $1.          /*Trabalhou na semana de refer�ncia*/
@00099          V0705          $1.          /*Esteve afastado temporariamente do trabalho remunerado que tinha na semana de refer�ncia*/
@00100          V7060          $4.          /*C�digo da ocupa��o no trabalho do per�odo de capta��o de 358 dias*/
@00104          V7070          $5.          /*C�digo da atividade principal do empreendimento no trabalho do per�odo de capta��o de 358 dias*/
@00109          V0708          $1.          /*Posi��o na ocupa��o no trabalho do per�odo de capta��o de 358 dias*/
@00110          V7090          $4.          /*C�digo da ocupa��o no trabalho da semana de refer�ncia*/
@00114          V7100          $5.          /*C�digo da atividade principal do empreendimento no trabalho da semana de refer�ncia*/
@00119          V0711          $1.          /*Posi��o na ocupa��o no trabalho da semana de refer�ncia*/
@00120          V7121          $1.          /*C�digo 2 - recebia normalmente rendimento mensal em dinheiro no m�s de refer�ncia no(s) trabalho(s) da semana de refer�ncia*/
@00121          V7122          12.          /*Rendimento mensal em dinheiro que recebia normalmente no m�s de refer�ncia no(s) trabalho(s) da semana de refer�ncia*/
@00133          V7124          $1.          /*C�digo 4 - recebia normalmente rendimento mensal em produtos ou mercadorias no m�s de refer�ncia no(s) trabalho(s) da semana de refer�ncia*/
@00134          V7125          12.          /*Rendimento mensal em valor dos produtos ou mercadorias que recebia normalmente no m�s de refer�ncia no(s) trabalho(s) da semana de refer�ncia*/
@00146          V7127          $1.          /*C�digo 6 - recebia normalmente rendimento mensal somente em benef�cios no m�s de refer�ncia no(s) trabalho(s) da semana de refer�ncia*/
@00147          V7128          $1.          /*C�digo 8 - era trabalhador n�o remunerado no(s) trabalho(s) da semana de refer�ncia*/
@00148          V0713          2.          /*N�mero de horas habitualmente trabalhadas por semana no(s) trabalho(s) da semana de refer�ncia*/
@00150          V0714          $1.          /*Cuidava dos afazeres dom�sticos na semana de refer�ncia*/
@00151          V0715          2.          /*N�mero de horas que dedicava normalmente por semana aos afazeres dom�sticos*/
@00153          V0716          $1.          /*O informante desta parte foi*/
@00154          V9001          $1.          /*Trabalhou na semana de refer�ncia*/
@00155          V9002          $1.          /*Esteve afastado temporariamente do trabalho remunerado que tinha na semana de refer�ncia*/
@00156          V9003          $1.          /*Exerceu tarefas em cultivo, pesca ou cria��o de animais, destinados � pr�pria alimenta��o das pessoas moradoras no domic�lio, na semana de refer�ncia*/
@00157          V9004          $1.          /*Exerceu tarefas em constru��o de pr�dio, c�modo, po�o ou outras obras de constru��o, destinadas ao pr�prio uso das pessoas moradoras no domic�lio, na semana de refer�ncia*/
@00158          V9005          $1.          /*N�mero de trabalhos que tinha na semana de refer�ncia*/
@00159          V9906          $4.          /*C�digo da ocupa��o no trabalho principal da semana de refer�ncia*/
@00163          V9907          $5.          /*C�digo da atividade principal do empreendimento no trabalho principal da semana de refer�ncia*/
@00168          V9008          $2.          /*Posi��o na ocupa��o no trabalho principal da semana de refer�ncia*/
@00170          V9009          $1.          /*Recebia do empregador alguma �rea para produ��o particular*/
@00171          V9010          $1.          /*Tinha parceria com o empregador*/
@00172          V9011          $1.          /*Foi contratado somente por pessoa(s) respons�vel(v�is) pelo(s) estabelecimento(s) em que trabalhou como empregado tempor�rio no m�s de refer�ncia*/
@00173          V9012          $1.          /*Foi contratado como empregado tempor�rio, somente por intermedi�rio (empresa empreiteira, empreiteiro, �gato�, etc.) no m�s de refer�ncia*/
@00174          V9013          $1.          /*Teve ajuda de trabalhador n�o remunerado membro da unidade domiciliar no m�s de refer�ncia*/
@00175          V9014          $1.          /*N�mero de trabalhadores n�o remunerados membros da unidade domiciliar, independentemente da idade, que ajudaram � pessoa que era empregado no m�s de refer�ncia*/
@00176          V9151          $1.          /*C�digo 1 - referente � 1� parcela ou parcela �nica do empreendimento*/
@00177          V9152          11.          /*�rea informada na 1� parcela ou parcela �nica do empreendimento*/
@00188          V9154          7.          /*Equival�ncia em m�, referente � unidade de medida de superf�cie em V9152*/
@00195          V9156          $1.          /*C�digo 3 - referente � 2� parcela do empreendimento*/
@00196          V9157          11.          /*�rea informada na 2� parcela do empreendimento*/
@00207          V9159          7.          /*Equival�ncia em m�, referente � unidade de medida de superf�cie em V9157*/
@00214          V9161          $1.          /*C�digo 5 - referente � 3� parcela do empreendimento*/
@00215          V9162          11.          /*�rea informada na 3� parcela do empreendimento*/
@00226          V9164          7.          /*Equival�ncia em m�, referente � unidade de medida de superf�cie em V9162*/
@00233          V9016          $1.          /*Tinha pelo menos um empregado tempor�rio, no m�s de refer�ncia, no trabalho principal da semana de refer�ncia*/
@00234          V9017          $1.          /*N�mero de empregados tempor�rios, no m�s de refer�ncia, no trabalho principal da semana de refer�ncia*/
@00235          V9018          $1.          /*Tinha pelo menos um empregado permanente, no m�s de refer�ncia, no trabalho principal da semana de refer�ncia*/
@00236          V9019          $1.          /*N�mero de empregados permanentes, no m�s de refer�ncia, no trabalho principal da semana de refer�ncia*/
@00237          V9201          $1.          /*C�digo 2 - referente � 1� parcela ou parcela �nica do empreendimento*/
@00238          V9202          11.          /*�rea informada na 1� parcela ou parcela �nica do empreendimento*/
@00249          V9204          7.          /*Equival�ncia em m�, referente � unidade de medida de superf�cie em V9202*/
@00256          V9206          $1.          /*C�digo 4 - referente � 2� parcela do empreendimento*/
@00257          V9207          11.          /*�rea informada na 2� parcela do empreendimento*/
@00268          V9209          7.          /*Equival�ncia em m�, referente � unidade de medida de superf�cie em V9207*/
@00275          V9211          $1.          /*C�digo 6 - referente � 3� parcela do empreendimento*/
@00276          V9212          11.          /*�rea informada na 3� parcela do empreendimento*/
@00287          V9214          7.          /*Equival�ncia em m�, referente � unidade de medida de superf�cie em V9212*/
@00294          V9021          $1.          /*Condi��o em rela��o ao empreendimento do grupamento agr�cola*/
@00295          V9022          $1.          /*Parceria contratada neste trabalho*/
@00296          V9023          $1.          /*Forma contratada de pagamento pelo uso do bem, m�vel ou im�vel, arrendado para o empreendimento*/
@00297          V9024          $1.          /*Assumiu, previamente, o compromisso de vender uma parte da produ��o principal do empreendimento no per�odo de refer�ncia de 365 dias*/
@00298          V9025          $1.          /*Vendeu alguma parte da produ��o principal do empreendimento no per�odo de refer�ncia de 365 dias*/
@00299          V9026          $1.          /*Comprador que adquiriu a totalidade, ou a maior parte, da produ��o principal do empreendimento que foi vendida no per�odo de refer�ncia de 365 dias.*/
@00300          V9027          $1.          /*Algum tipo de produ��o desenvolvida no empreendimento foi consumida como alimenta��o pelos membros da unidade domiciliar no m�s de refer�ncia*/
@00301          V9028          $1.          /*Parcela da alimenta��o consumida pelos membros da unidade domiciliar, no m�s de refer�ncia, que foi retirada de produ��o desenvolvida no empreendimento*/
@00302          V90281          $1.          /*Algum morador deste domic�lio recebeu financiamento de algum programa de cr�dito para produ��o */
@00303          V90282          $1.          /*Esse financiamento de cr�dito foi do Programa Nacional de Fortalecimento da Agricultura Familiar- PRONAF*/
@00304          V90283          $1.          /*Recebeu alguma assist�ncia t�cnica */
@00305          V90284          $1.          /*Essa assist�ncia t�cnica foi prestada por:*/
@00306          V90285          $1.          /*Recebeu sementes ou insumos de algum programa de distribui��o gratuita para a produ��o desse trabalho*/
@00307          V9029          $1.          /*Posi��o na ocupa��o no trabalho principal da semana de refer�ncia*/
@00308          V9030          $1.          /*A jornada normal desse trabalho estava totalmente compreendida no per�odo de 5 horas da manh� �s 10 horas da noite*/
@00309          V9031          $1.          /*A jornada normal desse trabalho estava totalmente compreendida no per�odo noturno de 10 horas da noite �s 5 horas da manh� seguinte*/
@00310          V9032          $1.          /*Setor do emprego no trabalho principal da semana de refer�ncia*/
@00311          V9033          $1.          /*�rea do emprego no trabalho principal da semana de refer�ncia*/
@00312          V9034          $1.          /*Era militar do Ex�rcito, Marinha de Guerra ou Aeron�utica no trabalho principal da semana de refer�ncia*/
@00313          V9035          $1.          /*Era funcion�rio p�blico estatut�rio no trabalho principal da semana de refer�ncia*/
@00314          V9036          $1.          /*Prestava servi�o dom�stico remunerado em mais de um domic�lio, no m�s de refer�ncia*/
@00315          V9037          $1.          /*Exercia habitualmente esse trabalho pelo menos uma vez por semana*/
@00316          V9038          $1.          /*N�mero de dias por semana que, habitualmente, prestava servi�o dom�stico remunerado*/
@00317          V9039          $1.          /*N�mero de dias por m�s que, habitualmente, prestava servi�o dom�stico remunerado*/
@00318          V9040          $1.          /*N�mero de pessoas ocupadas, no m�s de refer�ncia, no empreendimento do trabalho principal da semana de refer�ncia*/
@00319          V9041          $1.          /*Forma contratada, verbalmente ou por escrito, para o c�lculo da remunera��o no trabalho principal da semana de refer�ncia*/
@00320          V9042          $1.          /*Tinha carteira de trabalho assinada no trabalho principal da semana de refer�ncia */
@00321          V9043          $1.          /*Recebeu aux�lio para moradia no m�s de refer�ncia*/
@00322          V9044          $1.          /*Recebeu aux�lio para alimenta��o no m�s de refer�ncia*/
@00323          V9045          $1.          /*Recebeu aux�lio para transporte no m�s de refer�ncia*/
@00324          V9046          $1.          /*Recebeu aux�lio para educa��o ou creche no m�s de refer�ncia*/
@00325          V9047          $1.          /*Recebeu aux�lio para sa�de ou reabilita��o no m�s de refer�ncia*/
@00326          V9048          $1.          /*N�mero de empregados, no m�s de refer�ncia, no empreendimento do trabalho principal da semana de refer�ncia*/
@00327          V9049          $1.          /*Tinha pelo menos um s�cio ocupado, no m�s de refer�ncia, no empreendimento do trabalho principal da semana de refer�ncia*/
@00328          V9050          $1.          /*N�mero de s�cios ocupados, no m�s de refer�ncia, no empreendimento do trabalho principal da semana de refer�ncia*/
@00329          V9051          $1.          /*Tinha pelo menos um trabalhador n�o remunerado, no m�s de refer�ncia, no trabalho principal da semana de refer�ncia*/
@00330          V9052          $1.          /*N�mero de trabalhadores n�o remunerados ocupados, no m�s de refer�ncia, no trabalho principal da semana de refer�ncia*/
@00331          V90521          $1.          /*Era cadastrado no programa microempreendedor individual (MEI) */
@00332          V90522          $1.          /* O pagamento do INSS e das taxas municipais e estaduais foi feito por meio do Documento de Arrecada��o do Simples Nacional (DAS) */
@00333          V90523          $1.          /*Buscou empr�stimo de microcr�dito em alguma institui��o financeira */
@00334          V90524          $1.          /*Conseguiu obter o microcr�dito que procurou*/
@00335          V90525          $1.          /*Recebeu alguma assist�ncia t�cnica para esse trabalho*/
@00336          V90526          $1.          /*Essa assist�ncia t�cnica foi prestada por*/
@00337          V9531          $1.          /*C�digo 1 - recebia normalmente rendimento mensal em dinheiro, no m�s de refer�ncia, no trabalho principal da semana de refer�ncia*/
@00338          V9532          12.          /*Rendimento mensal em dinheiro que recebia normalmente, no m�s de refer�ncia, no trabalho principal da semana de refer�ncia*/
@00350          V9534          $1.          /*C�digo 3 - recebia normalmente rendimento mensal em produtos ou mercadorias, no m�s de refer�ncia, no trabalho principal da semana de refer�ncia*/
@00351          V9535          12.          /*Rendimento mensal em valor dos produtos ou mercadorias que recebia normalmente, no m�s de refer�ncia, no trabalho principal da semana de refer�ncia*/
@00363          V9537          $1.          /*C�digo 5 - recebia normalmente rendimento mensal somente em benef�cios, no m�s de refer�ncia, no trabalho principal da semana de refer�ncia*/
@00364          V90531          $1.          /*O empreendimento tem registro no Cadastro Nacional de Pessoa Jur�dica - CNPJ*/
@00365          V90532          $1.          /*Esse empreendimento possu�a fatura ou nota fiscal para emitir aos clientes*/
@00366          V90533          $1.          /*Esse empreendimento entregava contracheque a seus funcion�rios*/
@00367          V9054          $1.          /*Tipo de estabelecimento ou onde era exercido o trabalho principal da semana de refer�ncia*/
@00368          V9055          $1.          /*Morava em domic�lio que estava no mesmo terreno ou �rea do estabelecimento em que tinha trabalho*/
@00369          V9056          $1.          /*Ia direto do domic�lio em que morava para o trabalho*/
@00370          V9057          $1.          /*Tempo de percurso di�rio de ida da resid�ncia para o local de trabalho*/
@00371          V9058          2.          /*N�mero de horas habitualmente trabalhadas por semana no trabalho principal da semana de refer�ncia*/
@00373          V9059          $1.          /*Era contribuinte para instituto de previd�ncia no trabalho principal da semana de refer�ncia*/
@00374          V9060          $1.          /*Instituto de previd�ncia para o qual contribu�a no trabalho principal da semana de refer�ncia*/
@00375          V9611          2.          /*N�mero de anos no trabalho principal da semana de refer�ncia, contados at� a data de refer�ncia*/
@00377          V9612          2.          /*N�mero de meses no trabalho principal da semana de refer�ncia, contados at� a data de refer�ncia*/
@00379          V9062          $1.          /*Saiu de algum trabalho no per�odo de capta��o de 358 dias*/
@00380          V9063          $1.          /*De quantos trabalhos saiu no per�odo de capta��o de 358 dias*/
@00381          V9064          2.          /*N�mero de meses que permaneceu nesse trabalho anterior no per�odo de capta��o de 358 dias*/
@00383          V9065          $1.          /*Era empregado com carteira de trabalho assinada nesse trabalho anterior*/
@00384          V9066          $1.          /*Recebeu seguro-desemprego depois que saiu desse emprego anterior*/
@00385          V9067          $1.          /*Teve algum trabalho no per�odo de capta��o de 358 dias*/
@00386          V9068          $1.          /*Exerceu tarefas em cultivo, pesca ou cria��o de animais, destinados � pr�pria alimenta��o das pessoas moradoras no domic�lio, no per�odo de capta��o de 358 dias*/
@00387          V9069          $1.          /*Exerceu tarefas em constru��o de pr�dio, c�modo, po�o ou outras obras de constru��o, destinadas ao pr�prio uso das pessoas moradoras no domic�lio, no per�odo de capta��o de 358 dias*/
@00388          V9070          $1.          /*De quantos trabalhos saiu no per�odo de capta��o de 358 dias*/
@00389          V9971          $4.          /*C�digo da ocupa��o no trabalho anterior do per�odo de capta��o de 358 dias */
@00393          V9972          $5.          /*C�digo da atividade principal do empreendimento no trabalho anterior do per�odo de capta��o de 358 dias*/
@00398          V9073          $2.          /*Posi��o na ocupa��o no trabalho anterior do per�odo de capta��o de 358 dias*/
@00400          V9074          $1.          /*Nesse emprego anterior recebia do empregador alguma �rea para produ��o particular*/
@00401          V9075          $1.          /*Nesse emprego anterior tinha parceria com o empregador*/
@00402          V9076          $1.          /*Condi��o em rela��o ao empreendimento agr�cola nesse trabalho anterior*/
@00403          V9077          $1.          /*Posi��o na ocupa��o nesse trabalho anterior*/
@00404          V9078          $1.          /*Setor do emprego nesse trabalho anterior*/
@00405          V9079          $1.          /*�rea do emprego nesse trabalho anterior*/
@00406          V9080          $1.          /*Era militar do Ex�rcito, Marinha de Guerra ou Aeron�utica nesse trabalho anterior*/
@00407          V9081          $1.          /*Era funcion�rio p�blico estatut�rio nesse trabalho anterior*/
@00408          V9082          $1.          /*Prestava servi�o dom�stico remunerado em mais de um domic�lio nos �ltimos 30 dias em que esteve nesse trabalho anterior*/
@00409          V9083          $1.          /*Tinha carteira de trabalho assinada nesse trabalho anterior*/
@00410          V9084          $1.          /*Ap�s sair desse emprego anterior, recebeu seguro-desemprego*/
@00411          V9085          $1.          /*Era contribuinte de instituto de previd�ncia por esse trabalho anterior*/
@00412          V9861          2.          /*N�mero de anos nesse trabalho anterior*/
@00414          V9862          2.          /*N�mero de meses nesse trabalho anterior*/
@00416          V9087          $1.          /*Era associado a algum sindicato no m�s de refer�ncia*/
@00417          V9088          $1.          /*Tipo de sindicato*/
@00418          V9891          $1.          /*Faixa de idade em que come�ou a trabalhar*/
@00419          V9892          2.          /*Idade com que come�ou a trabalhar*/
@00421          V9990          $4.          /*C�digo da ocupa��o no trabalho secund�rio da semana de refer�ncia*/
@00425          V9991          $5.          /*C�digo da atividade principal do empreendimento no trabalho secund�rio da semana de refer�ncia*/
@00430          V9092          $1.          /*Posi��o na ocupa��o no trabalho secund�rio da semana de refer�ncia*/
@00431          V9093          $1.          /*Setor do emprego nesse trabalho secund�rio*/
@00432          V9094          $1.          /*�rea do emprego nesse trabalho secund�rio*/
@00433          V9095          $1.          /*Era militar do Ex�rcito, Marinha de Guerra ou Aeron�utica nesse trabalho secund�rio*/
@00434          V9096          $1.          /*Era funcion�rio p�blico estatut�rio nesse trabalho secund�rio*/
@00435          V9097          $1.          /*Tinha carteira de trabalho assinada nesse trabalho secund�rio */
@00436          V9981          $1.          /*C�digo 2 - recebia normalmente rendimento mensal em dinheiro, no m�s de refer�ncia, nesse trabalho secund�rio*/
@00437          V9982          12.          /*Rendimento mensal em dinheiro que recebia normalmente, no m�s de refer�ncia, nesse trabalho secund�rio*/
@00449          V9984          $1.          /*C�digo 4 - recebia normalmente rendimento mensal em produtos ou mercadorias, no m�s de refer�ncia, nesse trabalho secund�rio*/
@00450          V9985          12.          /*Rendimento mensal em valor dos produtos ou mercadorias que recebia normalmente, no m�s de refer�ncia, nesse trabalho secund�rio*/
@00462          V9987          $1.          /*C�digo 6 - recebia normalmente rendimento mensal somente em benef�cios, no m�s de refer�ncia, nesse trabalho secund�rio*/
@00463          V9099          $1.          /*Era contribuinte de instituto de previd�ncia nesse trabalho secund�rio*/
@00464          V9100          $1.          /*Instituto de previd�ncia para o qual contribu�a nesse emprego secund�rio*/
@00465          V9101          2.          /*N�mero de horas habitualmente trabalhadas por semana nesse trabalho secund�rio*/
@00467          V1021          $1.          /*C�digo 2 - recebia normalmente rendimento mensal em dinheiro, no m�s de refer�ncia, no(s) outro(s) trabalho(s) da semana de refer�ncia*/
@00468          V1022          12.          /*Rendimento mensal em dinheiro que recebia normalmente, no m�s de refer�ncia, no(s) outro(s) trabalho(s) da semana de refer�ncia*/
@00480          V1024          $1.          /*C�digo 4 - recebia normalmente rendimento mensal em produtos ou mercadorias, no m�s de refer�ncia, no(s) outro(s) trabalho(s) da semana de refer�ncia*/
@00481          V1025          12.          /*Rendimento mensal em valor dos produtos ou mercadorias que recebia normalmente, no m�s de refer�ncia, no(s) outro(s) trabalho(s) da semana de refer�ncia*/
@00493          V1027          $1.          /*C�digo 6 - recebia normalmente rendimento mensal somente em benef�cios no m�s de refer�ncia, no(s) outro(s) trabalho(s) da semana de refer�ncia*/
@00494          V1028          $1.          /*C�digo 8 - era trabalhador n�o remunerado, no m�s de refer�ncia, no(s) outro(s) trabalho(s) da semana de refer�ncia*/
@00495          V9103          $1.          /*Era contribuinte de instituto de previd�ncia, por esse(s) outro(s) trabalho(s) da semana de refer�ncia*/
@00496          V9104          $1.          /*Instituto de previd�ncia para o qual contribu�a nesse(s) outro(s) trabalho(s) da semana de refer�ncia*/
@00497          V9105          2.          /*N�mero de horas habitualmente trabalhadas por semana nesse(s) outro(s) trabalho(s) da semana de refer�ncia*/
@00499          V9106          $1.          /*Teve algum trabalho antes do per�odo de refer�ncia de 365 dias*/
@00500          V9107          $1.          /*Exerceu tarefas em cultivo, pesca ou cria��o de animais, destinados � pr�pria alimenta��o das pessoas moradoras no domic�lio, antes do per�odo de refer�ncia de 365 dias*/
@00501          V9108          $1.          /*Exerceu tarefas em constru��o de pr�dio, c�modo, po�o ou outras obras de constru��o, destinadas ao pr�prio uso das pessoas moradoras no domic�lio,  antes do per�odo de refer�ncia de 365 dias*/
@00502          V1091          2.          /*N�mero de anos, contados at� a data de refer�ncia, desde que saiu do �ltimo trabalho*/
@00504          V1092          2.          /*N�mero de meses, contados at� a data de refer�ncia, desde que saiu do �ltimo trabalho*/
@00506          V9910          $4.          /*C�digo da ocupa��o no �timo trabalho que teve no per�odo de refer�ncia de menos de 4 anos*/
@00510          V9911          $5.          /*C�digo da atividade principal do empreendimento nesse �ltimo trabalho que teve no per�odo de refer�ncia de menos de 4 anos*/
@00515          V9112          $1.          /*Posi��o na ocupa��o no �ltimo trabalho no per�odo de refer�ncia de menos de 4 anos*/
@00516          V9113          $1.          /*Era militar ou funcion�rio p�blico estatut�rio nesse �ltimo trabalho */
@00517          V9114          $1.          /*Tinha carteira de trabalho assinada nesse �ltimo trabalho */
@00518          V9115          $1.          /*Tomou alguma provid�ncia para conseguir trabalho na semana de refer�ncia*/
@00519          V9116          $1.          /*Tomou alguma provid�ncia para conseguir trabalho no per�odo de capta��o de 23 dias*/
@00520          V9117          $1.          /*Tomou alguma provid�ncia para conseguir trabalho no per�odo de capta��o de 30 dias*/
@00521          V9118          $1.          /*Tomou alguma provid�ncia para conseguir trabalho no per�odo de capta��o de 305 dias*/
@00522          V9119          $1.          /*�ltima provid�ncia que tomou para conseguir trabalho no per�odo de refer�ncia de 365 dias*/
@00523          V9120          $1.          /*Era contribuinte de alguma entidade de previd�ncia privada, no m�s de refer�ncia*/
@00524          V9121          $1.          /*Cuidava dos afazeres dom�sticos na semana de refer�ncia*/
@00525          V9921          2.          /*N�mero de horas que dedicava normalmente por semana aos afazeres dom�sticos*/
@00527          V9122          $1.          /*Era aposentado de instituto de previd�ncia federal (INSS), estadual ou municipal ou do governo federal na semana de refer�ncia*/
@00528          V9123          $1.          /*Era pensionista de instituto de previd�ncia federal (INSS), estadual ou municipal ou do governo federal na semana de refer�ncia*/
@00529          V9124          $1.          /*Recebia normalmente rendimento que n�o era proveniente de trabalho (pens�o aliment�cia ou de fundo de pens�o, abono de perman�ncia, aluguel, doa��o, juros de caderneta de poupan�a, dividendos ou outro qualquer) no m�s de refer�ncia*/
@00530          V1251          $2.          /*C�digo 01 - recebia normalmente rendimento de aposentadoria de instituto de previd�ncia ou do governo federal, no m�s de refer�ncia*/
@00532          V1252          12.          /*Rendimento de aposentadoria de instituto de previd�ncia ou do governo federal que recebia, normalmente, no m�s de refer�ncia*/
@00544          V1254          $2.          /*C�digo 02 - recebia normalmente rendimento de pens�o de instituto de previd�ncia ou do governo federal, no m�s de refer�ncia*/
@00546          V1255          12.          /*Rendimento de pens�o de instituto de previd�ncia ou do governo federal que recebia, normalmente, no m�s de refer�ncia*/
@00558          V1257          $2.          /*C�digo 03 - recebia normalmente rendimento de outro tipo de aposentadoria, no m�s de refer�ncia*/
@00560          V1258          12.          /*Rendimento de outro tipo de aposentadoria que recebia, normalmente, no m�s de refer�ncia*/
@00572          V1260          $2.          /*C�digo 04 - recebia normalmente rendimento de outro tipo de pens�o, no m�s de refer�ncia*/
@00574          V1261          12.          /*Rendimento de outro tipo de pens�o que recebia, normalmente, no m�s de refer�ncia*/
@00586          V1263          $2.          /*C�digo 05 - recebia normalmente rendimento de abono de perman�ncia, no m�s de refer�ncia*/
@00588          V1264          12.          /*Rendimento de abono de perman�ncia que recebia, normalmente, no m�s de refer�ncia*/
@00600          V1266          $2.          /*C�digo 06 - recebia normalmente rendimento de aluguel, no m�s de refer�ncia*/
@00602          V1267          12.          /*Rendimento de aluguel que recebia, normalmente, no m�s de refer�ncia*/
@00614          V1269          $2.          /*C�digo 07 - recebia normalmente rendimento de doa��o de n�o morador, no m�s de refer�ncia*/
@00616          V1270          12.          /*Rendimento de doa��o de n�o morador que recebia, normalmente, no m�s de refer�ncia*/
@00628          V1272          $2.          /*C�digo 08 - recebia normalmente juros de caderneta de poupan�a ou de outras aplica��es financeiras, dividendos, programas sociais ou outros rendimentos, no m�s de refer�ncia*/
@00630          V1273          12.          /*Juros de caderneta de poupan�a e de outras aplica��es financeiras, dividendos, programas sociais e outros rendimentos que recebia, normalmente, no m�s de refer�ncia*/
@00642          V9126          $1.          /*O informante desta parte foi*/
@00643          V1101          $1.          /*Teve algum filho nascido vivo at� a data de refer�ncia*/
@00644          V1141          $2.          /*N�mero de filhos tidos, do sexo masculino, que moravam no domic�lio*/
@00646          V1142          $2.          /*N�mero de filhos tidos, do sexo feminino, que moravam no domic�lio*/
@00648          V1151          $2.          /*N�mero de filhos tidos, do sexo masculino, ainda vivos que moravam em outro local qualquer*/
@00650          V1152          $2.          /*N�mero de filhos tidos, do sexo feminino, ainda vivos que moravam em outro local qualquer*/
@00652          V1153          $1.          /*C�digo 5 - N�o sabe o n�mero de filhos tidos, do sexo masculino, que moravam em outro local qualquer*/
@00653          V1154          $1.          /*C�digo 7 - N�o sabe o n�mero de filhos tidos, do sexo feminino, que moravam em outro local qualquer*/
@00654          V1161          $2.          /*N�mero de filhos tidos, do sexo masculino, que morreram*/
@00656          V1162          $2.          /*N�mero de filhos tidos, do sexo feminino, que morreram*/
@00658          V1163          $1.          /*C�digo 6 - N�o sabe o n�mero de filhos tidos, do sexo masculino, que j� morreram*/
@00659          V1164          $1.          /*C�digo 8 - N�o sabe o n�mero de filhos tidos, do sexo feminino, que j� morreram*/
@00660          V1107          $1.          /*Sexo do �ltimo filho tido nascido vivo at� a data de refer�ncia*/
@00661          V1181          $2.          /*M�s de nascimento do �ltimo filho tido nascido vivo*/
@00663          V1182          $4.          /*Ano de nascimento do �ltimo filho tido nascido vivo*/
@00667          V1109          $1.          /*O �ltimo filho tido nascido vivo ainda estava vivo na data de refer�ncia*/
@00668          V1110          $1.          /*Teve algum filho, com 7 meses ou mais de gesta��o, que nasceu morto at� a data de refer�ncia*/
@00669          V1111          $2.          /*N�mero de filhos tidos nascidos mortos, do sexo masculino, at� a data de refer�ncia*/
@00671          V1112          $2.          /*N�mero de filhos tidos nascidos mortos, do sexo feminino, at� a data de refer�ncia*/
@00673          V1113          $1.          /*C�digo 5 - N�o sabe o n�mero de filhos tidos nascidos mortos, do sexo masculino, at� a data de refer�ncia*/
@00674          V1114          $1.          /*C�digo 7 - N�o sabe o n�mero de filhos tidos nascidos mortos, do sexo feminino, at� a data de refer�ncia*/
@00675          V1115          $1.          /*O informante desta parte foi*/
@00676          V4801          $2.          /*N�vel de ensino, dura��o do ensino fundamental e s�rie que frequentavam (todos os estudantes)*/
@00678          V4802          $2.          /*N�vel de ensino e grupos de s�ries do ensino fundamental que frequentavam (todos os estudantes)*/
@00680          V4803          $2.          /*Anos de estudo (todas as pessoas)*/
@00682          V4704          $1.          /*Condi��o de atividade*/
@00683          V4805          $1.          /*Condi��o de ocupa��o no per�odo de refer�ncia de 365 dias*/
@00684          V4706          $2.          /*Posi��o na ocupa��o no trabalho principal*/
@00686          V4707          $1.          /*Horas habitualmente trabalhadas por semana em todos os trabalhos*/
@00687          V4808          $1.          /*Atividade principal do empreendimento do trabalho principal */
@00688          V4809          $2.          /*Grupamentos de atividade principal do empreendimento do trabalho principal */
@00690          V4810          $2.          /*Grupamentos ocupacionais do trabalho principal*/
@00692          V4711          $1.          /*Contribui��o para instituto de previd�ncia em qualquer trabalho */
@00693          V4812          $1.          /*Atividade principal do empreendimento no trabalho principal do per�odo de refer�ncia de 365 dias*/
@00694          V4713          $1.          /*Condi��o de atividade no trabalho principal do per�odo de refer�ncia de 365 dias*/
@00695          V4814          $1.          /*Condi��o de ocupa��o no per�odo de refer�ncia de 365 dias*/
@00696          V4715          $2.          /*Posi��o na ocupa��o no trabalho principal do per�odo de refer�ncia de 365 dias*/
@00698          V4816          $2.          /*Grupamentos de atividade no trabalho principal do per�odo de refer�ncia de 365 dias*/
@00700          V4817          $2.          /*Grupamentos ocupacionais do trabalho principal do per�odo de refer�ncia de 365 dias*/
@00702          V4718          12.          /*Rendimento mensal do trabalho principal para pessoas de 10 anos ou mais de idade*/
@00714          V4719          12.          /*Rendimento mensal de todos os trabalhos para pessoas de 10 anos ou mais de idade*/
@00726          V4720          12.          /*Rendimento mensal de todas as fontes para pessoas de 10 anos ou mais de idade*/
@00738          V4721          12.          /*Rendimento mensal domiciliar*/
@00750          V4722          12.          /*Rendimento mensal familiar */
@00762          V4723          $2.          /*Tipo de fam�lia*/
@00764          V4724          $2.          /*N�mero de componentes da fam�lia */
@00766          V4727          $1.          /*C�digo de �rea censit�ria*/
@00767          V4728          $1.          /*C�digo de situa��o censit�ria*/
@00768          V4729          5.          /*Peso da pessoa*/
@00773          V4732          5.          /*Peso da fam�lia*/
@00778          V4735          $1.          /*Controle da tabula��o de fecundidade, para mulheres com 10 anos ou mais de idade*/
@00779          V4838          $1.          /*Grupos de anos de estudo*/
@00780          V6502          $1.          /*Crian�a de 5 a 17 anos de idade*/
@00781          V4741          2.          /*N�mero de componentes do dom�cilio */
@00783          V4742          12.          /*Rendimento mensal domiciliar per capita */
@00795          V4743          $2.          /*Faixa de rendimento mensal domiciliar per capita */
@00797          V4745          $1.          /*N�vel de instru��o mais elevado alcan�ado*/
@00798          V4746          $1.          /*Situa��o de ocupa��o na semana de refer�ncia das pessoas de 5 anos ou mais de idade*/
@00799          V4747          $1.          /*Atividade principal do empreendimento do trabalho principal */
@00800          V4748          $1.          /*Atividade principal do empreendimento do trabalho principal do per�odo de refer�ncia de 365 dias*/
@00801          V4749          $1.          /*Situa��o de ocupa��o no per�odo de refer�ncia de 365 dias das pessoas de 5 anos ou mais de idade*/
@00802          V4750          12.          /*Rendimento mensal familiar per capita */
@00814          V9993          $8.          /*data de gera��o do arquivo*/

;
run;
