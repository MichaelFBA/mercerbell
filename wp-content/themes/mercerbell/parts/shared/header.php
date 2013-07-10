<header>
	<div class="navbar navbar-fixed-top">
	  <div class="bg-color1">
	    <div class="container relative">
	 
	      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
	      <a class="btn btn-navbar mts pam" data-toggle="collapse" data-target=".nav-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </a>
	 
	      <!-- Be sure to leave the brand out there if you want it shown -->
	      <a class="brand absolute" href="<?php get_home_url(); ?>">Mercerbell</a>
	 
	      <!-- Everything you want hidden at 940px or less, place within here -->
	      <div class="nav-collapse collapse front bg-color1">
	        
	        <form class="navbar-search pull-right mtm" action="<?php echo home_url( '/' ); ?>" method="get">
					  <input type="text" class="uppercase" placeholder="" name="s" id="search" value="<?php the_search_query(); ?>"> 
					  <i class="icon-search"></i>
					  <a href="mailto:mercerbell@mercerbell.com.au"><i class="icon-envelope-alt"></i></a>
					</form>

					
	        <?php 
				    wp_nav_menu( array(
				        'menu'       => 'Main',
				        'depth'      => 2,
				        'container'  => false,
				        'menu_class' => 'nav uppercase fss pull-right'
				    ));
					?>
					
					
	        
	        
	        
	      </div>
	 
	    </div>
	  </div>
	</div>
</header>
