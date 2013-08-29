<header>

<div class="navbar navbar-static-top front affix bg-color1" data-spy="affix" data-offset-top="0">
  <div class="navbar-inner">
    <div class="container relative">

	      <!-- Be sure to leave the brand out there if you want it shown -->
	      <a class="brand absolute" href="<?php echo get_home_url(); ?>">Mercerbell</a>
				<div class="navicons pull-right mtm">
					<a class="searchIcon null" href="#"><i class="icon-search"></i></a>
				  <a class="hidden-phone hidden-tablet" href="mailto:mercerbell@mercerbell.com.au"><i class="fwBold icon-envelope-alt mls"></i></a>
				</div>
				<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
	      <a class="mainCollapse btn btn-navbar mvm pat" data-toggle="collapse" data-target="#main-menu">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </a>
				<div id="search-menu" class="nav-collapse collapse front bg-color1">
	        <form class="navbar-search pull-right mtm txtC" action="<?php echo home_url( '/' ); ?>" method="get">
					  <input type="text" class="df-light pan pts uppercase fss txtC" placeholder="" name="s" id="search" value="<?php echo trim( get_search_query() ); ?>"> 
					</form>
				</div>
				
	      <!-- Everything you want hidden at 940px or less, place within here -->
	      <div id="main-menu" class="nav-collapse collapse front bg-color1">
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
          </div><!-- /navbar-inner -->
     </div>

</header>
