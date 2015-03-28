<?php

return Array(
	'authentication' => Array(
		'id' => '',
		'key' => 'qJcR0jteFJYJxQvRFFSjmQ',
	),
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
			'downloadValidity' => 60*60,
		),
		'download' => Array(
			// 0 means unlimited
			'maxDownloadsPerFile'=>         0,
			'minTimeBetweenRequests'=>      10, // min time between requests, in seconds
			'maxTimeFromFirstRequest'=>     60*5 //

		),
	),
);