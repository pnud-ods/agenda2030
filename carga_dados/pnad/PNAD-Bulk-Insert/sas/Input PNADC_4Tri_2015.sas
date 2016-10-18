/* PROGRAMA DE LEITURA EM SAS DO ARQUIVO DE MICRODADOS DA PNAD CONT�NUA */

/* Obs.1: As duas primeiras posi��es da UPA (Unidade Prim�ria de Amostragem) s�o o c�digo da UF (Unidade da Federa��o)

   Obs.2: Ajuste o endere�o do arquivo \PNADC_xxxx.txt no comando INFILE */


data pnadc_xxxxxx;
infile "...\Dados\PNADC_xxxxxx.txt" lrecl=324 Missover;
input
@0001 Ano         $4.    /* Ano de refer�ncia                 */
@0005 Trimestre   $1.    /* Trimestre de refer�ncia           */
@0006 UF          $2.    /* Unidade da Federa��o              */
@0008 Capital     $2.    /* Munic�pio da Capital              */
@0010 RM_RIDE     $2.    /* Reg. Metr. e Reg. Adm. Int. Des.  */
@0012 UPA         $9.    /* Unidade Prim�ria de Amostragem    */
@0021 Estrato     $7.    /* Estrato                           */
@0028 V1008       $2.    /* N�mero de sele��o do domic�lio    */
@0030 V1014       $2.    /* Painel                            */
@0032 V1023       $1.    /* Tipo de �rea                      */
@0033 V1027       15.8   /* Peso SEM p�s estratifica��o       */
@0048 V1028       15.8   /* Peso COM p�s estratifica��o       */
@0063 V1029        9.    /* Proje��o da popula��o             */
@0072 posest      $3.    /* Dom�nios de proje��o              */
@0075 V2001        2.    /* N�mero de pessoas no domic�lio    */
@0077 V2003       $2.    /* N�mero de ordem                   */
@0079 V2005       $2.    /* Condi��o no domic�lio             */
@0081 V2007       $1.    /* Sexo                              */
@0082 V2008       $2.    /* Dia de nascimento                 */
@0084 V20081      $2.    /* M�s de nascimento                 */
@0086 V20082      $4.    /* Ano de nascimento                 */
@0090 V2009        3.    /* Idade na data de refer�ncia       */
@0093 V3001       $1.    /* Sabe ler e escrever               */
@0094 V3002       $1.    /* Frequenta escola                  */
@0095 V3002A      $1.    /* A escola que ... frequenta � de   */
@0096 V3003A      $2.    /* Qual � o curso que frequenta      */
@0098 V3004       $1.    /* Dura��o deste curso que requenta  */
@0099 V3005A      $1.    /* Curso que freq � organizado em:   */
@00100 V3006      $2.    /* Qual � o ano/s�rie que  frequenta */
@00102 V3007      $1.    /* Concluiu outro curso de gradua��o */
@00103 V3008      $1.    /* Anteriormente frequentou escola   */
@00104 V3009A     $2.    /* Curso mais elevado que frequentou */
@00106 V3010      $1.    /* Dura��o do curso que frequentou   */
@00107 V3011A     $1.    /* Curso que freq � organizado em:   */
@00108 V3012      $1.    /* Aprovado na prim. s�rie do curso  */
@00109 V3013      $2.    /* �ltimo ano/s�rie que concluiu     */
@00111 V3014      $1.    /* Concluiu o curso que frequentou   */
@00112 V4001      $1.    /* Trabalhou 1 hr em ativ. remunerd. */
@00113 V4002      $1.    /* Trabalhou 1 hr em produtos etc... */
@00114 V4003      $1.    /* Fez algum bico pelo menos de 1 hr */
@00115 V4004      $1.    /* Ajudou sem receber no domic. 1 hr */
@00116 V4005      $1.    /* Afastado trabalho remunerado      */
@00117 V4006A     $1.    /* Motivo de estar afastado          */
@00118 V4008      $1.    /* Quanto tempo que estava afastado  */
@00119 V40081     $2.    /* Tempo de afastamenento at� 1 ano  */
@00121 V40082     $2.    /* Tempo de afastamen. de 1 a 2 anos */
@00123 V40083     $2.    /* Tempo de afastamen. mais d 2 anos */
@0125 V4009       $1.    /* Quantos trabalhos tinhana semana  */
@0126 V4010       $4.    /* Ocupa��o no trab. principal       */
@0130 V4012       $1.    /* Posi��o na ocupa��o               */
@0131 V40121      $1.    /* Tipo trabalhador n�o remunerado   */
@0132 V4013       $5.    /* Atividade no trab. principal      */
@0137 V40132A     $1.    /* Se��o da atividade                */
@0138 V4028       $1.    /* Servidor p�blico estatut�rio      */
@0139 V4029       $1.    /* Carteira de trabalho assinada     */
@0140 V4033       $1.    /* Rendimento habitual var. auxil.   */
@0141 V40331      $1.    /* Rendimento habitual em dinheiro   */
@0142 V403311     $1.    /* Faixa do valor do rendimento hab. */
@0143 V403312      8.    /* Valor do rend. hab. em dinheiro   */
@0151 V40332      $1.    /* Rendimento habitual em produtos   */
@0152 V403321     $1.    /* Faixa do valor do rendimento hab. */
@0153 V403322      8.    /* Valor do rend. hab. em produtos   */
@0161 V40333      $1.    /* Rendimento habitual em benef�cios */
@0162 V4034       $1.    /* Rendimento efetivo var. auxil.    */
@0163 V40341      $1.    /* Rendimento efetivo em dinheiro    */
@0164 V403411     $1.    /* Faixa do valor do rendimento efe. */
@0165 V403412      8.    /* Valor do rend. efe. em dinheiro   */
@0173 V40342      $1.    /* Rendimento efetivo em produtos    */
@0174 V403421     $1.    /* Faixa do valor do rendimento efe. */
@0175 V403422      8.    /* Valor do rend. efe. em produtos   */
@0183 V4050       $1.    /* Rendimento habitual var. auxil.   */
@0184 V40501      $1.    /* Rendimento habitual em dinheiro   */
@0185 V405011     $1.    /* Faixa do valor do rendimento hab. */
@0186 V405012      8.    /* Valor do rend. hab. em dinheiro   */
@0194 V40502      $1.    /* Rendimento habitual em produtos   */
@0195 V405021     $1.    /* Faixa do valor do rendimento hab. */
@0196 V405022      8.    /* Valor do rend. hab. em produtos   */
@0204 V40503      $1.    /* Rendimento habitual em benef�cios */
@0205 V4051       $1.    /* Rendimento efetivo var. auxil.    */
@0206 V40511      $1.    /* Rendimento efetivo em dinheiro    */
@0207 V405111     $1.    /* Faixa do valor do rendimento efe. */
@0208 V405112      8.    /* Valor do rend. efe. em dinheiro   */
@0216 V40512      $1.    /* Rendimento efetivo em produtos    */
@0217 V405121     $1.    /* Faixa do valor do rendimento efe. */
@0218 V405122      8.    /* Valor do rend. efe. em produtos   */
@0226 V4058       $1.    /* Rendimento habitual var. auxil.   */
@0227 V40581      $1.    /* Rendimento habitual em dinheiro   */
@0228 V405811     $1.    /* Faixa do valor do rendimento hab. */
@0229 V405812      8.    /* Valor do rend. hab. em dinheiro   */
@0237 V40582      $1.    /* Rendimento habitual em produtos   */
@0238 V405821     $1.    /* Faixa do valor do rendimento hab. */
@0239 V405822      8.    /* Valor do rend. hab. em produtos   */
@0247 V40583      $1.    /* Rendimento habitual em benef�cios */
@0248 V40584      $1.    /* N�o remunerado                    */
@0249 V4059       $1.    /* Rendimento efetivo var. auxil.    */
@0250 V40591      $1.    /* Rendimento efetivo em dinheiro    */
@0251 V405911     $1.    /* Faixa do valor do rendimento efe. */
@0252 V405912      8.    /* Valor do rend. efe. em dinheiro   */
@0260 V40592      $1.    /* Rendimento efetivo em produtos    */
@0261 V405921     $1.    /* Faixa do valor do rendimento efe. */
@0262 V405922      8.    /* Valor do rend. efe. em produtos   */
@0270 V4071       $1.    /* Provid�ncia p/ conseg. trab.(30d) */
@0271 V4072A      $1.    /* Principal provid. p/conseg. trab. */
@0272 V4073       $1.    /* Gostaria de ter trabalhado        */
@0273 V4074A      $2.    /* Motivo de n�o ter tomado provid.  */
@0275 V4077       $1.    /* Poderia ter come�ado a trabalhar  */
@0276 V4078A      $1.    /* Motivo p/� querer/come�ar a trab. */
@0277 VD2003       2.    /* N�mero de componentes do domic.   */
@0279 VD3001      $1.    /* N�vel de instru��o                */
@0280 VD4001      $1.    /* Condi��o em rela��o for�a d trab. */
@0281 VD4002      $1.    /* Condi��o de ocupa��o              */
@0282 VD4007      $1.    /* Posi��o na ocupa��o trab. princ.  */
@0283 VD4008      $1.    /* Posi��o na ocupa��o trab. princ.  */
@0284 VD4009      $2.    /* Posi��o na ocupa��o trab. princ.  */
@0286 VD4010      $2.    /* Grupamen. d ativid. trab. princ.  */
@0288 VD4011      $2.    /* Grupamen. ocupacion. trab. Princ. */
@0290 VD4015      $1.    /* Tipo d remunera��o trab. princ.   */
@0291 VD4016       8.    /* Rendim. habitual trab. princ.     */
@0299 VD4017       8.    /* Rendim. efetivo trab. princ.      */
@0307 VD4018      $1.    /* Tipo d remunera��o em qq trabalho */
@0308 VD4019       8.    /* Rendim. habitual qq trabalho      */
@0316 VD4020       8.    /* Rendim. efetivo qq trabalho       */
@0324 VD4030      $1.    /* Pq � proc./� gost./� disp.p/trab. */;
run;



