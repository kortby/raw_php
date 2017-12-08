<?php 

function url_for($link)
{
	if ($link[0] !== '/') {
		$link = '/'.$link;
	}
	return WWW_ROOT.$link;
}

// urlencode
function u($string)
{
	return urlencode($string);
}
// rawurlencode
function raw_u($string='')
{
	return rawurldecode($string);
}
// htmlspecialchars
function h($string)
{
	return htmlspecialchars($string);
}


function error_404()
{
	header(($_SERVER["SERVER_PROTOCOL"])." 404 Not Found");
	exit();
}


function error_500()
{
	header(($_SERVER["SERVER_PROTOCOL"])." 500 Internal server Error");
	exit();
}

function redirect_to($link)
{
	header("Location: ".url_for($link));
	exit();
}


function is_post_request()
{
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
	return $_SERVER['REQUEST_METHOD'] == 'GET';
}

 ?>