<?php

class View {
	function __construct() {
		// Insert construct f(x).
	}

	public function render($name, $noinclude = false) {
		if ($noinclude == true) {
			require 'views/' . $name . '.php';
		}
		else {
			require 'views/header.php';
			require 'views/' . $name . '.php';
			require 'views/footer.php';
		}
	}
}