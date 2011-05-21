<?php

namespace GoGreat\SiteWizardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteWizardController extends Controller
{
    public function newAction()
    {
        return $this->render('SiteWizardBundle:Default:new.html.twig');
    }
}
