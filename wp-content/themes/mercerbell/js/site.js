jQuery(document).ready(function ($) {

/* ========================================================================================================================

	Scroll to 

======================================================================================================================== */

  jQuery('.scroll').bind('click', function (event) {
    var jQueryanchor = jQuery(this);
    jQuery('html, body').stop().animate({
      scrollTop: 0
    }, 1000, 'easeInOutExpo');

    if (event.preventDefault) {
      event.preventDefault();
    } else {
      event.returnValue = false;
    }
  });


/* ========================================================================================================================

	Toggle // Unhides the closest p element with a .hide class

======================================================================================================================== */
$('.toggle').on('click',function(e){
	console.log($(e.target).siblings('.hide'))
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
	
	ISOTOPE
	
======================================================================================================================== */
var $container = $('#isotope');
$container.imagesLoaded( function(){
	$($container).isotope({
		layoutMode: 'fitRows',
		itemSelector : '.element'
	});
	$($container).isotope( 'shuffle' )
})


$('.reshuffle').on('click',function(){
	$($container).isotope( 'shuffle' )
})

$('#filters a').click(function(){
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector });
  return false;
});


// -------------------------- Masonry Column Shift -------------------------- //
  
  // custom layout mode
  $.Isotope.prototype._masonryColumnShiftReset = function() {
    // layout-specific props
    var props = this.masonryColumnShift = {
      columnBricks: []
    };
    // FIXME shouldn't have to call this again
    this._getSegments();
    var i = props.cols;
    props.colYs = [];
    while (i--) {
      props.colYs.push( 0 );
      // push an array, for bricks in each column
      props.columnBricks.push([])
    }
  };
  
  $.Isotope.prototype._masonryColumnShiftLayout = function( $elems ) {
    var instance = this,
        props = instance.masonryColumnShift;
    $elems.each(function(){
      var $brick  = $(this);
      var setY = props.colYs;

      // get the minimum Y value from the columns
      var minimumY = Math.min.apply( Math, setY ),
          shortCol = 0;

      // Find index of short column, the first from the left
      for (var i=0, len = setY.length; i < len; i++) {
        if ( setY[i] === minimumY ) {
          shortCol = i;
          break;
        }
      }

      // position the brick
      var x = props.columnWidth * shortCol,
          y = minimumY;
      instance._pushPosition( $brick, x, y );
      // keep track of columnIndex
      $.data( this, 'masonryColumnIndex', i );
      props.columnBricks[i].push( this );

      // apply setHeight to necessary columns
      var setHeight = minimumY + $brick.outerHeight(true),
          setSpan = props.cols + 1 - len;
      for ( i=0; i < setSpan; i++ ) {
        props.colYs[ shortCol + i ] = setHeight;
      }

    });
  };
  
 $.Isotope.prototype._masonryColumnShiftGetContainerSize = function() {
    var containerHeight = Math.max.apply( Math, this.masonryColumnShift.colYs );
    return { height: containerHeight };
  };

  $.Isotope.prototype._masonryColumnShiftResizeChanged = function() {
    return this._checkIfSegmentsChanged();
  };
  
  $.Isotope.prototype.shiftColumnOfItem = function( itemElem, callback ) {
    
    var columnIndex = $.data( itemElem, 'masonryColumnIndex' );
    
    // don't proceed if no columnIndex
    if ( !isFinite(columnIndex) ) {
      return;
    }

    var props = this.masonryColumnShift;
    var columnBricks = props.columnBricks[ columnIndex ];
    var $brick;
    var x = props.columnWidth * columnIndex;
    var y = 0;
    for (var i=0, len = columnBricks.length; i < len; i++) {
      $brick = $( columnBricks[i] );
      this._pushPosition( $brick, x, y );
      y += $brick.outerHeight(true);
    }

    // set the size of the container
    if ( this.options.resizesContainer ) {
      var containerStyle = this._masonryColumnShiftGetContainerSize();
      containerStyle.height = Math.max( y, containerStyle.height );
      this.styleQueue.push({ $el: this.element, style: containerStyle });
    }

    this._processStyleQueue( $(columnBricks), callback )

  };

  $(function(){



    $container.find('.shifty-item').hover(
      function() {
        $(this).css({ height: "+=100" });
        // note that element is passed in, not jQuery object
        $container.isotope( 'shiftColumnOfItem', this );
      },
      function() {
        $(this).css({ height: "-=100" });
        $container.isotope( 'shiftColumnOfItem', this );
      }
    );

  });


  /* ========================================================================================================================
	
	END READY
	
======================================================================================================================== */




});