<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PHP MVC Lite</title>
	</head>
	<body>
		<h1>PHP MVC Lite</h1>
		<a href="<?php echo site_url('test/testing/ben/22/kenya'); ?>">Home</a>
		<p>For the aspiring :)</p>
		<p>
			Active Controller: <b><i><?php echo get_active_controller(); ?></i></b><br />
			Active Method: <b><i><?php echo get_active_method(); ?></i></b><br />
			Method Args: <b><i><?php echo get_active_method_args(); ?></i></b>
		</p>
