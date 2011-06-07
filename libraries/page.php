<?php defined( '_JEXEC' ) or die( 'Restricted index access' ); 
	if ($moo_eff) {
		$effects[] = 'mootools_watermark_scroll';
		$effects[] = 'hover_normalpage';	
		$effects[] = 'mootools_skypebutton';	
		// $effects[] = 'mootools_comment';
		
		if ($moo_demo) {
			$effects[] = 'mootools_peel_effect';
			$effects[] = 'mootools_external_favicon';
			// $effects[] = 'mootools_fliptext';
			$effects[] = 'mootools_snapcasa';
		}	
	}

	$task = JRequest::getWord('task');	
	$isediting = in_array($task,  array('edit', 'add', 'view') );
	$poss = array('banner', 'right', 'left', 'top', 
		'user3', 'search', 'user5', 'menumatic');

	foreach($poss as $pos)
	{ 	
		$posname = "pos_".$pos;
		$$posname = ( $this->CountModules($pos) && !$isediting  );
	}
			
	$pos_left = $pos_left || $this->CountModules('login' );	// fix
	
	$class=array();
	$class[] = 'width_'.$this->params->get('widthStyle');	
	$class[] = 'mbg_'.$this->params->get('mainBackground');
	$class[] = 'hbg_'.$this->params->get('headerBackground');
	$class[] = 'grad_'.$this->params->get('topVariation');
	
	if ($moo_eff && $moo_demo)
		$class[] = 'moo12demo';
	
	$classes = implode(' ', $class);
	
	include('htmlhead.php');	
?>	
<body class="<?php echo $classes;?>">
<div id="wrapper">
	<a name="top" id="top"></a>
	<p class="accessibility">
	This website was created to reach every audience possible.</p>
	
<?php 	if ($moo_eff && $moo_demo) : ?>
<div id="page-flip" class="no-print">
	<a href="http://feeds.feedburner.com/iluni-ui">
		<img src="<?php echo $img ?>/notmine/page_flip.png" 
		alt="Subscribe!" id="page-flip-image" /></a>
	<div id="page-flip-message"></div>
</div>	
<?php	endif;	?>
	
<?php	
include('top.php'); 
?>
	<div id="container-console"></div>
<?php	
/* --- begin of main layout --- */ 
include('main.php'); 
/* --- end of main layout --- */ 
include('bottom.php'); 
?>
<a href="#top" id="gototop" class="no-click no-print">Top of Page</a>
<a name="bottom" id="bottom"></a>
</div>
</body>
