<?php defined( '_JEXEC' ) or die( 'Restricted index access' );
	$app = &JFactory::getApplication();
	$logo = $this->params->get('logo');
	$sitename = $this->params->get('sitename');
	if (!$sitename)
		$sitename = $app->getCfg( 'sitename' );
?>
	<div id="lay_header"><div class="fixed" id="lay_header_container">
		<?php if (!empty($logo)) : ?>
		<div class="logo" id="logo-<?php echo $logo; ?>"></div>
		<?php endif; ?>
		
		<div id="lay_header_left">
			<h1 id="sitename"><a href="<?php 
				echo JURI::base(true); ?>"><?php 
				echo $sitename; ?>
			</a></h1>
		</div>	
		
		<?php if ($pos_user3 || $pos_search) : ?>
		<div id="lay_header_right">	
			<?php if ($pos_search) : ?>
			<div id="tabsearch"> 
				<div id="tabmenu_left"></div>				
				<div id="tabmenu_center">
					<jdoc:include type="modules" name="search" style="raw" />
				</div>				
				<div id="tabmenu_right"></div>				
			</div>   			
			<div class="clr"></div>   
			<?php endif; ?>
			
			<?php if ($pos_user3) : ?>
			<div id="tabmenu"> 
				<div id="tabmenu_right"></div>
				<div id="tabmenu_center">
					<jdoc:include type="modules" name="user3" />
				</div>				
				<div id="tabmenu_left"></div>
			</div>   
			<div class="clr"></div>			
			<?php endif; ?>
		</div>	
		<?php endif; ?>
	</div></div>
	
	<?php if ($pos_menumatic) : ?>
	<div id="menumaticwrap">	
		<jdoc:include type="modules" name="menumatic" />
	<div>
	<div class="clr"></div>	
	<?php endif; ?>		

	<div id="lay_top">
	<?php if ($pos_top) : ?>
	<div class="fixed">
		<jdoc:include type="modules" name="top" />
	</div>
	<?php endif; ?>
	</div>
