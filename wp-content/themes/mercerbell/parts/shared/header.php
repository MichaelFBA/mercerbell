<header>
	<div class="navbar navbar-fixed-top">
	  <div class="bg-color1">
	    <div class="container">
	 
	      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
	      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </a>
	 
	      <!-- Be sure to leave the brand out there if you want it shown -->
	      <a class="brand" href="#">Project name</a>
	 
	      <!-- Everything you want hidden at 940px or less, place within here -->
	      <div class="nav-collapse collapse">
	        
	        <?php 
				    wp_nav_menu( array(
				        'menu'       => 'Main',
				        'depth'      => 2,
				        'container'  => false,
				        'menu_class' => 'nav uppercase fst'
				    ));
					?>
					
					<form class="navbar-search pull-left">
					  <input type="text" class="search-query" placeholder="Search"><i class="icon-search"></i>
					</form>
	        
	        <i class="icon-envelope-alt"></i>
	        
	      </div>
	 
	    </div>
	  </div>
	</div>
</header>
