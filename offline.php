<?php defined( '_JEXEC' ) or die( 'Restricted index access' ); 
	$doctype = 'XHTML 1.0 Strict';
	include('libraries'.DS.'doctype.php');

	$fw = JURI::base().'media/custom/js';
	$js = JURI::base().'templates/'.$this->template.'/js';	
	$css = JURI::base().'templates/'.$this->template.'/css';	
	$images = JURI::base().'templates/'.$this->template.'/images';
	
	$app = &JFactory::getApplication();	
	$logo = $this->params->get('logo');
	
	$sitename = $this->params->get('sitename');
	if (!$sitename)
		$sitename = $app->getCfg( 'sitename' );	
	
	JHTML::_('behavior.framework', true);
?>
<head>
	<jdoc:include type="head" />

	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/offline.css" type="text/css" />
	<?php if($this->direction == 'rtl') : ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/offline_rtl.css" type="text/css" />
	<?php endif; ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />

	<link rel="stylesheet" href="<?php echo $css; ?>/template.css" type="text/css" />	
	<link rel="stylesheet" href="<?php echo $css; ?>/error.css" type="text/css" />
	<script type="text/javascript" src="<?php echo $js; ?>/Fx.Shake.js"></script>  
	<script type="text/javascript" src="<?php echo $js; ?>/effects.js"></script>  
	<script type="text/javascript">
		window.addEvent('domready', function() { mootools_shake(); });
  	</script>	
</head>
<body class="width_fluid mbg_feathers hbg_grey_blue grad_black">
<div id="wrapper">
	<div id="lay_header"><div class="fixed" id="lay_header_container">	
		<?php if (!empty($logo)) : ?>
		<div class="logo" id="logo-<?php echo $logo; ?>"></div>
		<?php endif; ?>
		
		<div id="lay_header_left">
			<h1 id="sitename"><a href="<?php 
				echo JURI::base(true); ?>"><?php 
				echo $sitename; ?>
			</a></h1>
		</div>			
	</div></div>
	
	<div id="lay_top">
	</div>
	
	<div id="lay_main" class="pos_lcr lay_main_login"><div class="fixed">
		<div id="lay_content">	

<dl id="system-message">
<dt class="message">Error</dt>
<dd class="message message fade">
	<ul>
		<li><?php echo $app->getCfg('offline_message'); ?></li>
	</ul>

</dd>
</dl>	
	
<?php /* Taken from system/ofline.php. Joomla GPL applied here */ ?>
<jdoc:include type="message" />
	<div id="frame" class="outline">
	<?php if(JPluginHelper::isEnabled('authentication', 'openid')) : ?>
	<?php JHTML::_('script', 'openid.js'); ?>
<?php endif; ?>

	<form action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="form-login">
	<fieldset class="input">
		<p id="form-login-username">
			<label for="username"><?php echo JText::_('JGLOBAL_USERNAME') ?></label>
			<input name="username" id="username" type="text" class="inputbox" alt="<?php echo JText::_('JGLOBAL_USERNAME') ?>" size="18" />
		</p>
		<p id="form-login-password">
			<label for="passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
			<input type="password" name="password" class="inputbox" size="18" alt="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" id="passwd" />
		</p>
		<p id="form-login-remember">
			<label for="remember"><?php echo JText::_('JGLOBAL_REMEMBER_ME') ?></label>
			<input type="checkbox" name="remember" class="inputbox" value="yes" alt="<?php echo JText::_('JGLOBAL_REMEMBER_ME') ?>" id="remember" />
		</p>
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGIN') ?>" />
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.login" />
		<input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</fieldset>
	</form>
	
	</div>
<?php /* <!-- whoaa --> */ ?>

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
