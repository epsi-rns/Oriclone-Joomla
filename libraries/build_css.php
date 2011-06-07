<?php defined( '_JEXEC' ) or die( 'Restricted index access' ); 
/** code by E.R. Nurwijayadi **/
	
class Build_CSS
{
	// css compression type, true or false
	var $compact = false;
	
	// path
	var $cssdev;
	
	// css items
	var $statics;
	var $variations;
	
	// wrapper
	var $template;
	
	// other helper
	var $content;
	
	
	// PHP4 contructor
	function Build_CSS($template, $params) {
		jimport('joomla.filesystem.file');
		jimport('joomla.client.helper');
		
		$this->template = $template;
		
		$this->cssdev = 'templates'.DS.$template.DS.'css-dev'.DS;		
		$this->compact = ($params->get('compactcss')==2);
					
		$this->statics = array(
			'layout', 'template', 'typography', 'scheme',
			'joomla15', 'joomla16', 'module', 'component', 'messages',
			'docs', 'position', 'calendar', 'background',
			'hmenu', 'effects', 'effects-css3', 'admin', 'specific',
			// countmodules: simplified of non statics
			'menumatic');

		$this->variations	= array(); // empty for oriclone	
	}
	
	/* params.ini part */	
	function reset_ini($key)
	{
		// adapt form com_templates/controller
		
		// Read the ini file
		$ini	= 'templates'.DS.$this->template.DS.'params.ini';		
		$content = (JFile::exists($ini)) ? JFile::read($ini) : null;
	
		$registry = new JRegistry();
		$registry->loadIni($content);
		$registry->setValue($key, 0);
		$txt = $registry->toString('INI');
		// echo $txt; exit;	
	
		// Set FTP credentials, if given
		JClientHelper::setCredentialsFromRequest('ftp');
		$ftp = JClientHelper::getCredentials('ftp');	
	
	
		if (JFile::exists($ini))
		{
		// Try to make the params file writeable
			if (!$ftp['enabled'] && JPath::isOwner($ini) 
				&& !JPath::setPermissions($ini, '0755')) {
				JError::raiseNotice('SOME_ERROR_CODE', 
					JText::_('Could not make the template parameter file writable'));
			}
		}
		$succeed = JFile::write($ini, $txt);

		if (!$succeed) {
			$msg =	JText::_('Operation Failed').': '
				.	JText::sprintf('Failed to open file for writing.', $ini);
			$app = &JFactory::getApplication();	
			$app->enqueueMessage($msg, 'error');
		}
			
		return $succeed;
	}
	
	/* css part */		
	function get_content($imports=array())
	{
		$content = '';
		foreach ($imports as $file) {			
			$cssfile = $this->cssdev.$file.'.css';
			$cssadd = JFile::read($cssfile);
			
			if	(!$this->compact)
				$content .= "\n".'/* --- '.$file.'.css --- */'."\n\n";
				
			$content .= $cssadd;
		}		
		return $content;
	}
	
	function compress()	{
		// -- The Reinhold Weber method
		// remove comments 
		$pattern = '!/\*[^*]*\*+([^/][^*]*\*+)*/!';
		$this->content = preg_replace($pattern, '', $this->content);
    	
    	// remove tabs, spaces, newlines, etc. 
    	$search = array("\r\n", "\r", "\n", "\t", '  ', '    ', '    ');
    	$this->content = str_replace($search, '', $this->content); 
	}
		
	function build() {
		$content_static = $this->get_content($this->statics);
		$content_variation = $this->get_content($this->variations);

		// fix path
		$pattern = 'url(../../images/';
		$replacement = 'url(../images/';
		$content_variation = str_replace($pattern, $replacement, $content_variation);
		
		$this->content = $content_static.$content_variation;
		
		if	($this->compact)
			$this->compress();
		
		$template = 'templates'.DS.$this->template.DS.'css'.DS.'template.css';
		$succeed = JFile::write($template, $this->content);

		if (!$succeed) {
			$msg =	JText::_('Operation Failed').': '
				.	JText::sprintf('Failed to open file for writing.', $template);
			$app = &JFactory::getApplication();	
			$app->enqueueMessage($msg, 'error');
		}	
	}
}

// Run forrest, run...
$css = new Build_CSS($this->template, $this->params);
if	($css->reset_ini('rebuildcss'))
	$css->build();
