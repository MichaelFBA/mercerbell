jQuery(document).ready(function ($) {

/* ========================================================================================================================

	TouchEvents

======================================================================================================================== */

$('.carousel').bind('swipeleft',function(e){
	$(this).carousel('next')
});

$('.carousel').bind('swiperight',function(e){
	$(this).carousel('prev')
});

$('#primaryCarousel').carousel({
  interval: 3000,
  pause:'hover'
})


/* ========================================================================================================================

	Youtube

======================================================================================================================== */
if( $("#player").length == 1 ){
var YTobject;

	$("#player").tubeplayer({
	    width: 940, // the width of the player
	    height: 520, // the height of the player
	    allowFullScreen: "true", // true by default, allow user to go full screen
	    initialVideo: $('#player').attr('data-youtube'), // the video that is loaded into the player
	    preferredQuality: "hd720",// preferred quality: default, small, medium, large, hd720
	    showControls: false,  
	    modestbranding: false,
	    swfobjectURL: "http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js",
	    iframed: true,
	    annotations: false,  
	    autoPlay:false,
	    onPlayerEnded: function(){
		    $('.controlDiv').removeClass('pause').addClass('replay');
	    },
	});


	//Control play / pause and elapsed
	$('.controlDiv').on('click',function(){
		YTVideo('.controlDiv');
	})

	//Controls seek
	$('.progressBar').on('click',function(e){
		YTobject = $("#player").tubeplayer("data");
		$('.controlDiv').removeClass('play replay').addClass('pause');
		$('.controlDiv').parent().addClass('playing');
		var ratio = (e.pageX-$(this).offset().left)/$(this).outerWidth();
		$('.elapsed').width(ratio*100+'%');
		jQuery("#player").tubeplayer("seek", Math.round(YTobject.duration * ratio) );
		$("#player").tubeplayer("play");
	})
	
	
	//This controls the autofading video
	var fadeout = null;
	$(".transparent").mousemove(function() {
	  $(".controlDiv.pause").fadeIn("slow");
	  
		if (fadeout != null) {
	    clearTimeout(fadeout);
	  }

	  fadeout = setTimeout(function() {
        $(".controlDiv.pause").fadeOut("slow");
    }, 1000)
	});





}


function YTVideo(e){
	var interval;
	if( $(e).hasClass('play') || $(e).hasClass('replay') ){
			// If the video is not currently playing, start it:
			$(e).removeClass('play replay').addClass('pause');
			$(e).parent().addClass('playing');
			$("#player").tubeplayer("play");
			interval = window.setInterval(function(){
				var data = $("#player").tubeplayer("data");
				$('.elapsed').width( data.currentTime/data.duration * 100 +'%' ) 
			}, 1000 );
		}else {
			// If the video is currently playing, pause it:
			$(e).removeClass('pause').addClass('play');
			$(e).parent().removeClass('playing');
			$("#player").tubeplayer("pause");
			window.clearInterval(interval);
		}
}

/* ========================================================================================================================

	Modal / Youtube

======================================================================================================================== */

$('#myModal').bind('show',function(){
  YTVideo('.controlDiv');
})
$('#myModal').bind('hide',function(){
	YTVideo('.controlDiv');
})




/* ========================================================================================================================

	Scroll to 

======================================================================================================================== */

$(".scroll").on('click', function(e){
	var toggleTarget = $(this).attr("href");
	//console.log(toggleTarget)
	pde(e);
	$('html, body').animate({scrollTop: $(toggleTarget).offset().top - 75}, 1600, 'easeInOutExpo')
});

/* ========================================================================================================================

	Header form

======================================================================================================================== */
var collapsed = true;
$(".searchIcon").on('click', function(e){
	
	if(collapsed){
		$('.navbar-search').stop().animate({width: 206+'px'}, 800);
		$('.nav-collapse').collapse('show')
		collapsed = false;
	}else{
		$('.navbar-search').stop().animate({width: 0+'px'}, 800);
		$('.nav-collapse').collapse('hide')
		collapsed = true;
	}
});
/* ========================================================================================================================

	Menu Scroll

======================================================================================================================== */
	function sidebar(){  
  var distanceFromTop = 150; // top spacer - can be adjusted
  var menuPos =  $(".sidenav").offset().top + $(".sidenav").height() - $(window).scrollTop() + 14; // total menu height
  
  $(window).on('scroll',function(){
		
		//Get's the top position of an element
		var aboutTopOffset = $("#about").offset().top - $(window).scrollTop();
		var pressTopOffset = $("#press").offset().top - $(window).scrollTop();
		var contactTopOffset = $("#contact").offset().top - $(window).scrollTop();
		
		//Gets top position of sidebar text items
		$(".sidenav a").each(function(i,j){
			var item = $(this).offset().top - $(window).scrollTop(); 
			
			if(aboutTopOffset < item){ 
				$(this).addClass('color3')
			}else{
				$(this).removeClass('color3')
			}
			
			if(pressTopOffset < item){
				$(this).removeClass('color3')
				$(this).addClass('color1')				
			}
			
			if(contactTopOffset < item){ 
				$(this).addClass('color5')
			}else{
				$(this).removeClass('color5')
			}
			
		})
		
		// Checks if the top of the element is at the bottom of the side nav 
		//if so it adjusts the height of the side nav 
		if(aboutTopOffset < menuPos){ 
			menuResizer( '.element1', aboutTopOffset )
		}
		else{ 
			$('.element1').css('height',210);
		}
		
		if(pressTopOffset < menuPos){ 
			menuResizer( '.element2', pressTopOffset )
		}else{ 
			$('.element2').css('height',210);
		}
		
		if(contactTopOffset < menuPos){ 
			menuResizer( '.element3', contactTopOffset )
		}
		else{ 
			$('.element3').css('height',210);
		}

		})
  
  function menuResizer(element, offset){
	  $(element).css('height', offset - distanceFromTop) 
  }
  
  }
  
  if( $(location).attr('href') == "http://localhost/clients/mercerbell/" || $(location).attr('href') == "http://mb2013.mercerbell.com.au/" ||  $(location).attr('href') == "http://mercerbell.com.au/"){
	  sidebar()
  }
  
  
  
  


/* ========================================================================================================================

	Toggle // Unhides the closest p element with a .hide class

======================================================================================================================== */
function bindToggle(){
	$('.toggle').on('click',function(e){
		pde(e);
		$(e.target).parent().parent().siblings('.hide').slideToggle('300')
	})
}


  /* ========================================================================================================================
	
	Prevent Default //Function to prevent Default Events
	
======================================================================================================================== */

  function pde(e) {
    if (e.preventDefault)
      e.preventDefault();
    else
      e.returnValue = false;
  }

  $(".null").click(function (e) {
    pde(e);
  });


  /* ========================================================================================================================
	
	Ajax
	
======================================================================================================================== */

function galleryAjax(posttype, offsetNum,term){
     jQuery.ajax({
          url: 'http://localhost/clients/mercerbell/wp-admin/admin-ajax.php',
          data:{
               'action':'do_ajax',
               'fn':'get_more_items',
               'posttype':posttype,
               'trackOffset':offsetNum,
               'term':term,
               },
          dataType: 'JSON',
          success:function(data){
          	console.log(data);
          	var workContent = '';
          	var terms = '';
          	var sizeArray = ['span8','span4','span7','span5','span4','span4','span4'];
          	for(i = 0 ; i < data.length ; i++){
          		terms = '';
          		
          		for(j = 0 ; j < data[i].terms.length ; j++){
          			terms += data[i].terms[j];
          			if(j < data[i].terms.length - 1){
          				terms += ', ';
          			}
          		}
          		workContent += '<a href="'+ data[i].link +'" target="_parent">'+
														 '<div class="bg-color1 transition element mbm '+ sizeArray[i] +'">'+
														 		'<span class="patternOverlay block"><img class="transition" src="'+data[i].thumbnail[sizeArray[i]][0] + '"/></span>'+ //'<img src="'+data[i].attachments[0][sizeArray[i]][0] + '"/>'+
													        '<div class="pam">'+
																		'<h4 class="uppercase df-regular uppercase man">'+ data[i].title +'</h4>'+
																		'<hr>' +
																		'<p class="fss man uppercase">'+ terms +'</p>'+
																	'</div>'+
																'</div>'+
															'</a>';

	              }
	         if(filtered){
		          $("#appendAjaxContent").empty();
	         }
	         $("#appendAjaxContent").hide().append(workContent).fadeIn('slow');
          		//console.log(data);
          		//After finished
          		hasFinished = true;
          		trackCount = trackCount + 7;
          		$('.loadingSpinner').remove();
          },
          error: function(errorThrown){
               //alert('error');
               //console.log(errorThrown);
          }
     });
}

function jobsAjax(posttype,term){
     jQuery.ajax({
          url: 'http://localhost/clients/mercerbell/wp-admin/admin-ajax.php',
          data:{
               'action':'do_ajax',
               'fn':'get_more_jobs',
               'posttype':posttype,
               'term':term,
               },
          dataType: 'JSON',
          success:function(data){
          	console.log(data);
          	var workContent = '';
          	var container1 = '',container2 = '',container3 ='';
          	var counter = 1;
          	var terms = '';
          	
          	$(".ajax1,.ajax2,.ajax3").empty();
          	for(i = 0 ; i < data.length ; i++){
          	
          		for(j = 0 ; j < data[i].terms.length ; j++){
          			terms += data[i].terms[j];
          			if(j < data[i].terms.length - 1){
          				terms += ', ';
          			}
          		}
          	
          		workContent += '<div class="transition mbm imgStretch">'+
	          									 '<a href="'+ data[i].link +'" target="_parent"><img src="'+ data[i].thumbnail.squarelarge[0] +'" /></a>'+
	          									 '<h4 class="uppercase df-regular mtm fsl color6 phone-padding">'+data[i].title+'</h4>'+
															 '<hr class="bc-color6">'+
															 '<p class="man uppercase fss phone-padding">'+terms+'<a href="#" class="null toggle color6"><i class="icon-angle-down pull-right"></i></a></p>'+
															 '<div class="hide phone-padding">'+
																 '<p class="mtm mbl">'+data[i].content + '</p>'+
																 '<p class="man pan fss">Share: '+
															   '<a href="http://www.facebook.com/share.php?u='+encodeURIComponent(data[i].link)+'&title='+encodeURIComponent(data[i].title)+'" target="_blank"><i class=" mlt prt icon-facebook color6 txtT"></i></a>'+
															   '<a href="http://twitter.com/home?status='+encodeURIComponent(data[i].link)+'+'+encodeURIComponent(data[i].title)+'" target="_blank"><i class="icon-twitter mrt color6 txtT"></i></a>'+
															   '<a href="http://pinterest.com/pin/create/bookmarklet/?media='+encodeURIComponent(data[i].thumbnail.squarelarge[0])+'&url='+encodeURIComponent(data[i].link)+'&is_video=false&description='+encodeURIComponent(data[i].title)+'" target="_blank"><i class="icon-pinterest mrt color6 txtT"></i></a>'+
															   '<a class="color6" href="'+data[i].link+'" target="_parent" ><span class="pull-right">Apply Now <i class=" plt icon-angle-right txtT"></i></span></a>'+
															   '</p>'+
															  '</div>'+
															  '<hr class="bc-color6">'+
															 '</div>';
								if(counter == 1){
									container1 += workContent;
								}else if(counter == 2){
									container2 += workContent;
								}else{
									container3 += workContent;
									counter =0;
								}
								
								workContent = '';
								terms = '';
								counter++;
								
														   
														   
          	}	
          	
         $(".ajax1").hide().append(container1).fadeIn('slow');
         $(".ajax2").hide().append(container2).fadeIn('slow');
         $(".ajax3").hide().append(container3).fadeIn('slow');
				 bindToggle();
				 		
				 },
          error: function(errorThrown){
               //alert('error');
               console.log(errorThrown);
               
          }
     });
}





//Load more Ajax
var hasFinished = true;
var filtered = false;

var trackCount = 7;
$('#moreViaAjax').on('click', function(){
	filtered = false;
	if(hasFinished){
	galleryAjax( $('#moreViaAjax').attr('data-postType'), trackCount );
	hasFinished = false;
	}
})	

//Filter items
$('#filters a, #filters-mobile a').on('click', function(){
	//Filtered is used to remove all the content from the container before readding all the new items
	filtered = true;
	//this variable tracks how many jobs to offset = 0
	trackCount = 0;
	//Will only run if ajax is finished
	if(hasFinished){
	galleryAjax( $('#moreViaAjax').attr('data-postType'), trackCount, $(this).attr('data-taxonomy') );
	hasFinished = false;
	}
	$('#filters a, #filters-mobile a').removeClass('df-regular');
	$('#filters a, #filters-mobile a').children().removeClass('color7');
	$(this).addClass('df-regular');
	$(this).children().addClass('color7');
	
})
//three column ajax
$('#three-col-filter a, #three-col-filter-mobile a').on('click', function(){
	jobsAjax('jobs',$(this).attr('data-taxonomy'));
	
	$('#three-col-filter a, #three-col-filter-mobile a').removeClass('df-regular');
	$('#three-col-filter a, #three-col-filter-mobile a').children().removeClass('color7');
	$(this).addClass('df-regular');
	$(this).children().addClass('color7');
	
});

	

  /*  Uncomment to use

  function recentPostsAjax() {
   
   jQuery.ajax({
     url: '/wp-admin/admin-ajax.php',
     data: {
       'action': 'do_ajax',
       'fn': 'get_latest_posts',
       'count': 10
     },
     dataType: 'JSON',
     success: function (data) {
       console.log(data);
       // our handler function will go here
       // this part is very important!
       // it's what happens with the JSON data 
       // after it is fetched via AJAX!
     },
     error: function (errorThrown) {
       alert('error');
       console.log(errorThrown);
     }
   });
  }

*/



  /* ========================================================================================================================
	
	Custom Youtube
	
======================================================================================================================== */
	//$('#player').youTubeEmbed("http://www.youtube.com/watch?v=e74PdbaZU_c");

$('#workCarousel').on('slide',function(){
	$("#player").tubeplayer("pause");
})
      

  /* ========================================================================================================================
	
	Google Maps
	
======================================================================================================================== */
/*

function initialize() {
  var mapOptions = {
    zoom: 16,
    center: new google.maps.LatLng(-33.868263, 151.205727),
    mapTypeId: google.maps.MapTypeId.SATELLITE
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'),
                                mapOptions);

  setMarkers(map);
}

function setMarkers(map, locations) {

  var image = {
    url: './wp-content/themes/mercerbell/img/mbIcon.png',
    // This marker is 20 pixels wide by 32 pixels tall.
    size: new google.maps.Size(42, 57),
    // The origin for this image is 0,0.
    origin: new google.maps.Point(0,0),
    // The anchor for this image is the base of the flagpole at 0,32.
    anchor: new google.maps.Point(0, 57)
  };

  var shape = {
      coord: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
  };
    var myLatLng = new google.maps.LatLng( -33.868263, 151.205727);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        //shadow: shadow,
        icon: image,
        shape: shape,
        title: 'Mercerbell',
    });
}



if($("#map-canvas").length == 1) {
	initialize();
}
*/



  /* ========================================================================================================================
	
	INIT
	
======================================================================================================================== */
bindToggle();



});