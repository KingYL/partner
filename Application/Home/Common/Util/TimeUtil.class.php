<?php

namespace Home\Common\Util;

class TimeUtil {

	private static $instance;

	private function __construct () {

	}

	public static function getInstance () {
		if (isset(self::$instance)) {
			return self::$instance;
		}

		self::$instance = new TimeUtil();
		return self::$instance;
	}


	public function convertToT ($datetime) {
		return date("Y-m-d\TH:i", strtotime($datetime));
	}

}