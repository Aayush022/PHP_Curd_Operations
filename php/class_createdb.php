<?php
	$dbhost = 'localhost:3306';
	$dbuser = 'root';
	// $dbpass = 'lCcrEmsvI2+B';
	$dbpass = '12345';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'test_dbn');

	if(! $conn ) {
		die('Could not connect: ' . mysqli_error($conn));
	}

	echo 'Connected successfully';

	// $sql = 'CREATE Database test_dbn';

	// $retval = mysqli_query( $conn, $sql );
	// //  var_dump($retval);exit();
	// if(! $retval ) {
	// 	die('Could not create database: ' . mysqli_error($conn));
 	// }
 	// echo "Database test_db created successfully\n";

	$dbname = 'test_dbn';
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if(! $con ) {
		die('Could not connect: ' . mysqli_error($con));
 }
	// sql to create table
	$inisql = "CREATE TABLE employee (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		fname VARCHAR(30) NOT NULL,
		lname VARCHAR(30) NOT NULL,
		country VARCHAR(50),
		cname VARCHAR(20) NOT NULL
		)";
  $retvalnew = mysqli_query( $con, $inisql);
  if(! $retvalnew ) {
		die('Could not create Table: ' . mysqli_error($con));
 	}
 	echo "Table employee created successfully\n";
  mysqli_close($conn);
?>