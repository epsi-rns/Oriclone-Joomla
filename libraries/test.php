<?php defined( '_JEXEC' ) or die( 'Restricted index access' ); 
// http://www.barelyfitz.com/screencast/html-training/css/positioning/ 

	$app = &JFactory::getApplication();

	$css = JURI::base().'/templates/'.$this->template.'/css-dev';
	$img = JURI::base().'/templates/'.$this->template.'/images';
	
	$classes = 'width_'.$this->params->get('widthStyle');	
	
	// Main Layout	
	$layout = $this->params->get('layoutStyle');
	$show_left	= $this->countModules('left');
	$show_right	= $this->countModules('right');
	
	if (!$show_left)	$layout = str_replace('l', '', $layout);	
	if (!$show_right)	$layout = str_replace('r', '', $layout);
	
	$show_left	= $show_left	&& (strpos($layout, 'l')!==false);
	$show_right	= $show_right	&& (strpos($layout, 'r')!==false);
	
	$flip_leftright = ($layout=='rlc') || ($layout=='clr');	
	$main_layout = 'pos_'.$layout;	
?>
<head>
<jdoc:include type="head" />
  <link rel="stylesheet" href="<?php echo $css ?>/layout.css" type="text/css" />    
  <link rel="stylesheet" href="<?php echo $css ?>/layout-test.css" type="text/css" /> 
</head>

<body class="<?php echo $classes;?>">
<div id="wrapper">
<a name="top" id="top"></a>

<div id="lay_header">
	<?php echo $app->getCfg( 'sitename' ).date(' :: h:i:s'); ?>
	<p>id = upper-header</p>
</div>

<div id="lay_main" class="<?php echo $main_layout;?>">
	<p>id = main container</p>
	
	<?php if ($flip_leftright) : ?>	
	<?php if ($show_right) : ?>	
	<div id="lay_right">
		<p>id = right</p>
		<p>Gaudeamus igitur, uvenes dum sumus, Post jucundum juventutem
		Post molestam senectutem, Nos habebit humus.</p>
	</div>	
	<?php endif; ?>
	<?php endif; ?>

	<?php if ($show_left) : ?>
	<div id="lay_left">
		<p>id = left</p>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
		Integer pretium dui sit amet felis. Integer sit amet diam. 
		Phasellus ultrices viverra velit.</p>
	</div>
	<?php endif; ?>

	<?php if (!$flip_leftright) : ?>	
	<?php if ($show_right) : ?>	
	<div id="lay_right">
		<p>id = right</p>
		<p>Gaudeamus igitur, uvenes dum sumus, Post jucundum juventutem
		Post molestam senectutem, Nos habebit humus.</p>
	</div>	
	<?php endif; ?>
	<?php endif; ?>
	
	<div id="lay_content">
		<p>id = content</p>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
		Integer pretium dui sit amet felis. Integer sit amet diam. 
		Phasellus ultrices viverra velit. 
		Nam mattis, arcu ut bibendum commodo, magna nisi tincidunt tortor, 
		quis accumsan augue ipsum id lorem.</p>
	</div>
	
	<div class="clr"></div>

	<div id="lay_bottom">
		<p>id = bottom</p>
	</div>
	
</div><? /* inner layout */ ?>

<div id="lay_footer">
	<p>id = bottom-footer</p>
</div>

</div><? /* wrapper */ ?>
</body>
