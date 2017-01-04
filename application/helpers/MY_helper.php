<?php
if (! function_exists('words_limit'))
{
	function words_limit($words, $string = '', $limit = '10')
	{
		return implode($string, array_slice(explode($string, $words), 0, $limit));
	}
}
?>
