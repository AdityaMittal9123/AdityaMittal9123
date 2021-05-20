<!DOCTYPE html>
<html class="h-100 w-100">
<head>

	<title>eLibrary</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="favicon.png" type="image/png">
	<?php 
	require __dir__.'/resources/materialize/materialize.php';
	?> 
</head>
<body class="h-100 w-100" style="overflow-x:hidden;">
	<?php  
	
	require 'core/Materialize.php';
	require __dir__.'/Controllers/auth/auth_check.php';
	//require __dir__.'/Views/common/header.view.php';
	require Router::load('routes.php')->direct(Request::uri());
	
	//require __dir__.'/resources/bootstrap/bootstrap4_js.php';	
	//require __dir__.'/'.'Views/common/modals.view.php';
	?>
	<script type="text/javascript" src='resources/js/custom_JS_functions.js'></script>
</body>
</html>