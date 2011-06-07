<?php defined( '_JEXEC' ) or die( 'Restricted index access' ); 
	jimport('joomla.utilities.date');
	$date = new JDate();
	$cur_year	= $date->toFormat('%Y');
	
	$cp_desc = $this->params->get('copyrightDescription');	
	
	$top_layout = 'pos_col'.(1+$this->CountModules( 'user1', 'user2' ));
?>	
	<?php if ($this->countModules('bottom or user1 or user2')) : ?>
	<div id="lay_top" class="no-print <?php echo $top_layout;?>"><div class="fixed">
		<?php if ($moo_demo && $this->countModules('user1 or user2')) : ?>
		<div id="sitecorner">
			<a title="Ikatan Alumni Universitas Indonesia"></a>
		</div>
		<?php endif; ?>
			
		<div id="lay_top_left">
			<jdoc:include type="modules" name="bottom" />
			<jdoc:include type="modules" name="syndicate" />
		</div>
		
		<?php if ($this->countModules('user2')) : ?>
		<div id="lay_top_right">
			<jdoc:include type="modules" name="user2" style="xhtml" />		
		</div>
		<?php endif; ?>
		
		<?php if ($this->countModules('user1')) : ?>
		<div id="lay_top_center">
			<jdoc:include type="modules" name="user1" style="xhtml" />
		</div>	
		<?php endif; ?>
		
		<div class="clr"></div>	
	</div></div>
	<?php endif; ?>

	<div id="lay_footer">
		<div id="footer">	
		Copyright &copy; <?php echo $cur_year;?>,
		<?php echo $cp_desc;?></div>
	</div>
	
	<div class="no-print">
		<jdoc:include type="modules" name="debug" style="xhtml" />
	</div>
