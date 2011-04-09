<?php

namespace GoGreat\CMSBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SidebarController extends Controller
{	
    public function indexAction()
    {
    	$user = ($this->get('security.context')->getToken()) ? $this->get('security.context')->getToken()->getUser() : null;
    	$user = (is_object($user) ? $user : null);
    	    	
        return $this->render('CMSBaseBundle:Sidebar:index.html.php', array(
        	'user'		=> $user,
        ));
    }
}
