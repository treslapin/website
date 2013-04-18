<?php

class My_View_Helper_Gallery extends Zend_View_Helper_Abstract {


	public function Gallery() {

		$controller = Zend_Controller_Front::getInstance()->getRequest()->getControllerName();
		$action = Zend_Controller_Front::getInstance()->getRequest()->getActionName();


		$path = realpath(APPLICATION_PATH . '/../public_html/images/galleries/' . $controller . '/' . $action);


		if ($path !== false) {

		}

	}


}