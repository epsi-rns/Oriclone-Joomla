<?php defined( '_JEXEC' ) or die( 'Restricted index access' ); 
	// Main Layout	
	$layout = $this->params->get('layoutStyle');
	
	if (!$pos_left)		$layout = str_replace('l', '', $layout);	
	if (!$pos_right)	$layout = str_replace('r', '', $layout);
	
	$show_left	= $pos_left		&& (strpos($layout, 'l')!==false);
	$show_right	= $pos_right	&& (strpos($layout, 'r')!==false);
	
	$flip_leftright = ($layout=='rlc') || ($layout=='clr');	
	$main_layout = 'pos_'.$layout;	
?>

	<div id="lay_main" class="<?php echo $main_layout;?>"><div class="fixed">
		<?php if ($flip_leftright) : ?>
		<?php if ($show_right) : ?>
		<div id="lay_right">
			<jdoc:include type="modules" name="right" style="xhtml" />
		</div>	
		<?php endif; ?>
		<?php endif; ?>

 		<?php if ($show_left) : ?>
		<div id="lay_left">
			<jdoc:include type="modules" name="left" style="xhtml" />
			<jdoc:include type="modules" name="login" style="xhtml" />
		</div>
		<?php endif; ?>
	
		<?php if (!$flip_leftright) : ?>
		<?php if ($show_right) : ?>
		<div id="lay_right">
			<jdoc:include type="modules" name="right" style="xhtml" />
		</div>	
		<?php endif; ?>
		<?php endif; ?>
	
		<div id="lay_content">
			<?php if ($this->CountModules('breadcrumb') ) : ?>
			<div id="gloss"><div class="breadcrumbs">
				<jdoc:include type="modules" name="breadcrumb" />
			</div></div>
			<?php endif; ?>
			
			<div id="container-message">
				<jdoc:include type="message" />
			</div>
			<div id="main_content">  
				<?php if ($isindex) : ?>
				<jdoc:include type="modules" name="teaser" />			 
				<?php endif; ?>
				<jdoc:include type="component" />
			</div>
		</div>
	
		<div class="clr"></div>

		<div id="lay_bottom">
			<jdoc:include type="modules" name="footer" style="xhtml"/>		
		</div>
	
	</div></div>
