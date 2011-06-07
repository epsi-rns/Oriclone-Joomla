<?php defined( '_JEXEC' ) or die( 'Restricted index access' ); 
	$code = $this->error->getCode();
	$message = $this->error->getMessage();

	if ($code == '404')
        header("HTTP/1.0 404 Not Found");

	$doctype = 'XHTML 1.0 Strict';
	include('libraries'.DS.'doctype.php');
	
	$css = JURI::base().'templates/'.$this->template.'/css';	
	$js = JURI::base().'templates/'.$this->template.'/js';
	$fw = JURI::base().'media/system/js';
	
	$doc=JFactory::getDocument();
	$language=$doc->language;
	
	// unused
	// $img = JURI::base().'templates/'.$this->template.'/images'; 
	// JHTML::_('behavior.framework', true);	
?>

<head>
<jdoc:include type="head" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="MSThemeCompatible" content="No"/>
	<meta name="language" content="<?php echo $language; ?>" />
	<title><?php echo $code ?> - <?php echo $this->title; ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo JURI::base() ?>favicon.ico" />	
	<link rel="stylesheet" href="<?php echo $css; ?>/template.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $css; ?>/error.css" type="text/css" />
  	<script type="text/javascript" src="<?php echo $fw; ?>/mootools-core.js"></script>  	
	<script type="text/javascript" src="<?php echo $fw; ?>/mootools-more.js"></script>	
	<script type="text/javascript" src="<?php echo $js; ?>/Fx.Shake.js"></script>  
	<script type="text/javascript" src="<?php echo $js; ?>/effects.js"></script>  
	<script type="text/javascript">
		window.addEvent('domready', function() { mootools_shake(); });
  	</script>
</head>
<body class="width_fluid mbg_feathers hbg_red grad_black">
<div id="wrapper">
	<div id="lay_header"><div class="fixed" id="lay_header_container">		
		<div id="continfo"><div id="errorinfo">		
			<?php if ($code == '404'): ?>
			<h5>Whoops! Page down!! Page no sound!</h5>
			<?php endif; ?>
			<h4><?php echo $code ?> - <?php echo $this->error->getMessage() ?></h4>
		</div></div>
	</div></div>

	<div id="lay_top">
	</div>
	
	<div id="lay_main" class="pos_c lay_main_login"><div class="fixed">
		<div id="lay_content">	
	
	<div align="center">
<dl id="system-message">
<dt class="error">Error</dt>
<dd class="error message fade">
	<ul>
		<li>Uh oh... We are sorry. Whatever you are looking is not around. Go back friend, go back...</li>
	</ul>

</dd>
</dl>	
		<div id="errorboxoutline">
			<div id="errorboxbody">
			<p><strong><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></strong></p>
				<ol>
					<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
				</ol>
			<p><strong><?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?></strong></p>
			<p class="readmore">
				<a href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
				<a href="<?php echo $this->baseurl; ?>/index.php?option=com_search" title="<?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></a>
			</p>
			<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
			<div id="techinfo">
			<h4><?php echo $message; ?></h4>
			<?php if ($code == '404'): ?>
			<p>We all make mistakes. Please take me out of here.</p>
			<?php endif; ?>
			<p>
				<?php if($this->debug) :
					echo $this->renderBacktrace();
				endif; ?>
			</p>
			</div>
			</div>
		</div>

	</div>

		</div>
	</div></div>

<?php
	jimport('joomla.utilities.date');
	$date = new JDate();
	$cur_year	= $date->toFormat('%Y');
?>	
	<div id="lay_footer">
		<div id="footer">	
		Copyright &copy; <?php echo $cur_year;?></div>
	</div>	
</div>	
</body>
</html>
