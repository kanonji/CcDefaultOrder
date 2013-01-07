<?php
	class HomeController extends CcDefaultOrderAppController {
	public $uses = array('Issue');
	public function index() {
		$this->set('count',$this->Issue->find('count'));
	}
}

