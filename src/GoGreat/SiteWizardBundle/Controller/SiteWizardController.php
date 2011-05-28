<?php

namespace GoGreat\SiteWizardBundle\Controller;

use GoGreat\BaseBundle\Controller\BaseController;

class SiteWizardController extends BaseController
{
    public function newAction()
    {
        return $this->render('SiteWizardBundle:Default:new.html.twig');
    }
}
