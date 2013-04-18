<?php

class ContactController extends Zend_Controller_Action {

    public function indexAction() {
        $this->view->email = Zend_Registry::get('config')->contact->email;

        if ($this->_request->isPost()) {
            $to = Zend_Registry::get('config')->contact->to;

            $subject = 'New Contact Form from Lapinsh.com';
            $name = $this->_getParam('name', 'Anonymous Coward');
            $email = $this->_getParam('email');

            $message = 'From: ' . $name;

            if ($email) {
                $message .= '< ' . $email . ' >\n\n';
            }

            $message .= $this->_getParam('message');

            $headers = 'From: no-reply@lapinsh.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

            if ($email) {
                $headers .= "\r\n" . 'Reply-To: ' . $email;
            }

            mail($to, $subject, $message, $headers);

            $this->view->sent = true;
        }
    }
	

}

