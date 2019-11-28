<?php
		// require_once 'class_createdb.php';
		session_start();
		$dbhost = 'localhost:3306';
		$dbuser = 'root';
		$dbpass = '12345';
		$dbname = 'test_dbn';
		$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		if(! $con ) {
			die('Could not connect: ' . mysqli_error($con));
		}