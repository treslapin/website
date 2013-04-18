<?php

class My_View_Helper_Navigation extends Zend_View_Helper_Abstract {

    private $controller;
    private $action;

	public function Navigation() {

		$this->controller = Zend_Controller_Front::getInstance()->getRequest()->getControllerName();
        $this->action = Zend_Controller_Front::getInstance()->getRequest()->getActionName();

        $links = array(
            array('label' => 'About', 'url' => '/'),
            array('label' => 'Published Games', 'url' => '/games', 'children' => array(
                array('label' => 'Footy', 'url' => '/games/footy'),
                array('label' => 'Usain Bolt Athletics', 'url' => '/games/uba')
            )),
            array('label' => 'Game Prototypes', 'url' => '/prototypes', 'children' => array(
                array('label' => 'Foo', 'url' => '/prototypes/footy'),
                array('label' => 'Derpy', 'url' => '/prototypes/uba')
            )),
            array('label' => 'Design Documents', 'url' => '/design'),
            array('label' => 'Art', 'url' => '/art'),
            array('label' => 'CV', 'url' => '/cv'),
            array('label' => 'Contact', 'url' => '/contact'),


        );

		$html = '<ul class="navigation">';

        foreach ($links as $link) {
            $html .= $this->renderLink($link);
        }

        $html .= '</ul>';

        return $html;

	}

    private function renderLink($link) {
        $active = $this->isActive($link);

        if (!$active && isset($link['children'])) {
            $active = $this->isParentActive($link['children']);
        }

        $html = '<li';
        if ($active) {
            $html .= ' class="active"';
        }
        $html .= '><a href="' . $link['url'] . '">' . $link['label'] . '</a>' . "\n";

        if (isset($link['children'])) {
            $html .= '<ul';
            if ($active || $this->isParentActive($link['children'])) {
                $html .= ' class="expanded"';
            }
            $html .= ">\n";
            foreach ($link['children'] as $child) {
                $html .= $this->renderLink($child);
            }
            $html .= "</ul>\n";
        }

        $html .= "</li>\n";

        return $html;
    }

    private function isActive($link) {
        if (!isset($link['url'])) {
            return false;
        }
        $linkParts = explode('/', $link['url']);

        if (!isset($linkParts[1]) || $linkParts[1] == '') {
            $linkParts[1] = 'index';
        }

        if (!isset($linkParts[2])) {
            $linkParts[2] = 'index';
        }

        //var_dump($link); //$linkParts
        if ($linkParts[1] == $this->controller && $linkParts[2] == $this->action) {
            return true;
        }
    }

    private function isParentActive($children) {
        $isActive = false;
        foreach ($children as $child) {
            $isActive = $this->isActive($child);

            if ($isActive) {
                return true;
            }
        }
        return $isActive;
    }


}