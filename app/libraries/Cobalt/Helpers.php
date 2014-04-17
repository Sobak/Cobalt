<?php
namespace Cobalt;

class Helpers {
	public static function adminMenuClass($section, $viewVariable) {
		if ($viewVariable == $section)
			return 'class="active"';
	}

	public static function adminNotification($content, $type = 'success')
	{
		if ($type == 'error')
			$output = '<div class="notification danger">';
		else
			$output = '<div class="notification">';

		$output .= '<i class="icon-only" data-icon="v"></i>';
		$output .= $content;
		$output .= '<span class="icon-only" data-dismiss="notification" data-icon="x"></span>';
		$output .= '</div>';

		return $output;
	}
}