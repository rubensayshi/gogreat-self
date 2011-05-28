<?php

namespace GoGreat\CMSBaseBundle\Controller;

use GoGreat\BaseBundle\Controller\BaseController;

class SidebarController extends BaseController
{	
    public function indexAction()
    {
    	$user = ($this->get('security.context')->getToken()) ? $this->get('security.context')->getToken()->getUser() : null;
    	$user = (is_object($user) ? $user : null);
    	    	
        return $this->render('CMSBaseBundle:Sidebar:index.html.twig', array(
        	'user'		=> $user,
        ));
    }
}
