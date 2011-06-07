<?php defined( '_JEXEC' ) or die( 'Restricted index access' );

	// Create shortcuts to some parameters.
	$params		= $this->item->params;
	
	$meta	= JHTML::_('custommeta.instance', $this->item);
	$month	= JHTML::_('date', $meta::get_date(), 'm');
?>	
<div class="post_box post-bg-<?php echo $month; ?>">
<div class="post_pane">
<?php	
	$meta
		->calendar_icon()
		->title_featured()
/*
	<div class="post_meta">
		<?php 
		$meta
			->action_edit()
			->action_print_popup()
			->action_email();
		?>
		<div class="clr"></div> 
	</div>
*/
?>
	<div class="post_meta">
		<?php 
			$meta
				->author()
				->time_elapsed()
				->hits()
				//->category()
				//->parent_category()
				;		
		?>
		<div class="clr"></div> 
	</div>		 
</div><?php /* post_pane */ ?>

<?php if (!$params->get('show_intro')) : ?>
	<?php echo $this->item->event->afterDisplayTitle; ?>
<?php endif; ?>

<?php echo $this->loadTemplate('content'); ?>

</div>
