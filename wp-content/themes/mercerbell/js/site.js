jQuery(document).ready(function ($) {

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
  
  if( $(location).attr('href') == "http://localhost/clients/mercerbell/" ){
	  sidebar()
  }
  
  
  
  


/* ========================================================================================================================

	Toggle // Unhides the closest p element with a .hide class

======================================================================================================================== */
$('.toggle').on('click',function(e){
	//console.log($(e.target).siblings('.hide'))
	$(e.target).parent().parent().siblings('.hide').slideToggle('300')
})


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
          	//console.log(data);
          	var workContent = '';
          	var terms = '';
          	var sizeArray = ['span8','span4','span7','span5','span4','span4','span4'];
          	for(i = 0 ; i < data.length ; i++){
          		terms = '';
          		
          		for(j = 0 ; j < data[i].terms.length ; j++){
          			terms += data[i].terms[j].name + ', ';
          		}
								
          		workContent += '<a href="'+ data[i].link +'" target="_parent">'+
														 '<div class="bg-color1 transition element mbm '+ sizeArray[i] +'">'+
														 		'<img src="'+data[i].thumbnail[sizeArray[i]][0] + '"/>'+ //'<img src="'+data[i].attachments[0][sizeArray[i]][0] + '"/>'+
													        '<div class="pam">'+
																		'<h5 class="uppercase df-regular uppercase man">'+ data[i].title +'</h5>'+
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
$('#filters a').on('click', function(){
	//Filtered is used to remove all the content from the container before readding all the new items
	filtered = true;
	//this variable tracks how many jobs to offset = 0
	trackCount = 0;
	//Will only run if ajax is finished
	if(hasFinished){
	galleryAjax( $('#moreViaAjax').attr('data-postType'), trackCount, $(this).attr('data-taxonomy') );
	hasFinished = false;
	}
	$('#filters a').removeClass('df-regular');
	$('#filters a').children().removeClass('color7');
	$(this).addClass('df-regular');
	$(this).children().addClass('color7');
	
})	

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





  /* ========================================================================================================================
	
	END READY
	
======================================================================================================================== */




});