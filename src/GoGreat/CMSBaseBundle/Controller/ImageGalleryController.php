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
		error_log($this->uploadDir);
		// list of valid extensions
		$allowedExtensions = array('jpeg', 'png', 'gif');
		// max file size in bytes
		$sizeLimit = 8 * 1024 * 1024;

		$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		$result = $uploader->handleUpload($this->uploadDir . '/');
		
		return new Response(json_encode($result));
	}
}
