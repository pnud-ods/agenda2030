var overElement = false;
var odsIconsLoaded = false;
var counterODSIconsLoaded = 0;

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

