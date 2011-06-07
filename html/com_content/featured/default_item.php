<?php defined( '_JEXEC' ) or die( 'Restricted index access' );

	// Include custom JHTML helpers:
	$path = JPATH_THEMES.DS.'oriclone'.DS.'html'.DS.'com_content'.DS.'helpers';
	JHTML::addIncludePath($path);

	// Create shortcuts to some parameters.
	$params		= $this->item->params;
	$canEdit	= $params->get('access-edit');
?>
<?php if ($this->item->state == 0) : ?>
<div class="system-unpublished">
<?php endif; ?>

<?php echo $this->loadTemplate('meta'); ?>

<?php if (!$params->get('show_intro')) : ?>
	<?php echo $this->item->event->afterDisplayTitle; ?>
<?php endif; ?>

<?php echo $this->loadTemplate('content'); ?>

<?php if ($this->item->state == 0) : ?>
</div>
<?php endif; ?>

