//refresh HTML on radio control change
$(function() {
	$("input:radio, select, input:checkbox").change(function(event) {
		var itemname = event.target.name;
		var itemval = event.target.value;
		var itemid = event.target.id;
		
		var data = $("form").serialize();
		data += ($('#newfilename').val())?'&file=' + $('#newfilename').val(): '';

		$.ajax({
			type: "GET",
			url: "ajax.php",
			data: data,
			success: function (html) {    
				//add the content retrieved from ajax and put it in the #content div  
				$('#front-ads').html(html); 
				if (itemtype == 'radio') $('#'+ itemid).attr('checked', 'checked').button('refresh');       
			}
		});
		return false;
	});
});


// Setup jQuery UI interface elements
$(function() {
	$( ":input#banner-top" ).button({ icons: {primary:'ui-icon-arrowthick-1-n'}, text: false });	
	$( ":input#banner-right" ).button({ icons: {primary:'ui-icon-arrowthick-1-e'}, text: false });	
	$( ":input#banner-left" ).button({ icons: {primary:'ui-icon-arrowthick-1-w'}, text: false });	
	$( ":input#banner-bottom" ).button({ icons: {primary:'ui-icon-arrowthick-1-s'}, text: false });	
	$( ":input#banner-none" ).button({ icons: {primary:'ui-icon-close'}, text: false });	
	
	$( ":input#titlealign-center" ).button({ icons: {primary:'ui-icon-arrowthick-2-e-w'}, text: false });	
	$( ":input#titlealign-right" ).button({ icons: {primary:'ui-icon-arrowthick-1-e'}, text: false });	
	$( ":input#titlealign-left" ).button({ icons: {primary:'ui-icon-arrowthick-1-w'}, text: false });
	
	$( ":input#textalign-center" ).button({ icons: {primary:'ui-icon-arrowthick-2-e-w'}, text: false });	
	$( ":input#textalign-right" ).button({ icons: {primary:'ui-icon-arrowthick-1-e'}, text: false });	
	$( ":input#textalign-left" ).button({ icons: {primary:'ui-icon-arrowthick-1-w'}, text: false });
	
	$('#bgblack').buttonset();
	$('#bgwhite').buttonset();
	$('#bgorange').buttonset();
	
	//toggle code box
	$('.toggle').next('div').hide();
	$('.toggle').click(function(){
		$(this).next('div').toggle();
	});
});


//create a bitly short url for the design. 
//TODO: Serializing is not submitting the full string. the submitted url is truncated.
$(function(){
	$("#sharelink").click(function() {
		
		// set up default options
		var myUrl = 'http://' + window.location.hostname + window.location.pathname + '?' + $("form input:not(#sharelinktext):not(#max_file_size):not(#submitted)").serialize();
		var defaults = {
			version:    '2.0.1',
			login:      'benklocek',
			apiKey:     'R_30aae6e09e5f384d0b8592b0efeac07a',
			history:    '0',
			longUrl:    encodeURIComponent(myUrl)
		};
		// Build the URL to query
		var daurl = "http://api.bit.ly/shorten?"
		+"version="+defaults.version
		+"&longUrl="+defaults.longUrl
		+"&login="+defaults.login
		+"&apiKey="+defaults.apiKey
		+"&history="+defaults.history
		+"&format=json&callback=?";
		// Utilize the bit.ly API
		$.getJSON(daurl, function(data,longUrl){
			// Make a good use of short URL
			//console.log(data.results[myUrl]);
			$('#sharelinktext').val(data.results[myUrl].shortUrl);
		});
		return false;
	});
});


/*
Slideshow rotator. Used for testing how ads work if HTML. 
NOTE: we decided to go with taking a screen shot and using that, since the webfonts
were horrible on Windows
*/

/*
$(function() {
	$('#front-ads').after('<ul id="banner-nav">').cycle({
		speed:  1000, 		//speed of the transition (any valid jquery fx speed value) 
		timeout: 4500, 	//milliseconds between slide transitions
		slideExpr: 'div.largefeature',
		pager: '#banner-nav',
		pauseOnPagerHover: true,
		pause:  1, // true to enable "pause on hover" 
		// callback fn that creates a link to use as the pager anchor 
		pagerAnchorBuilder: function(idx, slide) { 
			return '<li><a href="#">&bull;</a></li>'; 
		}
	});
});
// redefine Cycle's updateActivePagerLink function 
$.fn.cycle.updateActivePagerLink = function(pager, currSlideIndex) { 
	$(pager).find('li').removeClass('activeLI') 
	.filter('li:eq('+currSlideIndex+')').addClass('activeLI'); 
};*/
