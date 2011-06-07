<?php defined( '_JEXEC' ) or die( 'Restricted index access' );

	// Include custom JHTML helpers:
	$path = JPATH_THEMES.DS.'oriclone'.DS.'html'.DS.'com_content'.DS.'helpers';
	JHTML::addIncludePath($path);

	// Create shortcuts to some parameters.
	$params		= $this->item->params;
	$canEdit	= $params->get('access-edit');

	$meta	= JHTML::_('custommeta.instance', $this->item);
	
	// Workaround for PHP 5.2 compatibility
	$date = $meta->get_date();
	
	$month	= JHTML::_('date', $date, 'm');
?>	
<div class="post_box post-bg-<?php echo $month; ?>">
<div class="post_pane">
<?php	
	$meta
		->calendar_icon()
		->title_article();
?>
	<div class="post_meta">
		<?php 
		if (!$this->print) 
			$meta
				->action_edit()
				->action_print_popup()
				->action_email();
		else $meta
				->action_print_screen();
				
		// $meta->actions($this->print); 
		?>
		<div class="clr"></div> 
	</div>
</div><?php /* post_pane */ ?>

	<div class="post_meta">
		<?php 
			$meta
				->author()
				->time_elapsed()
				->hits()
				->category()
				->parent_category();		
		?>
		<div class="clr"></div> 
	</div>		 

<?php  if (!$params->get('show_intro')) :
	echo $this->item->event->afterDisplayTitle;
endif; ?>

<?php echo $this->loadTemplate('content'); ?>

</div>
