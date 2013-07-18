<header>
	<div class="navbar navbar-fixed-top">
	  <div class="bg-color1">
	    <div class="container relative">
	 
	      
	 
	      <!-- Be sure to leave the brand out there if you want it shown -->
	      <a class="brand absolute" href="<?php get_home_url(); ?>">Mercerbell</a>
				<div class="pull-right mtm ptt">
					<a class="searchIcon" href="#"><i class="icon-search"></i></a>
				  <a class="hidden-phone hidden-tablet" href="mailto:mercerbell@mercerbell.com.au"><i class="icon-envelope-alt mls"></i></a>
				</div>
				
				<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
	      <a class="btn btn-navbar mvm pat" data-toggle="collapse" data-target=".nav-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </a>
				
	      <!-- Everything you want hidden at 940px or less, place within here -->
	      <div class="nav-collapse collapse front bg-color1">
	        
	        <form class="navbar-search pull-right mtm" action="<?php echo home_url( '/' ); ?>" method="get">
					  <input type="text" class="df-light pan pts uppercase fss" placeholder="" name="s" id="search" value="<?php echo trim( get_search_query() ); ?>"> 
					</form>

					
	        <?php 
				    wp_nav_menu( array(
				        'menu'       => 'Main',
				        'depth'      => 2,
				        'container'  => false,
				        'menu_class' => 'nav uppercase fss pull-right df-regular'
				    ));
					?>
				</div>
				
	 
	    </div>
	  </div>
	</div>
</header>
