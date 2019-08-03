<?php
	// Create Connection
	//$conn = mysqli_connect('db4free.net', 'bancodb','12345678hs', 'bancodb');
        define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '123456');
	define('DB_NAME', 'personas');

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	// Check Connection
	if(mysqli_connect_errno()){
		// Connection Failed
		echo 'Failed to connect to MySQL '. mysqli_connect_errno();
	}