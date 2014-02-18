<?php
namespace Applications\Frontend\Modules\CMS;

class CMSController extends \Library\BackController
{
	public function executeShowAccueil(\Library\HTTPRequest $request)
	{
		$this->setView('index');
		$this->page->addVar('class_accueil', 'active');
		
	}
	
	public function executeShowSpa(\Library\HTTPRequest $request)
	{
		$this->setView('index');
		$this->page->addVar('class_spa', 'active');
	}
	
	public function executeShowService(\Library\HTTPRequest $request)
	{
		$this->setView('index');
		$this->page->addVar('class_service', 'active');
	}
	
	public function executeShowProduit(\Library\HTTPRequest $request)
	{
		$this->setView('index');
		$this->page->addVar('class_produit', 'active');
	}
	
	public function executeShowContact(\Library\HTTPRequest $request)
	{
		$this->setView('index');
		$this->page->addVar('class_contact', 'active');
	}
}
?>