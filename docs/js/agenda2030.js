var overElement = false;
var odsIconsLoaded = false;
var counterODSIconsLoaded = 0;

function change_aba_indicadores(aba) {

	if(aba==1) {
		$("#aba_1").addClass('active');
		$("#aba_2").removeClass('active');
		$("#indicadores_container").show();
		$("#consideracoes_meta_container").hide();
	}
	else {
		$("#aba_2").addClass('active');
		$("#aba_1").removeClass('active');
		$("#consideracoes_meta_container").show();
		$("#indicadores_container").hide();
	}

}

function openMeta(element) {

	var numero_meta = $(element).data("number");
	
	$("#container_indicadores").hide();
  	$("#container_indicadores").fadeIn(500);

  	arrows = $(".arrow_meta");

  	$("#arrow_meta_1").hide();
  	$("#arrow_meta_2").hide();
  	$("#arrow_meta_3").hide();
  	$("#arrow_meta_" + numero_meta).show();

  	$("#sub_numero_objetivo_indicador_aba").html(numero_meta);
  	

  	// $(element).find($(".arrow_meta")).show();
   
  	

}

function changeAttributes(number) {
  // alert(number);

  var titulos_ods =["", "Erradicação da Pobreza","Fome Zero e Agricultura Sustentável","Saúde e Bem Estar","Educação e Qualidade de Vida","Igualdade de Gênero","Agua Potável e Saneamento","Energia Limpa e Acessível","Trabalho Descente e Crescimento Econômico","Indústria, Inovação e Infraestrutura","Redução das Desigualdades","Cidades e Comunidades Sustentáveis","Consumo e Produção Responsáveis","Ação Contra a Mudança Global do Clima","Vida na Água","Vida Terrestre","Paz, Justiça e Instituições Eficazes","Parcerias e Meios de Implementação"] 
  var textos_ods = ["Para saber mais, selecione um ODS abaixo:","Acabar com a pobreza em todas as suas formas e em todos os lugares", "Acabar com a fome, alcançar a segurança alimentar, a melhoria da nutrição e promover a agricultura sustentável", "Assegurar uma vida saudável e promover o bem-estar para todos, em todas as idades", "Assegurar a educação inclusiva, equitativa de qualidade e promover oportunidades de aprendizagem ao longo da vida para todos", "Alcançar a igualdade de gênero e empoderar todas as mulheres e meninas", "Assegurar a disponibilidade e a gestão sustentável da água e saneamento para todos", "Assegurar o acesso confiável, sustentável, moderno e a preço acessível à energia para todos", "Promover o crescimento econômico sustentado, inclusivo e sustentável, o emprego pleno e produtivo e o trabalho decente para todos", "Construir infraestruturas resilientes, promover a industrialização inclusiva e sustentável e fomentar a inovação", "Reduzir a desigualdade dentro dos países e entre eles", "Tornar as cidades e os assentamentos humanos inclusivos, seguros, resilientes e sustentáveis", "Assegurar padrões de produção e de consumo sustentáveis", "Tomar medidas urgentes para combater a mudança do clima e seus impactos", "Conservar e promover o uso sustentável dos oceanos, dos mares e dos recursos marinhos para o desenvolvimento sustentável", "Proteger, recuperar e promover o uso sustentável dos ecossistemas terrestres, gerir de forma sustentável as florestas, combater a desertificação, deter e reverter a degradação da terra e deter a perda da biodiversidade", "Promover sociedades pacíficas e inclusivas para o desenvolvimento sustentável, proporcionar o acesso à justiça para todos e construir instituições eficazes, responsáveis e inclusivas em todos os níveis"];


  $("#call_arraste").hide();

  $("#texto_desc").hide();
    

  var numero_ods = number;

  for (var i=0;i<18;i++) {
  	 $('.arrow-down_' + i).hide();
  }

  // $('.arrow-down_' + numero_ods).show();

  // $('#container_objetivo_header').removeClass();
  // $('#container_objetivo_header').addClass('row main_background_color_' + numero_ods);

  // // $('#numero_objetivo_header').removeClass();
  // $('#numero_objetivo_header').html();
  // $('#numero_objetivo_header').html(numero_ods);
  // $('#texto_objetivo_header').html();
  // $('#texto_objetivo_header').html(titulos_ods[numero_ods-1]);

  $('#texto_descricao_objetivo').html();
  $('#texto_descricao_objetivo').html(textos_ods[numero_ods]); 


 


  $('#background_texto_descricao_objetivo').removeClass();
  $('#background_texto_descricao_objetivo').addClass('row main_background_color_' + numero_ods);
  
  if (number>0) {
  	$('#background_texto_descricao_objetivo').addClass('animated fadeIn');
  	$('#all_texto_objetivo').show();
  	 $('#texto_objetivo').html(number); 
  } else {
  	$('#all_texto_objetivo').hide();
  }
 

  // $('#quote_descricao_objetivo').removeClass();
  // $('#quote_descricao_objetivo').addClass('main_color_' + numero_ods);

  // $("#texto_desc").fadeIn(700);

  $("#body_container").hide();
  $("#body_container").fadeIn(500);


}


function changeText(text, element) {
	if(!overElement) {
		
		$(element).find(".info_text").removeClass('animated flipInX subtitle-font-bigger');
		newInfoTextElement = reset($(element).find(".info_text"));
		newInfoTextElement.html(text);
		$(newInfoTextElement).addClass('info_text animated flipInX subtitle-font');

		$(element).find(".img-circle").removeClass('animated fadeInLeft');
		newIconElement = reset($(element).find(".img-circle"));
		$(newIconElement).addClass('animated flipInY');
	}
	overElement = true;
}

function resetText(text, element) {
	overElement = false;
	$(element).find(".info_text").removeClass('animated flipInX subtitle-font');
	newInfoTextElement = reset($(element).find(".info_text"));
	$(newInfoTextElement).addClass('animated fadeIn subtitle-font-bigger');
	$(element).find(".subtitle-font-bigger").html(text);

}

function reset(elem) {
    $(elem).before($(elem).clone(true));
    var newElem;
    newElem = $(elem).prev();
    $(elem).remove();
    return $(newElem);
} // end reset()

jQuery(document).ready(function() {

	$('#background_texto_descricao_objetivo').addClass('main_background_color_0');

    $('.about-agenda-text').waypoint(function() {
	   $(this).toggleClass('animated fadeIn');
	}, { offset: 'bottom-in-view' });

 	$('.timeline-icon').waypoint(function() {
	   $(this).toggleClass('animated fadeIn');
	}, { offset: 'bottom-in-view' });

 // 	$('.ods-logo-container').waypoint(function() {
	//    	if (!odsIconsLoaded) {
	//    		$(this).toggleClass('animated zoomIn');
	//    		counterODSIconsLoaded++;
	//    		if (counterODSIconsLoaded==17)
	//    			odsIconsLoaded = true;
	//    	}	
	// }, { offset: 'bottom-in-view' });

 // 	$('.infographic_ods').waypoint(function() {
	//    $(this).toggleClass('animated slideInRight');
	// }, { offset: 'bottom-in-view' });

});

