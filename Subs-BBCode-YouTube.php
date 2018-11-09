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
		'content' => '$1',
		'parameters' => array(
			'width' => array('value' => ' width="$1"', 'match' => '(\d+)', 'validate' => 'BBCode_youtube_width'),
			'height' => array('value' => ' height="$1"', 'match' => '(\d+)', 'validate' => 'BBCode_youtube_height'),
		),
		'validate' => 'BBCode_YouTube_Validate',
		'disabled_content' => '($1)',
	);
	$bbc[] = array(
		'tag' => 'youtube',
		'type' => 'unparsed_content',
		'content' => '$1',
		'validate' => 'BBCode_YouTube_Validate',
		'disabled_content' => '($1)',
	);
}

function BBCode_YouTube_Validate(&$tag, &$data, &$disabled)
{
	global $txt, $context;

	// Is this simply a YouTube video ID?  Add the rest of the URL to
	if (strlen($data) == 11)
		$url = 'http://www.youtube.com/v/' . $data;
	else
	{
		// Otherwise, figure out if the URL is actually a YouTube video URL:
		$pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
		preg_match($pattern, $data, $matches);
		$url = isset($matches[1]) ? 'http://www.youtube.com/v/' . $matches[1] : false;
	}

	// Do we even have a link at this point?  If not, return "link invalid":
	if (empty($url))
		$data = $txt['youtube_link_invalid'];
	else
	{
		// Build the YouTube HTML string that we're going to use:
		$width = isset($content['youtube_width']) ? $content['youtube_width'] : 640;
		$height = isset($content['youtube_height']) ? $content['youtube_height'] : 400;
		$data = '<object width="' . $width .'" height="' . $height .'"><param name="movie" value="' . $url . '"></param><embed src="' . $url . '" type="application/x-shockwave-flash" width="' . $width .'" height="' . $height .'"></embed></object>';
	}

	// Remove the validation variables from the context array:
	unset($context['youtube_width']);
	unset($context['youtube_height']);
}

function BBCode_youtube_height($height)
{
	global $context;
	$context['youtube_height'] = $height;
}

function BBCode_youtube_width($width)
{
	global $context;
	$context['youtube_width'] = $width;
}

function BBCode_YouTube_Button(&$buttons)
{
	global $txt;

	$buttons[count($buttons) - 1][] = array(
		'image' => 'youtube',
		'code' => 'youtube',
		'description' => $txt['youtube'],
		'before' => '[youtube]',
		'after' => '[/youtube]',
	);
}

?>