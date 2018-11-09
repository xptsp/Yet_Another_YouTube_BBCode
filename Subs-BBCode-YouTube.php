<?php
/**********************************************************************************
* Subs-BBCode-YouTube.php
***********************************************************************************
***********************************************************************************
* This program is distributed in the hope that it is and will be useful, but      *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE.                                            *
**********************************************************************************/

function BBCode_YouTube(&$bbc)
{
	$bbc[] = array(
		'tag' => 'youtube',
		'type' => 'unparsed_content',
		'content' => '<object{width}{height}><param name="movie" value="$1"></param><embed src="$1" type="application/x-shockwave-flash"{width}{height}></embed></object>',
		'parameters' => array(
			'width' => array('value' => ' width="$1"', 'match' => '(\d+)'),
			'height' => array('value' => ' height="$1"', 'match' => '(\d+)'),
		),
		'validate' => isset($disabled['youtube']) ? null : create_function('&$tag, &$data, $disabled', '
			$data = BBCode_YouTube_valid($data);
		'),
		'disabled_content' => '($1)',
	);
	$bbc[] = array(
		'tag' => 'youtube',
		'type' => 'unparsed_content',
		'content' => '<object width="640" height="400"><param name="movie" value="$1"></param><embed src="$1" type="application/x-shockwave-flash" width="640" height="400"></embed></object>',
		'validate' => isset($disabled['youtube']) ? null : create_function('&$tag, &$data, $disabled', '
			$data = BBCode_YouTube_valid($data);
		'),
		'disabled_content' => '($1)',
	);
}

function BBCode_YouTube_valid($url) 
{
	if (strlen($url) == 11)
		return 'http://www.youtube.com/v/' . $url;
    $pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
    preg_match($pattern, $url, $matches);
	return (isset($matches[1])) ? 'http://www.youtube.com/v/' . $matches[1] : false;
}

?>