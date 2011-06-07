<?php defined( '_JEXEC' ) or die( 'Restricted index access' );
//	use default params if not set
	jimport('joomla.filesystem.file');
	jimport('joomla.html.parameter');
	
	$ini	= 'templates'.DS.$this->template.DS.'params.ini';		
	
	if	(!JFile::exists($ini))	{
		$defini	= 'templates'.DS.$this->template.DS.'params.default.ini';
		$content = JFile::read($defini);
		$this->params = new JParameter($content);
		JFile::write($ini, $content);
	}

//	check if url is index
	$app = &JFactory::getApplication();
	$isSEF = $app->getCfg( 'sef' );	
	if	($isSEF) {		
		$index_url = JURI::base(true).'/';
		$query_string= str_replace($index_url, '', $_SERVER['REQUEST_URI']);
		$isindex = empty($query_string);	// warning: no IIS
	}
	else $isindex = empty($_SERVER['QUERY_STRING']);
	
	
