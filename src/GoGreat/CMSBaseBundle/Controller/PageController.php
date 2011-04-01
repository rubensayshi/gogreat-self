<?php

namespace GoGreat\CMSBaseBundle\Controller;

use Symfony\Component\HttpKernel\Exception;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
	/**
	 * @return Symfony\Component\HttpFoundation\Request
	 */
	protected function getRequest() { return $this->get('request'); }
	
    public function showAction()
    {
    	$slug = $this->getRequest()->get('slug');
    	
    	if($slug != 'page_1')
        	throw new Exception\NotFoundHttpException('The page does not exist.');

        $page = new \stdClass();
        $page->title = 'Dummy';
        $page->content = 'Brawl';
        
    	
        return $this->render('CMSBase:Page:show.html.php', array(
        	'page'				=> $page,
        ));
    }
}
