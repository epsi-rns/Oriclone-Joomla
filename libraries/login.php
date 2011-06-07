<?php defined( '_JEXEC' ) or die( 'Restricted index access' ); 

	$app = &JFactory::getApplication();
	$allowcontent = (JRequest::getCmd('option')=='com_user');

	if (!($allowcontent || $isindex))
		$app->redirect('index.php', 
			'Authorized Personnel Only. '
		.	'Please enter your credential.', 
			'alert');

	if ($moo12) {			
		$document	= & JFactory::getDocument();
		$document->addScript($js.'/Fx.Shake.js');
		
		$effects[] = 'mootools_shake';	// no ie6
		$effects[] = 'mootools_animate_opacity';	
		$effects[] = 'mootools_pulsefade';	// need fancy logo
	}

	$menumatic = false;	
	include('htmlhead.php');

	jimport('joomla.utilities.date');
	$date = new JDate();
	$cur_year	= $date->toFormat('%Y');
	
	$cp_desc = $this->params->get('copyrightDescription');		
	
	$class=array();
	$class[] = 'width_'.$this->params->get('widthStyle');	
	$class[] = 'mbg_'.$this->params->get('mainBackground');
	$class[] = 'hbg_'.$this->params->get('headerBackground');
	$class[] = 'grad_'.$this->params->get('topVariation');
	
	if ($this->params->get('moo12') 
	&& $this->params->get('moo12demo'))
		$class[] = 'moo12demo';
	
	$classes = implode(' ', $class);
?>	
<body class="<?php echo $classes;?>">
<div id="wrapper">

	<div id="lay_header"><div class="fixed" id="lay_header_container">
		<div id="lay_header_left">
			<?php echo $app->getCfg( 'sitename' ); ?>
		</div>
	</div></div>

	<div id="lay_main" class="pos_lcr lay_main_login"><div class="fixed">
		<div id="lay_content" class="login_opacity">
			<jdoc:include type="message" />			
			<jdoc:include type="module" name="login" />			
			<?php if ($allowcontent) : ?>  
				<jdoc:include type="component" />
			<?php endif; ?>
		</div>
	</div></div>
	
	<div id="lay_footer">
		<div id="footer">	
		Copyright &copy; <?php echo $cur_year;?>,
		<?php echo $cp_desc;?></div>
	</div>

<a href="#top" id="gototop" class="no-click no-print">Top of Page</a>
</div>
</body>
