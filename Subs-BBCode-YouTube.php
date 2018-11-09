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
	// Syntax: [youtube width={x} height={x}]{URL}[/youtube]
	$bbc[] = array(
		'tag' => 'youtube',
		'type' => 'unparsed_content',
		'content' => '$1',
		'parameters' => array(
			'width' => array('value' => ' width="$1"', 'match' => '(\d+)', 'validate' => 'BBCode_youtube_width'),
			'height' => array('value' => ' height="$1"', 'match' => '(\d+)', 'validate' => 'BBCode_youtube_height'),
		),
		'validate' => 'BBCode_YouTube_Validate',
		'disabled_content' => '$1',
	);

	// Syntax: [youtube]{URL}[/youtube]
	$bbc[] = array(
		'tag' => 'youtube',
		'type' => 'unparsed_content',
		'content' => '$1',
		'validate' => 'BBCode_YouTube_Validate',
		'disabled_content' => '$1',
	);

	// Syntax: [yt width={x} height={x}]{URL}[/yt]
	$bbc[] = array(
		'tag' => 'yt',
		'type' => 'unparsed_content',
		'content' => '$1',
		'parameters' => array(
			'width' => array('value' => ' width="$1"', 'match' => '(\d+)', 'validate' => 'BBCode_youtube_width'),
			'height' => array('value' => ' height="$1"', 'match' => '(\d+)', 'validate' => 'BBCode_youtube_height'),
		),
		'validate' => 'BBCode_YouTube_Validate',
		'disabled_content' => '$1',
	);

	// Syntax: [yt]{URL}[/yt]
	$bbc[] = array(
		'tag' => 'yt',
		'type' => 'unparsed_content',
		'content' => '$1',
		'validate' => 'BBCode_YouTube_Validate',
		'disabled_content' => '$1',
	);
}

function BBCode_YouTube_Validate(&$tag, &$data, &$disabled)
{
	global $txt, $context;

	// Strip all HTML tags from the URLs to prevent XML attacks:
	$data = strip_tags($data);

	// Figure out if what's been passed is a YouTube video URL or ID:
	if (strlen($data) == 11)
		$data = 'http://www.youtube.com/v/' . ($url = $data);
	else
		$data = 'https://www.youtube.com/' . ($url = parse_yturl($data));

	// If the URL variable is empty, return link invalid to user....
	if (empty($url))
		$data = $txt['youtube_link_invalid'];
	// If the YouTube bbcode is disabled, create a simple link to the video:
	elseif (isset($disabled['youtube']))
		$data = '<a href=' . $data . $list . '>' . $data . '</a>';
	// Otherwise, build the YouTube HTML string that we're going to use:
	else
	{
		$width = isset($content['youtube_width']) ? $content['youtube_width'] : 640;
		$height = isset($content['youtube_height']) ? $content['youtube_height'] : 400;
		$data = '<object width="' . $width .'" height="' . $height .'"><param name="movie" value="' . $data . '"></param><embed src="' . $data . '" type="application/x-shockwave-flash" width="' . $width .'" height="' . $height .'"></embed></object>';
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

function parse_yturl($url) 
{
	// Attempt to validate URL via Regular Expression matching:
	$pattern = '#^(?:https?://)?';    # Optional URL scheme. Either http or https.
	$pattern .= '(?:www\.)?';         #  Optional www subdomain.
	$pattern .= '(?:';                #  Group host alternatives:
	$pattern .=   'youtu\.be/';       #    Either youtu.be,
	$pattern .=   '|youtube\.com';    #    or youtube.com
	$pattern .=   '(?:';              #    Group path alternatives:
	$pattern .=     '/e/';            #      or /e/,
	$pattern .=     '|/embed/';       #      Either /embed/,
	$pattern .=     '|/v/';           #      or /v/,
	$pattern .=     '|/\?v=';         #      or /?v=
	$pattern .=     '|/watch\?v=';    #      or /watch?v=,    
	$pattern .=     '|/user/.+\#.+/'; #      or like /user/username#p/u/11/
	$pattern .=     '|/.+\#.+/';      #      or like /sandalsResorts#p/c/54B8C800269D7C1B/0/
	$pattern .=     '|/\?.+&v=';      #      or /?other_param&v=
	$pattern .=     '|/watch\?.+&v='; #      or /watch?other_param&v=
	$pattern .=   ')';                #    End path alternatives.
	$pattern .= ')';                  #  End host alternatives.
	$pattern .= '([\w-]{11})';        # 11 characters (Length of Youtube video ids).
	$pattern .= '(?:.+)?$#x';         # Optional other ending URL parameters.
	preg_match($pattern, $url, $matches);
	$result = (isset($matches[1]) ? 'v/' . $matches[1] : false);

	// If we don't have a result, attempt to detect the video ID another way:
	if (empty($result))
	{
        parse_str(parse_url(str_replace('&amp;', '&', $url), PHP_URL_QUERY), $out);
        $result = (isset($out['v']) ? 'v/' . $out['v'] : false);
	}

	// Return the resulting string to the caller:
	return $result;
}

?>