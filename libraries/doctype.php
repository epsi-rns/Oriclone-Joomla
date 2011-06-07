<?php defined( '_JEXEC' ) or die( 'Restricted index access' ); 

$xml ='<?xml version="1.0" encoding="utf-8"?'.'>';

// http://www.w3.org/QA/2002/04/Web-Quality
switch($doctype) {
case 'HTML 2.0':
	echo '<!DOCTYPE html PUBLIC "-//IETF//DTD HTML 2.0//EN">';
	break;
case 'HTML 3.2':
	echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">';
	break;
case 'HTML 4.01 Strict':
	echo'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">';
   	break;
case 'HTML 4.01 Transitional':
	echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">';
   	break;
case 'HTML 4.01 Frameset':
	echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
	"http://www.w3.org/TR/html4/frameset.dtd">';
   	break;
case 'XHTML 1.0 Strict':
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
   	break;
case 'XHTML 1.0 Transitional':
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
   	break;	
case 'XHTML 1.0 Frameset':
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">';
   	break;
case 'XHTML 1.1':
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">';
   	break;
}
echo "\n";
?>
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="<?php echo $this->language; ?>"
lang="<?php echo $this->language ?>" dir="<?php echo $this->direction; ?>">
