<header>
	<div class="navbar navbar-fixed-top">
	  <div class="bg-color1">
	    <div class="container relative">
	 
	      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
	      <a class="btn btn-navbar mtm" data-toggle="collapse" data-target=".nav-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </a>
	 
	      <!-- Be sure to leave the brand out there if you want it shown -->
	      <a class="brand absolute" href="<?php get_bloginfo('/'); ?>">Mercerbell</a>
	 
	      <!-- Everything you want hidden at 940px or less, place within here -->
	      <div class="nav-collapse collapse">
	        
	        <form class="navbar-search pull-right mtm">
					  <input type="text" class="" placeholder="Search"> 
					  <i class="icon-search"></i>
					  <i class="icon-envelope-alt"></i>
					</form>
					
	        <?php 
				    wp_nav_menu( array(
				        'menu'       => 'Main',
				        'depth'      => 2,
				        'container'  => false,
				        'menu_class' => 'nav uppercase fst pull-right'
				    ));
					?>
					
					
	        
	        
	        
	      </div>
	 
	    </div>
	  </div>
	</div>
</header>
