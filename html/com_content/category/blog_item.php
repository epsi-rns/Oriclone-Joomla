<?php defined( '_JEXEC' ) or die( 'Restricted index access' );

	// Include custom JHTML helpers:
	$path = JPATH_THEMES.DS.'oriclone'.DS.'html'.DS.'com_content'.DS.'helpers';
	JHTML::addIncludePath($path);

?>
<?php if ($this->item->state == 0) : ?>
<div class="system-unpublished">
<?php endif; ?>

<?php echo $this->loadTemplate('meta'); ?>

<?php if ($this->item->state == 0) : ?>
</div>
<?php endif; ?>

