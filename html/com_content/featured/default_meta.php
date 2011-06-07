<?php defined( '_JEXEC' ) or die( 'Restricted index access' );

	$meta = JHTML::_('custommeta.instance', $this->item)
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
				->category()
				//->parent_category()
				;		
		?>
		<div class="clr"></div> 
	</div>		 
