<?php
function breadcrumbs($separator = ' / ', $home = 'Inicio') {
	$path = array_filter ( explode ( '/', parse_url ( $_SERVER ['REQUEST_URI'], PHP_URL_PATH ) ) );
	$base = (array_key_exists ( 'HTTPS', $_SERVER ) ? 'https' : 'http') . '://' . $_SERVER ['HTTP_HOST'] . '/';

	$breadcrumbs = array (
			'<a href="index.php" class="btn btn-default pull-left"><i class="glyphicon glyphicon-home"></i></a>'
	);
	$last = end ( array_keys ( $path ) );
	$title = ucwords ( str_replace ( array (
			'.php',
			'_'
	), array (
			'',
			' '
	), $path [$last] ) );
	$breadcrumbs [] = '<a href="" class="btn btn-default active pull-left">' . $title . '</a>';
	return implode ( $separator, $breadcrumbs );
}
?>
