<?php

namespace GoGreat\CMSBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SidebarController extends Controller
{	
    public function indexAction()
    {
        return $this->render('CMSBaseBundle:Sidebar:index.html.php');
    }
}
