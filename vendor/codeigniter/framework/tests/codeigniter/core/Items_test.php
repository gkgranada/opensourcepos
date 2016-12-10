<?php

class Items_test extends CI_TestCase {
	public function set_up()
	{
		! defined('BASEPATH')? define('BASEPATH', 1):null;
		// Set server variable to GET as default, since this will leave unset in STDIN env
		$_SERVER['REQUEST_METHOD'] = 'GET';

		// Set config for Input class
		$this->ci_set_config('allow_get_array',	TRUE);
		$this->ci_set_config('global_xss_filtering', FALSE);
		$this->ci_set_config('csrf_protection', FALSE);

		$security = new Mock_Core_Security();

		$this->ci_set_config('charset', 'UTF-8');
		$utf8 = new Mock_Core_Utf8();

		$this->items = new Mock_Core_Items($security, $utf8);

	}

	// --------------------------------------------------------------------

	public function test_get_not_exists()
	{
		$this->assertTrue($this->input->get() === array());
		$this->assertTrue($this->input->get('foo') === NULL);
	}
}