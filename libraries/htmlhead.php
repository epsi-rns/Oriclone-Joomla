<?php defined( '_JEXEC' ) or die( 'Restricted index access' ); 

	$css = JURI::base().'templates/'.$this->template.'/css';

	$document	= & JFactory::getDocument();	
	if	($this->params->get('compactcss')) {
		$document->addStyleSheet($css.'/template.css');
	}	else {
		$cssdev = JURI::base().'templates/'.$this->template.'/css-dev';

		$document->addStyleSheet($cssdev.'/import.css');	
		if ($pos_menumatic)
			$document->addStyleSheet($cssdev.'/menumatic.css');
	}

	// Variation
	$hmenu	= $this->params->get('topMenu');
	$scheme	= $this->params->get('textScheme');
	$strip	= $this->params->get('stripDefault');
	$hover	= $this->params->get('stripHover');	
	$marble	= $this->params->get('marbleIcon');
	
	$document->addStyleSheet($css.'/hmenu/'.$hmenu.'.css');
	$document->addStyleSheet($css.'/scheme/'.$scheme.'.css');
	$document->addStyleSheet($css.'/strip/'.$strip.'.css');
	$document->addStyleSheet($css.'/hover/'.$hover.'.css');
	$document->addStyleSheet($css.'/marble/'.$marble.'.css');


	//	adding any nice mootools 1.2 effects
	if ($moo_eff)	{
		JHTML::_('behavior.mootools', true);	
		$document->addScript($js.'/effects.js');
		
		// php5: foreach ($effects as &$effect) $effect = $effect.'();';
		$effs = array();
		foreach ($effects as $effect) $effs[] = $effect.'();';

		if ($pos_menumatic) {
			$document->addScript($js.'/mooclass.menumatic.js');			
			$effs[] = "var myMenu = new MenuMatic({id: 'menumatic'});";
		}
		
		$content = "\t"
		."window.addEvent('domready', function() {"
		."\n\t\t".implode($effs,"\n\t\t")	
		."\n\t});";
		$document->addScriptDeclaration($content);
	}
	
	$this->setGenerator('Karimata 1.2.3 Media Engine');	// Fake generator
?>
<head>
<jdoc:include type="head" />
  <meta http-equiv="MSThemeCompatible" content="No"/>

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $img ?>/favicon.ico" />
  <link rel="apple-touch-icon" href="<?php echo $img ?>/notmine/apple_touch_icon.png" />
  
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="<?php echo $js ?>/pngfix.js"></script>
<![endif]-->
<!--[if lte IE 6]>
<link href="<?php echo $css ?>/ieonly.css" rel="stylesheet" type="text/css" />
<![endif]-->  
</head>
