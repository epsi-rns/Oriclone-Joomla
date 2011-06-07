<?php defined( '_JEXEC' ) or die( 'Restricted index access' ); 
/** initial design and code by: Epsi Nurwijayadi **/
// error_reporting(E_ALL);

/* The following line loads the MooTools JavaScript Library */
JHTML::_('behavior.framework', true);

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();


	$doctype = 'XHTML 1.0 Strict';
	include('libraries'.DS.'doctype.php');
	
	// initialize template variables if any
	include('libraries'.DS.'init.php');

	// is first load
	$isRebuild = $this->params->get('rebuildcss');
	if ($isRebuild==1)
		include('libraries'.DS.'build_css.php');			

	// pick page
	$mode = $this->params->get('mode');
	// framework
	$moo_eff = $this->params->get('moo');
	$moo_demo = $this->params->get('moodemo');
	// path
	$img = JURI::base().'templates/'.$this->template.'/images';
	$js = JURI::base().'templates/'.$this->template.'/js';
	// initialize
	if ($moo_eff)	$effects = array('hover_all');
	
	if (empty($mode))
		include('libraries'.DS.'test.php');
	else {
		$user =& JFactory::getUser();
		if ( $this->params->get('forceLogin') && $user->guest ) 
			include('libraries'.DS.'login.php');
		else	
			include('libraries'.DS.'page.php');
	}
?>
</html>
