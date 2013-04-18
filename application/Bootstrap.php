<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initConfig() {
        $config = new Zend_Config($this->getOptions());
        Zend_Registry::set('config',$config);
    }
/*
	protected function _initRoutes() {
		$front = Zend_Controller_Front::getInstance();
		$router = $front->getRouter();

	}
*/
}

