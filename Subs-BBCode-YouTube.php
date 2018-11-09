<?php
/**********************************************************************************
* Subs-BBCode-YouTube.php
***********************************************************************************
***********************************************************************************
* This program is distributed in the hope that it is and will be useful, but      *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE.                                            *
**********************************************************************************/
if (!defined('SMF'))
	die('Hacking attempt...');

//=================================================================================
// BBCode Hook functions
//=================================================================================
function BBCode_YouTube(&$bbc)
{
	// Syntax: [youtube {params}]{URL}[/youtube]
	$b[0] = array(
		'tag' => 'youtube',
		'type' => 'unparsed_content',
		'content' => '$1',
		'parameters' => array(),
		'validate' => 'BBCode_YouTube_URL',
		'disabled_content' => '$1',
	);

	// Syntax: [youtube]{URL}[/youtube]
	$b[1] = array(
		'tag' => 'youtube',
		'type' => 'unparsed_content',
		'content' => '$1',
		'validate' => 'BBCode_YouTube_URL',
		'disabled_content' => '$1',
	);

	// Syntax: [yt {params}]{URL}[/yt]
	$b[2] = array(
		'tag' => 'yt',
		'type' => 'unparsed_content',
		'content' => '$1',
		'parameters' => array(),
		'validate' => 'BBCode_YouTube_URL',
		'disabled_content' => '$1',
	);

	// Syntax: [yt]{URL}[/yt]
	$b[3] = array(
		'tag' => 'yt',
		'type' => 'unparsed_content',
		'content' => '$1',
		'validate' => 'BBCode_YouTube_URL',
		'disabled_content' => '$1',
	);

	// Syntax: [yt_user {params}]{URL}[/yt_user]
	$b[4] = array(
		'tag' => 'yt_user',
		'type' => 'unparsed_content',
		'content' => '$1',
		'parameters' => array(),
		'validate' => 'BBCode_YouTube_User',
		'disabled_content' => '$1',
	);

	// Syntax: [yt_user]{URL}[/yt_user]
	$b[5] = array(
		'tag' => 'yt_user',
		'type' => 'unparsed_content',
		'content' => '$1',
		'validate' => 'BBCode_YouTube_User',
		'disabled_content' => '$1',
	);

	// Syntax: [yt_search {params}]{URL}[/yt_search]
	$b[6] = array(
		'tag' => 'yt_search',
		'type' => 'unparsed_content',
		'content' => '$1',
		'parameters' => array(),
		'validate' => 'BBCode_YouTube_Search',
		'disabled_content' => '$1',
	);

	// Syntax: [yt_search]{URL}[/yt_search]
	$b[7] = array(
		'tag' => 'yt_search',
		'type' => 'unparsed_content',
		'content' => '$1',
		'validate' => 'BBCode_YouTube_Search',
		'disabled_content' => '$1',
	);

	// Since all the bbcodes use the same parameters, let's define them ONCE!
	$b[0]['parameters'] = $b[2]['parameters'] = $b[4]['parameters'] = $b[6]['parameters'] = array(
		'width' => array('optional' => true, 'match' => '(\d+)', 'validate' => 'BBCode_youtube_width'),
		'height' => array('optional' => true, 'match' => '(\d+)', 'validate' => 'BBCode_youtube_height'),
		'autoplay' => array('optional' => true, 'match' => '(1|yes|on|true)', 'validate' => 'BBCode_youtube_autoplay'),
		'color' => array('optional' => true, 'match' => '(red|white)', 'validate' => 'BBCode_youtube_color'),
		'theme' => array('optional' => true, 'match' => '(light|dark)', 'validate' => 'BBCode_youtube_theme'),
		'loop' => array('optional' => true, 'match' => '(1|yes|on|true)', 'validate' => 'BBCode_youtube_loop'),
		'start' => array('optional' => true, 'match' => '(\d+)', 'validate' => 'BBCode_youtube_start'),
		'end' => array('optional' => true, 'match' => '(\d+)', 'validate' => 'BBCode_youtube_end'),
		'privacy' => array('optional' => true, 'match' => '(1|yes|on|true)', 'validate' => 'BBCode_youtube_privacy'),
		'controls' => array('optional' => true, 'match' => '(0|no|off|false|hide)', 'validate' => 'BBCode_youtube_controls'),
		'showinfo' => array('optional' => true, 'match' => '(0|no|off|false|hide)', 'validate' => 'BBCode_youtube_showinfo'),
	);
	$bbc = array_merge($bbc, $b);
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

//=================================================================================
// Parameter validation functions
//=================================================================================
function BBCode_youtube_height($height)
{
	global $context;
	$context['bbc_youtube']['height'] = $height;
}

function BBCode_youtube_width($width)
{
	global $context;
	$context['bbc_youtube']['width'] = $width;
}

function BBCode_youtube_autoplay($autoplay)
{
	global $context;
	$context['bbc_youtube']['autoplay'] = 1;
}

function BBCode_youtube_color($color)
{
	global $context;
	$context['bbc_youtube']['color'] = $color;
}

function BBCode_youtube_theme($theme)
{
	global $context;
	$context['bbc_youtube']['theme'] = $theme;
}

function BBCode_youtube_loop($loop)
{
	global $context;
	$context['bbc_youtube']['loop'] = 1;
}

function BBCode_youtube_start($start)
{
	global $context;
	$context['bbc_youtube']['start'] = $start;
}

function BBCode_youtube_end($end)
{
	global $context;
	$context['bbc_youtube']['end'] = $end;
}

function BBCode_youtube_privacy($privacy)
{
	global $context;
	$context['bbc_youtube']['privacy'] = $privacy;
}

function BBCode_youtube_controls($controls)
{
	global $context;
	$context['bbc_youtube']['controls'] = 1;
}

function BBCode_youtube_showinfo($showinfo)
{
	global $context;
	$context['bbc_youtube']['showinfo'] = 1;
}

//=================================================================================
// YouTube and YT BBCode validation functions:
//=================================================================================
function BBCode_YouTube_URL(&$tag, &$data, &$disabled)
{
	global $txt, $context;

	// Do some preperation to avoid some issues within the code:
	$data = str_replace('&amp;', '&', strip_tags($data));

	// Figure out if what's been passed is a YouTube video URL or ID:
	$server = (strpos($data, 'https://') !== false ? 'https://' : 'http://');
	$server = $server . 'www.youtube' . (isset($context['bbc_youtube']['privacy']) ? '-nocookie' : '') . '.com';
	if (($len = strlen($data)) == 11)
		$data = $server . '/embed?v=' . ($url = $data);
	elseif ($len == 18)
		$data = $server . '/embed?listType=playlist&list=' . ($url = $data);
	else
		$data = $server . '/' . ($url = parse_yturl($data));

	// If the URL variable is empty, return link invalid to user....
	if (empty($url))
		$data = $txt['youtube_link_invalid'];
	// If the YouTube bbcode is disabled, create a simple link to the video:
	elseif (isset($disabled['youtube']))
		$data = '<a href=' . $data . '>' . $data . '</a>';
	// Otherwise, build the YouTube HTML string that we're going to use:
	else
		BBCode_YouTube_Link($data);

	// Remove the validation variables from the context array:
	unset($context['bbc_youtube']);
}

function BBCode_YouTube_User(&$tag, &$data, &$disabled)
{
	global $txt, $context;

	// Create the actual URL we are going to be using:
	$server = (strpos($data, 'https://') !== false ? 'https://' : 'http://');
	$server = $server . 'www.youtube' . (isset($context['bbc_youtube']['privacy']) ? '-nocookie' : '') . '.com';
	$data = $server . '/embed?listType=user_uploads&list=' . str_replace(" ", "+", strip_tags($data));

	// If the YouTube bbcode is disabled, create a simple link to the video:
	if (isset($disabled['youtube']))
		$data = '<a href=' . $data . '>' . $data . '</a>';
	// Otherwise, build the YouTube HTML string that we're going to use:
	else
		BBCode_YouTube_Link($data);

	// Remove the validation variables from the context array:
	unset($context['bbc_youtube']);
}

function BBCode_YouTube_Search(&$tag, &$data, &$disabled)
{
	global $txt, $context;

	// Create the actual URL we are going to be using:
	$server = (strpos($data, 'https://') !== false ? 'https://' : 'http://');
	$server = $server . 'www.youtube' . (isset($context['bbc_youtube']['privacy']) ? '-nocookie' : '') . '.com';
	$data = $server . '/embed?listType=search&list=' . str_replace(" ", "+", strip_tags($data));

	// If the YouTube bbcode is disabled, create a simple link to the video:
	if (isset($disabled['youtube']))
		$data = '<a href=' . $data . '>' . $data . '</a>';
	// Otherwise, build the YouTube HTML string that we're going to use:
	else
		BBCode_YouTube_Link($data);

	// Remove the validation variables from the context array:
	unset($context['bbc_youtube']);
}

//=================================================================================
// YouTube and YT BBCode link creation function:
//=================================================================================
function BBCode_YouTube_Link(&$data)
{
	global $context;
	
	// Set width or height with respect to aspect ratio if just one is set.  Set both if neither:
	if (!isset($context['bbc_youtube']['width']) && isset($context['bbc_youtube']['height']))
		$context['bbc_youtube']['width'] = floor($context['bbc_youtube']['height'] * 1.6);
	elseif (isset($context['bbc_youtube']['width']) && !isset($context['bbc_youtube']['height']))
		$context['bbc_youtube']['height'] = floor($context['bbc_youtube']['width'] * 0.625);
	$width = (isset($context['bbc_youtube']['width']) ? $context['bbc_youtube']['width'] : 640);
	$height = (isset($context['bbc_youtube']['height']) ? $context['bbc_youtube']['height'] : 400);

	// Process the rest of the parameters we've saved in the validation functions:
	if (isset($context['bbc_youtube']['autoplay']))
		$data = $data . (strpos($data, '?') !== false ? '&' : '?') . 'autoplay=1';
	if (isset($context['bbc_youtube']['color']))
		$data = $data . (strpos($data, '?') !== false ? '&' : '?') . 'color=' . $context['bbc_youtube']['color'];
	if (isset($context['bbc_youtube']['theme']))
		$data = $data . (strpos($data, '?') !== false ? '&' : '?') . 'theme=' . $context['bbc_youtube']['theme'];
	if (isset($context['bbc_youtube']['start']))
		$data = $data . (strpos($data, '?') !== false ? '&' : '?') . 'start=' . $context['bbc_youtube']['start'];
	if (isset($context['bbc_youtube']['end']))
		$data = $data . (strpos($data, '?') !== false ? '&' : '?') . 'end=' . $context['bbc_youtube']['end'];
	if (isset($context['bbc_youtube']['loop']))
		$data = $data . (strpos($data, '?') !== false ? '&' : '?') . 'loop=1';
	if (isset($context['bbc_youtube']['controls']))
		$data = $data . (strpos($data, '?') !== false ? '&' : '?') . 'controls=0';
	if (isset($context['bbc_youtube']['showinfo']))
		$data = $data . (strpos($data, '?') !== false ? '&' : '?') . 'showinfo=0';

	// Build the HTML string that we are going to display to the user:
	$data = '<iframe class="youtube-player" type="text/html" width="' . $width . '" height="' . $height . '" src="' . $data . '" allowfullscreen frameborder="0"></iframe>';
}

//=================================================================================
// Regular Expression function for URL validation:
//=================================================================================
function parse_yturl($url)
{
	// Check to see if this is a valid YouTube playlist URL:
	$pattern = '#^(?:https?://)?';        # Optional URL scheme. Either http or https.
	$pattern .= '(?:www\.)?';             #  Optional www subdomain.
	$pattern .= '(?:';                    #  Group host alternatives:
	$pattern .=   'youtu\.be/';           #    Either youtu.be,
	$pattern .=   '|youtube\.com';        #    or youtube.com
	$pattern .=   '|youtube-nocookie\.com';        #    or youtube.com
	$pattern .=   '(?:';                  #    Group path alternatives:
	$pattern .=     '/e/';                #      or /e/,
	$pattern .=     '|/p/';               #      or /p/,
	$pattern .=     '|/embed/';           #      Either /embed/,
	$pattern .=     '|/embed\?list=';     #      or /embed?list=,
	$pattern .=     '|/embed\?.+&list=';  #      or /embed?other_param&list=
	$pattern .=     '|/watch\?list=';     #      or /watch?list=,
	$pattern .=     '|/watch\?.+&list=';  #      or /watch?other_param&list=
	$pattern .=     '|/\?list=';          #      or /?list=
	$pattern .=     '|/\?.+&list=';       #      or /?other_param&list=
	$pattern .=   ')';                    #    End path alternatives.
	$pattern .= ')';                      #  End host alternatives.
	$pattern .= '([\w-]{18})';            # 11 characters (Length of Youtube video ids).
	$pattern .= '(?:.+)?$#x';             # Optional other ending URL parameters.
	preg_match($pattern, $url, $matches);
	$result = (isset($matches[1]) ? 'embed?listType=playlist&list=' . $matches[1] : false);

	// If not a playlist, then check to see if this is a valid YouTube video URL:
	if (empty($result))
	{
		$pattern = '#^(?:https?://)?';    # Optional URL scheme. Either http or https.
		$pattern .= '(?:www\.)?';         #  Optional www subdomain.
		$pattern .= '(?:';                #  Group host alternatives:
		$pattern .=   'youtu\.be/';       #    Either youtu.be,
		$pattern .=   '|youtube\.com';    #    or youtube.com
		$pattern .=   '|youtube-nocookie\.com';  #    or youtube-nocookie.com
		$pattern .=   '(?:';              #    Group path alternatives:
		$pattern .=     '/embed/';        #      Either /embed/,
		$pattern .=     '/embed\?v=';     #      Either /embed?v=,
		$pattern .=     '/embed\?.+&v=';  #      Either /embed?other_param&v=,
		$pattern .=     '|/e/';           #      or /e/,
		$pattern .=     '|/v/';           #      or /v/,
		$pattern .=     '|/\?v=';         #      or /?v=
		$pattern .=     '|/\?.+&v=';      #      or /?other_param&v=
		$pattern .=     '|/watch\?v=';    #      or /watch?v=,
		$pattern .=     '|/watch\?.+&v='; #      or /watch?other_param&v=
		$pattern .=     '|/user/.+\#.+/'; #      or like /user/username#p/u/11/
		$pattern .=     '|/.+\#.+/';      #      or like /sandalsResorts#p/c/54B8C800269D7C1B/0/
		$pattern .=   ')';                #    End path alternatives.
		$pattern .= ')';                  #  End host alternatives.
		$pattern .= '([\w-]{11})';        # 11 characters (Length of Youtube video ids).
		$pattern .= '(?:.+)?$#x';         # Optional other ending URL parameters.
		preg_match($pattern, $url, $matches);
		$result = (isset($matches[1]) ? 'embed/' . $matches[1] : false);
	}

	// Return the resulting string to the caller:
	return $result;
}

?>