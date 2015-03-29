<?php

return Array(
	'authentication' => Array(
		// >
		'id' => '123456',
		'key' => 'qJcR0jteFJYJxQvRFFSjmQ',
	),
	'storageFolder'=>dirname(__FILE__)
					.DIRECTORY_SEPARATOR.'..'
					.DIRECTORY_SEPARATOR.'storage',
	'limits' => Array(
		// global limits
		'global' => Array(
			// global download limit in KB
			// 0 means unlimited
			'downloadSize'=>Array(
				'hour'  => 0,
				'day'   => 0,
				'week'  => 0,
				'month' => 0,
				'year'  => 0,
			),
			// number of download requests
			// 0 means unlimited
			'downloadRequests'=>Array(
				'hour'  => 0,
				'day'   => 0,
				'week'  => 0,
				'month' => 0,
				'year'  => 0,
			),
		),
		'request' => Array(
			// max download time validity from request in seconds
			// 0 means unlimited
			'downloadValidity' => 60*60,
		),
		'download' => Array(
			// 0 means unlimited
			'maxDownloadsPerFile'=>         0,
			// time between requests, in seconds
			// 0 means unlimited
			'minTimeBetweenRequests'=>      10,
			// 0 means unlimited
			'maxTimeFromFirstRequest'=>     60*5 //

		),
	),
	'httpStatusCode' => Array(
		100 => 'Continue',
		101 => 'Switching Protocols',
		200 => 'OK',
		201 => 'Created',
		202 => 'Accepted',
		203 => 'Non-Authoritative Information',
		204 => 'No Content',
		205 => 'Reset Content',
		206 => 'Partial Content',
		300 => 'Multiple Choices',
		301 => 'Moved Permanently',
		302 => 'Found',
		303 => 'See Other',
		304 => 'Not Modified',
		305 => 'Use Proxy',
		306 => '(Unused)',
		307 => 'Temporary Redirect',
		400 => 'Bad Request',
		401 => 'Unauthorized',
		402 => 'Payment Required',
		403 => 'Forbidden',
		404 => 'Not Found',
		405 => 'Method Not Allowed',
		406 => 'Not Acceptable',
		407 => 'Proxy Authentication Required',
		408 => 'Request Timeout',
		409 => 'Conflict',
		410 => 'Gone',
		411 => 'Length Required',
		412 => 'Precondition Failed',
		413 => 'Request Entity Too Large',
		414 => 'Request-URI Too Long',
		415 => 'Unsupported Media Type',
		416 => 'Requested Range Not Satisfiable',
		417 => 'Expectation Failed',
		500 => 'Internal Server Error',
		501 => 'Not Implemented',
		502 => 'Bad Gateway',
		503 => 'Service Unavailable',
		504 => 'Gateway Timeout',
		505 => 'HTTP Version Not Supported'
	),
);