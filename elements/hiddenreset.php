<?php defined( '_JEXEC' ) or die( 'Restricted index access' ); 

class JElementHiddenReset extends JElement
{
	var	$_name = 'HiddenReset';

	function fetchElement($name, $value, &$node, $control_name)
	{
		$class = ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="text_area"' );

		return '<input type="hidden" name="'.$control_name.'['.$name.']" id="'.$control_name.$name.'" value="1" '.$class.' />';
	}

	function fetchTooltip($label, $description, &$xmlElement, $control_name='', $name='') {
		return false;
	}
}
