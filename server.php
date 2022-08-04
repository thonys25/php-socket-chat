<?php


	set_time_limit(0);

	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	socket_bind($socket, '127.0.0.1', 8000);
	socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);
	socket_listen($socket);

	while($connection = socket_accept($socket)) {

		//echo "Новое подключение на сокете\r\n";

		/**
		*	Ожидание новых сообщений от клиента
		*/
		while($messages = socket_read($connection, 1024)) {
			echo "[Сообщение]: " . $messages . "\r\n";
		}

	}

	socket_close($socket);