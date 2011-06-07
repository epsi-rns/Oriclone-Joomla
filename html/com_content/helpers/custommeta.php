<?php
// Pattern: fluent interface (method chaining)

// no direct access
defined('_JEXEC') or die;

class JHtmlCustomMeta
{
	private static $__CLASS__ = __CLASS__;
	private static $item = null;
	private static $date = null;
		
	public static function instance($item) 
	{ 
		self::$item =& $item;
		self::set_date(); 
		return new self::$__CLASS__; // chain it
	}
	
	/* Common Section */	

	public static function title_article()
	{
		// Create shortcuts to some parameters.
		$item = self::$item;
		$params	= $item->params;
		
		$title	= htmlspecialchars($item->title);
		$link	= $item->readmore_link;

		if ($params->get('show_title'))
	{ ?>
		<h2 class="doc_title">
		<?php if ($params->get('link_titles') && !empty($link)) : ?>
			<a href="<?php echo $link; ?>">
			<?php echo $title; ?></a>
		<?php else : ?>
			<?php echo $title; ?>
		<?php endif; ?>
		</h2>
	<?php }

		return new self::$__CLASS__; // chain it
	}

	public static function title_featured()
	{
		// Create shortcuts to some parameters.
		$item = self::$item;
		$params	= $item->params;
		
		$title	= htmlspecialchars($item->title);
		$link	= JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid));

		if ($params->get('show_title'))
	{ ?>
		<h2 class="doc_title">
		<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
			<a href="<?php echo $link; ?>">
			<?php echo $title; ?></a>
		<?php else : ?>
			<?php echo $title; ?>
		<?php endif; ?>
		</h2>
	<?php }

		return new self::$__CLASS__; // chain it
	}

	public static function author()
	{
		// Create shortcuts to some parameters.
		$item = self::$item;
		$params	= $item->params;
				
		$author =  $item->author;
		$author = ($item->created_by_alias ? $item->created_by_alias : $author);
		$author = '<strong>'.$author.'</strong>';

		if ($params->get('show_author') && !empty($author))  
	{ ?>
		<div class="icon_author">
		<?php if (!empty($item->contactid ) &&  $params->get('link_author') == true):?>
			<?php
				$link = 'index.php?option=com_contact&view=contact&id='.$item->contactid;
				$link = JHTML::_('link',JRoute::_($link), $author);
				echo JText::sprintf('COM_CONTENT_WRITTEN_BY', 	$link); ?>

		<?php else :?>
			<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
		<?php endif; ?>
		</div>
	<?php } 

		return new self::$__CLASS__; // chain it
	}

	public static function action_edit()
	{
		// Create shortcuts to some parameters.
		$item = self::$item;
		$params	= $item->params;
		$canEdit	= $item->params->get('access-edit');
	
		if ($canEdit)
		{ 
			$icon_edit	= $item->state ? 'icon_edit' : 'icon_edit_go';	
		?>
			<div class="<?php echo $icon_edit; ?>" nowrap="nowrap">
			<?php echo JHTML::_('customicon.edit', $item, $params); ?>
			</div>
		<?php }
			
		return new self::$__CLASS__; // chain it
	}

	public static function action_print_popup()
	{
		// Create shortcuts to some parameters.
		$item = self::$item;
		$params	= $item->params;

		if ($params->get('show_print_icon')) 
		{ ?>
			<div class="icon_print_popup" nowrap="nowrap">
			<?php echo JHTML::_('customicon.print_popup',  $item, $params); ?>
			</div>
		<?php }

		return new self::$__CLASS__; // chain it
	}
	
	public static function action_print_screen()
	{
		// Create shortcuts to some parameters.
		$item = self::$item;
		$params	= $item->params;
		?>
			<div class="icon_print_screen" nowrap="nowrap">
			<?php echo JHtml::_('customicon.print_screen',  $item, $params); ?>
			</div>
		<?php
		
		return new self::$__CLASS__; // chain it
	}	
	
	public static function action_email()
	{
		// Create shortcuts to some parameters.
		$item = self::$item;
		$params	= $item->params;

		if ($params->get('show_email_icon')) 
		{
		?>
			<div class="icon_email" nowrap="nowrap">
			<?php echo JHtml::_('customicon.email',  $item, $params); ?>
			</div>
		<?php }

		return new self::$__CLASS__; // chain it
	}	

	public static function actions($print)
	{
		// Create shortcuts to some parameters.
		$item = self::$item;
		$params	= $item->params;		
		$canEdit	= $params->get('access-edit');

		if ($canEdit 
		||  $params->get('show_print_icon') 
		||	$params->get('show_email_icon')) 
		{	 
			if (!$print) 
			{
				self::action_edit();
				self::action_print_popup();
				self::action_email();
			}
		}
		else self::action_print_screen();

		return new self::$__CLASS__; // chain it
	}

	public static function category()
	{
		// Create shortcuts to some parameters.
		$item = self::$item;
		$params	= $item->params;
		
		if ($params->get('show_category')) 
		{ 
			$title = htmlspecialchars($item->category_title);
		?>
		<div class="icon_tag" title="<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>">
		<?php		
		$link = JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug));
		$url = '<a href="'.$link.'">'.$title.'</a>';?>
		<?php 
			if ($params->get('link_category') 
			AND $item->catslug)
				echo $url; 
			else
				echo $title; 
		?>
		</div>
	<?php } 

		return new self::$__CLASS__; // chain it
	}

	public static function parent_category()
	{
		// Create shortcuts to some parameters.
		$item = self::$item;
		$params	= $item->params;
		
		if ($params->get('show_parent_category')) 
		{ 
		$title = htmlspecialchars($item->parent_title);
		?>
		<div class="icon_cat" title="<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>">
		<?php		
		$link = JRoute::_(ContentHelperRoute::getCategoryRoute($item->parent_slug));
		$url = '<a href="'.$link.'">'.$title.'</a>';?>
		<?php 
			if ($params->get('link_parent_category') 
			AND $item->parent_slug)
				echo $url; 
			else
				echo $title; 
		?>
		</div>
	<?php } 

		return new self::$__CLASS__; // chain it
	}

	public static function hits()
	{
		// Create shortcuts to some parameters.
		$item = self::$item;
		$params	= $item->params;
		
		if ($params->get('show_hits')) 
	{ ?>
		<div class="icon_hits">
		<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $item->hits); ?>
		</div>
	<?php } 

		return new self::$__CLASS__; // chain it
	}

	/* Date Section */
	
	protected static function set_date()
	{
		// Create shortcuts to some parameters.
		$item = self::$item;
		$params	= $item->params;
				
		if ($params->get('show_create_date'))
			self::$date = $item->created;
		elseif ($params->get('show_modify_date'))
			self::$date = $item->modified;
		elseif ($params->get('show_publish_date'))
			self::$date = $item->publish_up;
		else
			self::$date = null;
	}
	
	// Workaround for PHP 5.2 compatibility
	public function get_date()
	{
		return self::$date;
	}

	protected static function get_date_message()
	{
		// Create shortcuts to some parameters.
		$params	= self::$item->params;
		
		if ($params->get('show_create_date'))
			$date_msg = 'COM_CONTENT_CREATED_DATE_ON';
		elseif ($params->get('show_modify_date'))
			$date_msg = 'COM_CONTENT_LAST_UPDATED';
		elseif ($params->get('show_publish_date'))
			$date_msg = 'COM_CONTENT_PUBLISHED_DATE';
		
		return $date_msg;
	}

	public static function calendar_icon()
	{
		// Create shortcuts to some parameters.
		$params	= self::$item->params;
		$date = self::get_date();

		if ($date)
		{	
			$date_msg = self::get_date_message($params);
			$title = JText::sprintf($date_msg, JHtml::_('date',$date, JText::_('DATE_FORMAT_LC2')));
	?>
		  <div class="calendar calendar-icon-<?php 
			echo JHTML::_('date', $date, 'm'); ?>"title="<?php echo $title; ?>">
			<div class="calendar-day"><?php echo JHTML::_('date', $date, 'j'); ?></div>
		  </div>	
	<?php }

		return new self::$__CLASS__; // chain it
	}

	// replacement for: // the_time(__('F jS, Y', 'oc'));
	public static function time_elapsed() 
	{	
	  $date = self::get_date();
	  if ($date) 
		{	
		$time = JHTML::_('date', $date, 'U');

		$title = JHtml::_('date',$date, JText::_('F jS, Y'));
		$title .= JHtml::_('date',$date, JText::_(' \TH:i:sO'));
	?>
			<div class="icon_time">
				<abbr title="<?php echo $title;?>">
				<?php printf('%s ago', self::get_time_elapsed_string($time) ); ?></abbr>
			</div>
	<?php
	  } 

		return new self::$__CLASS__; // chain it
	}

	// http://www.zachstronaut.com/posts/2009/01/20/php-relative-date-time-string.html
	private function get_time_elapsed_string($ptime) 
	{
		$etime = time() - $ptime;
		
		if ($etime < 1) {
			return '0 seconds';
		}
		
		$a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
					30 * 24 * 60 * 60       =>  'month',
					 7 * 24 * 60 * 60		=>	'week',
					24 * 60 * 60            =>  'day',
					60 * 60                 =>  'hour',
					60                      =>  'minute',
					1                       =>  'second'
					);
		
		foreach ($a as $secs => $str) {
			$d = $etime / $secs;
			if ($d >= 1) {
				$r = round($d);
				return $r . ' ' . $str . ($r > 1 ? 's' : '');
			}
		}
	}

}
