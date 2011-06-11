<?php

namespace GoGreat\CMSBaseBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception;
use GoGreat\BaseBundle\Controller\BaseController;
use GoGreat\CMSBaseBundle\Util\qqFileUploader;

class ImageGalleryController extends BaseController
{	
	public $uploadDir;
	
	public function __construct($uploadDir)
	{
		error_log($uploadDir);
		$this->uploadDir = $uploadDir;
	}
	
	private function isAdmin()
	{
        return ($this->getLoggedInUser() && in_array('ROLE_ADMIN', $this->getLoggedInUser()->getRoles()));
	}

	public function uploadAction()
	{
		$allowedExtensions	= array('jpeg', 'png', 'gif');
		$sizeLimit 			= (8 * 1024 * 1024);
		$publicDir			= $this->uploadDir . '/';

		$uploader 			= new qqFileUploader($allowedExtensions, $sizeLimit);
		$result 			= $uploader->handleUpload($this->uploadDir . '/');
		
		if($result['filename']) {
			$result['public']	= '/uploads/' . $result['filename'];
		}
		
		return new Response(json_encode($result));
	}
}
