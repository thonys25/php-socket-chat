<?php


	set_time_limit(0);

	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);
	socket_connect($socket, '127.0.0.1', 8000);

	unset($argv[0]);

	$message = implode(' ', $argv);

	socket_sendto($socket, $message, strlen($message), 0, '127.0.0.1', 8000);