<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

	protected function _initRoutes() {
		$front = Zend_Controller_Front::getInstance();
		$router = $front->getRouter();

		$router->addRoute('three_d', new Zend_Controller_Router_Route('art/3d', array(
				'controller' => 'art',
				'action' => 'three-d'
		)));
	}

}

