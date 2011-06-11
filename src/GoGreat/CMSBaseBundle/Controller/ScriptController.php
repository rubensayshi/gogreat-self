<?php

namespace GoGreat\CMSBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ScriptController extends Controller
{
    public function editablesAction()
    {
        return $this->render('CMSBaseBundle:Script:editables.html.twig');
    }
}
